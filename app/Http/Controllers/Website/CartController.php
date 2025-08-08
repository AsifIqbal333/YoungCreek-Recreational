<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Handle cart.
     */
    public function index()
    {
        $cartItems = Cart::query()
            ->with(['product'])
            ->when(auth()->check(), fn($q) => $q->where('session_id', session()->getId())->orWhere('user_id', auth()->id()), fn($q) => $q->where('session_id', session()->getId()))
            // ->where('session_id', session()->getId())
            // ->orWhere('user_id', auth()->id())
            ->count();

        $featuresProducts = Product::with(['images'])->whereHas('images')->where('featured', true)->get();

        return view('cart', [
            'cartItems' => $cartItems,
            'featuresProducts' => $featuresProducts,
        ]);
    }

    /**
     * Handle add to cart.
     */
    public function store(AddToCartRequest $request)
    {
        $product = Product::find($request->product_id);

        // check if item is already in cart or not
        $alreadyCartItem = Cart::query()
            ->where(function ($q) {
                if (auth()->check()) {
                    $q->where('session_id', session()->getId())
                        ->orWhere('user_id', auth()->id());
                } else {
                    $q->where('session_id', session()->getId());
                }
            })
            ->where('product_id', $request->product_id)
            ->where('color', $request->color)
            ->first();


        // item found in cart, update quantity
        if ($alreadyCartItem) {
            $newQuantity = $alreadyCartItem->quantity + $request->quantity;
            $alreadyCartItem->update(['quantity' => $newQuantity, 'price' => $product->price * $newQuantity]);
        } else {
            // item not in cart, create new
            Cart::create([
                'session_id' => session()->getId(),
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'color' => $request->color,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
            ]);
        } else {
            return to_route('cart.index')->with('success', 'Product added to cart successfully');
        }


    }


    /**
     * Handle add to quote.
     */
    public function addToQuote(Request $request)
    {
        dd($request->all());
    }
}
