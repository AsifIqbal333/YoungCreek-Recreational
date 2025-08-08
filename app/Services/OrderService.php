<?php

namespace App\Services;

use App\Http\Resources\CouponResource;
use App\Models\Order;
use Illuminate\Support\Str;

class OrderService
{
    public static function arrangeOrderData($order)
    {
        $shipping['address'] = $order->address->shipping_address;
        $shipping['city'] = $order->address->shipping_city;
        $shipping['state'] = $order->address->shipping_state;
        $shipping['zip_code'] = $order->address->shipping_zip_code;
        $shipping['country'] = $order->address->shipping_country;
        $billing['address'] = $order->address->billing_address;
        $billing['city'] = $order->address->billing_city;
        $billing['state'] = $order->address->billing_state;
        $billing['zip_code'] = $order->address->billing_zip_code;
        $billing['country'] = $order->address->billing_country;

        $data['id'] = $order->id;
        $data['uuid'] = $order->uuid;
        $data['user_id'] = $order->user_id;
        $data['number'] = $order->number;
        $data['tracking_number'] = $order->tracking_number;
        $data['total_price'] = $order->total_price;
        $data['status'] = $order->status;
        $data['payment_method'] = $order->payment_method;
        $data['payment_identifier'] = $order->payment_identifier;
        $data['shipping_method'] = $order->shipping_method;
        $data['created_at'] = $order->created_at;
        $data['user'] = $order->user;
        $data['shipping'] = $shipping;
        $data['billing'] = $billing;
        $data['products'] = $order->products->map(function ($item) {
            $color = $item->productColor;
            $color['name'] = $item->productColor->color->name;

            $product['id'] = $item->product->id;
            $product['brand'] = $item->product->brand->name;
            $product['model'] = $item->product->model->name;
            $product['design'] = $item->product->design->name;
            $product['active'] = $item->product->active;
            return [
                'id' => $item->id,
                'order_id' => $item->order_id,
                'product_id' => $item->product_id,
                'product_color_id' => $item->product_color_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'product' => $product,
                'color' => $color,
            ];
        });
        $data['logs'] = $order->logs->map(function ($item) {
            return [
                'id' => $item->id,
                'order_id' => $item->order_id,
                'status' => $item->status,
                'description' => $item->description,
                'created_at' => $item->created_at,
            ];
        });
        if ($order->relationLoaded('coupon') && $order->coupon) {
            $data['coupon'] = new CouponResource($order->coupon);
        }


        return $data;
    }

    public static function generateOrderNumber(): string
    {
        $date = now()->format('Ymd');
        $lastOrderId = Order::max('id') ?? 0;
        $nextId = $lastOrderId + 1;
        return 'ORD-' . $date . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
    }

    public static function generateTrackingNumber(): string
    {
        return 'TRK-' . strtoupper(Str::random(10));
    }
}
