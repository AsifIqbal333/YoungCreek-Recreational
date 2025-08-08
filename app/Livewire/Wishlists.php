<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class Wishlists extends Component
{
    public $selectAll = false;
    public $selectedRows = [];

    public function render()
    {
        return view('livewire.wishlists', [
            'wishlists' => Wishlist::query()
                ->with(['product'])
                ->where('user_id', auth()->id())
                ->get()
        ]);
    }

    public function removeItem($id)
    {
        Wishlist::find($id)->delete();

        return to_route('wish-list.index')->with('success', 'Item removed from wishlist successfully!');
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedRows = Wishlist::pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selectedRows = [];
        }
    }
}
