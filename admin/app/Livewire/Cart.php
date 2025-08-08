<?php

namespace App\Livewire;


class Cart extends CartCombine
{
    // public $cart;
    // public $cartItems = [];

    public function mount()
    {
        // $this->cart = $cart;
        // $this->cartItems = $cart->map(function ($item) {
        //     return [
        //         'id' => $item->id,
        //         'product_name' => $item->product->name ?? 'N/A',
        //         'quantity' => $item->quantity,
        //         'color' => $item->color,
        //         'type' => $item->product->type,
        //         'slug' => $item->product->slug,
        //         'image' => $item->product->image,
        //         'price' => $item->product->price,
        //     ];
        // })->toArray();
    }
    public function render()
    {
        return view('livewire.cart', [
            'carts' => \App\Models\Cart::query()
                ->with(['product'])
                ->when(auth()->check(), fn($q) => $q->where('session_id', session()->getId())->orWhere('user_id', auth()->id()), fn($q) => $q->where('session_id', session()->getId()))
                ->get()
        ]);
    }
}
