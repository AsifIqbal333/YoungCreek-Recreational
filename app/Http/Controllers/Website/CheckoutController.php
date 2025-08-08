<?php

namespace App\Http\Controllers\Website;

use App\Enums\OrderStatus;
use App\Enums\TransactionStatus;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Country;
use App\Notifications\OrderReceived;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use App\Services\OrderService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::query()
            ->with(['product'])
            ->when(auth()->check(), fn($q) => $q->where('session_id', session()->getId())->orWhere('user_id', auth()->id()), fn($q) => $q->where('session_id', session()->getId()))
            ->get();

        if ($cartItems->count() == 0) {
            return to_route('cart.index')->with('error', 'Your cart is empty. Please add some items to proceed to checkout');
        }

        return view('checkout', [
            'cartItems' => $cartItems,
            'countries' => Country::select(['id', 'name'])->get(),
            'userInfo' => auth()->user()?->info
        ]);
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();
        $cartItems = Cart::query()
            ->with(['product'])
            ->where('session_id', session()->getId())
            ->orWhere('user_id', auth()->id())
            ->get();

        if (empty($cartItems)) {
            return back()->with('error', 'Your cart is currently empty.')->withInput();
        }

        if (!isset($data['ship_to_different_address'])) {
            $data['shipping_first_name'] = $data['billing_first_name'];
            $data['shipping_last_name'] = $data['billing_last_name'];
            $data['shipping_company_name'] = $data['billing_company_name'];
            $data['shipping_country_id'] = $data['billing_country_id'];
            $data['shipping_address_1'] = $data['billing_address_1'];
            $data['shipping_address_2'] = $data['billing_address_2'];
            $data['shipping_city'] = $data['billing_city'];
            $data['shipping_postcode'] = $data['billing_postcode'];
        }
        $data['shipping_phone'] = $data['billing_phone'];

        $data['comments'] = $data['order_comments'];
        // $data['price'] = $cartItems->reduce(function (?int $carry, $item) {
        //     return $carry + $item->quantity * $item->product?->price;
        // }, 0);
        $data['price'] = $cartItems->reduce(fn(?int $carry, $item) => $carry + $item->quantity * $item->price, 0);

        try {
            // Start transaction
            DB::beginTransaction();

            // check if user is loggedin or not, if not then create new user
            $user = auth()->user();
            if (!$user) {
                $user = User::create([
                    'role_id' => UserRole::USER->value,
                    'first_name' => $data['billing_first_name'],
                    'last_name' => $data['billing_last_name'],
                    'name' => $data['billing_first_name'] . ' ' . $data['billing_last_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
            }

            // turn cart into order
            $order = Order::create([
                'number' => OrderService::generateOrderNumber(),
                'tracking_number' => OrderService::generateTrackingNumber(),
                'user_id' => $user->id,
                'price' => $data['price'],
                'comments' => $data['comments'],
                'billing_first_name' => $data['billing_first_name'],
                'billing_last_name' => $data['billing_last_name'],
                'billing_phone' => $data['billing_phone'],
                'billing_company_name' => $data['billing_company_name'],
                'billing_country_id' => $data['billing_country_id'],
                'billing_address_1' => $data['billing_address_1'],
                'billing_address_2' => $data['billing_address_2'],
                'billing_city' => $data['billing_city'],
                // 'billing_state_id' => $data['billing_state_id'],
                'billing_state_id' => null,
                'billing_postcode' => $data['billing_postcode'],
                'shipping_first_name' => $data['shipping_first_name'],
                'shipping_last_name' => $data['shipping_last_name'],
                'shipping_phone' => $data['shipping_phone'],
                'shipping_company_name' => $data['shipping_company_name'],
                'shipping_country_id' => $data['shipping_country_id'],
                'shipping_address_1' => $data['shipping_address_1'],
                'shipping_address_2' => $data['shipping_address_2'],
                'shipping_city' => $data['shipping_city'],
                // 'shipping_state_id' => $data['shipping_state_id'],
                'shipping_state_id' => null,
                'shipping_postcode' => $data['shipping_postcode'],
            ]);

            $cartItems->each(function (Cart $item) use ($order, $user) {
                $order->products()->create([
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'product_price' => $item->price,
                    'price' => $item->quantity * $item->price
                ]);

                $item->update(['user_id' => $user->id]);
            });

            // Set your Stripe secret key
            Stripe::setApiKey(config('services.stripe.client_secret'));

            // Format line items for Stripe
            $lineItems = [];
            $cardIds = [];

            foreach ($cartItems as $item) {
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $item->product->name,
                            'description' => Str::of($item->product->description)->limit(200, preserveWords: true),
                            'images' => [$item->product->image ?? null],
                        ],
                        'unit_amount' => $item->price * 100, // Convert to cents
                    ],
                    'quantity' => $item->quantity,
                ];

                $cardIds[] = $item->id;
            }

            // Create the checkout session
            $session = Session::create([
                'customer_email' => $user->email,
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel') . '?session_id={CHECKOUT_SESSION_ID}',
                'metadata' => [
                    'order_id' => $order->id,
                    'cart_ids' => json_encode($cardIds)
                ],
            ]);

            // all operations succeeded, commit the transaction
            DB::commit();

            auth()->login($user);

            return redirect($session->url);
        } catch (\Throwable $th) {
            // roll back all changes
            DB::rollBack();
            return back()->with('error', $th->getMessage())->withInput();
        }

    }

    public function success(Request $request)
    {
        // Handle successful payment
        if ($request->session_id) {
            $stripe = new \Stripe\StripeClient(config('services.stripe.client_secret'));
            $checkoutSession = $stripe->checkout->sessions->retrieve($request->session_id);

            // check if session is complete
            if ($checkoutSession->status === 'complete') {
                $paymentIntent = $stripe->paymentIntents->retrieve(
                    $checkoutSession->payment_intent,
                    []
                );

                //    find order for the id from matadata
                $order = Order::withCount('products')->find($checkoutSession->metadata->order_id);

                if ($order) {
                    // update order status to completed
                    $order->update(['status' => OrderStatus::COMPLETED->value]);

                    // create a transaction record
                    Transaction::create([
                        'user_id' => $order->user_id,
                        'order_id' => $order->id,
                        'amount' => $checkoutSession->amount_total / 100,
                        'payment_intent_id' => $paymentIntent->id,
                        'status' => TransactionStatus::COMPLETED->value
                    ]);

                    // Send the order received email
                    Notification::route('mail', config('services.admin_email', 'chris@youngcreekrec.com'))
                        ->notify(new OrderReceived($order));
                }

                //delete cart items
                foreach (json_decode($checkoutSession->metadata->cart_ids, true) as $cartId) {
                    Cart::find($cartId)?->delete();
                }
            }
        }

        return to_route('thank-you', ['order' => $order->uuid])->with('success', "Your order has been placed successfully!");
    }

    public function cancel(Request $request)
    {
        // Handle cancelled payment
        if ($request->session_id) {
            $stripe = new \Stripe\StripeClient(config('services.stripe.client_secret'));
            $checkoutSession = $stripe->checkout->sessions->retrieve($request->session_id);

            // delete order from database
            if (isset($checkoutSession->metadata) && isset($checkoutSession->metadata->order_id)) {
                Order::find($checkoutSession->metadata->order_id)?->delete();
            }
        }

        return to_route('cart.index')->with('error', 'Checkout cancelled successfully!');
    }
}
