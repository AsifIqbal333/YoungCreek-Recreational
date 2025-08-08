<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;

class ShoppingCart extends CartCombine
{
    public $featureProducts;

    public function mount()
    {
        $this->featureProducts = Product::with(['images'])
            ->select(['id', 'name', 'price', 'type', 'slug'])
            ->whereHas('images')
            ->where('featured', true)
            ->get();

    }
    public function render()
    {
        return view('livewire.shopping-cart', [
            'carts' => Cart::query()
                ->with(['product.images'])
                ->when(auth()->check(), fn($q) => $q->where('session_id', session()->getId())->orWhere('user_id', auth()->id()), fn($q) => $q->where('session_id', session()->getId()))
                ->get()
        ]);
    }
}
