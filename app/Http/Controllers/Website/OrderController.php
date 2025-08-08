<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::withCount('products')->where('user_id', auth()->id())->get();

        return view('my-account.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $orderId)
    {
        $order = Order::with(['products.product.images', 'shippingCountry:id,name'])->where('uuid', $orderId)->orWhere('id', $orderId)->firstOrFail();

        return view('my-account.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
