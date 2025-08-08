<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Attributes\On;

class ShoppingCart extends CartCombine
{
    public $featureProducts;

    protected $listeners = ['refreshCart' => 'refreshCart'];

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


    #[On('refresh-cart')]
    public function refreshCart()
    {
        // This method is empty we're just refreshing the component to relaod cart items
    }
}
