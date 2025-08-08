<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CartCombine extends Component
{

    public function addQuantity($id)
    {
        $cart = \App\Models\Cart::find($id)->increment('quantity', 1);

        session()->flash('success', 'Cart updated!');
    }

    public function removeQuantity($id)
    {
        $cart = \App\Models\Cart::find($id);
        $cart->decrement('quantity', 1);

        if ($cart->quantity == 0) {
            $this->removeItem($id);
            return;
        }

        session()->flash('success', 'Cart updated!');
    }


    public function removeItem($id)
    {
        \App\Models\Cart::find($id)?->delete();

        session()->flash('success', 'Item removed from cart successfully!');

        // $this->reload();
    }

    public function deleteAll()
    {
        \App\Models\Cart::where('session_id', session()->getId())->delete();

        session()->flash('success', 'All items removed from cart successfully!');

        // $this->reload();
    }

    public function updateCart()
    {
        foreach ($this->cartItems as $item) {
            $cart = \App\Models\Cart::find($item['id']);
            if ($cart) {
                $cart->quantity = $item['quantity'];
                $cart->save();
            }
        }

        session()->flash('success', 'Cart updated successfully!');
        $this->reload();
    }

    protected function reload()
    {
        return redirect()->route('cart.index');
    }


}
