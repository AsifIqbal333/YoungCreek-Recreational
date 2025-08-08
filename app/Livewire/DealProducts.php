<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class DealProducts extends Component
{
    public $search = '';
    public $selectedProducts = [];

    public function mount($products)
    {
        $oldSelectedProducts = old('product_ids') ? json_decode(old('product_ids', )) : $products?->pluck('product_id')?->toArray();

        foreach ($oldSelectedProducts as $id) {
            $this->selectedProducts[] = Product::with(['images'])->find($id);
        }

    }

    public function render()
    {
        return view('livewire.deal-products', [
            'products' => Product::query()
                ->select('id', 'name')
                ->when($this->search, fn($q) => $q->whereLikes(['name'], $this->search), fn($q) => $q->whereName(''))
                ->take(8)
                ->get()
        ]);
    }

    public function addToSelected($productId)
    {
        // check if item is already in the list
        if (in_array($productId, collect($this->selectedProducts)->pluck('id')->toArray())) {
            session()->flash('error', 'Item already selected');
            return;
        }

        // check if 3 items are already in the list then show error message
        if (count($this->selectedProducts) >= 3) {
            session()->flash('error', 'You can only select 3 items');
            return;
        }

        $this->selectedProducts[] = Product::with(['images'])->find($productId);
        $this->search = '';
    }

    public function removeFromSelected($productId)
    {
        $this->selectedProducts = array_filter($this->selectedProducts, fn($product) => $product->id !== $productId);
    }

}
