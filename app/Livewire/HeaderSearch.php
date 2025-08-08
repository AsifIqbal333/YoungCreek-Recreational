<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class HeaderSearch extends Component
{
    public $search = '';


    public function render()
    {
        $products = Product::query()
            ->with(['images'])
            ->whereHas('images')
            ->select(['id', 'slug', 'name'])
            ->when($this->search, fn($q) => $q->whereLikes(['name'], $this->search), fn($q) => $q->whereName(''))
            ->take(4)
            ->get();

        $productName = [];
        foreach ($products as $item) {
            $productName[] = $item->name;
        }

        return view('livewire.header-search', [
            'products' => $products,
            'suggestions' => Product::query()
                ->select(['id', 'slug', 'name'])
                ->whereLikes(['name'], 'tr')
                ->when($this->search, fn($q) => $q->whereLikes(['name'], $this->search), fn($q) => $q->whereName(''))
                ->whereNotIn('name', $productName)
                ->take(5)
                ->get()
                ->groupBy('name')
        ]);
    }
}
