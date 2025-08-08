<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $limit = 12;
    public $search = '';
    public $isAll = false;

    public function mount($source = "model")
    {
        $this->search = request()->get('q');
        $this->isAll = $source === "page" || (request()->has('type') && request()->get('type') == 'all');
    }

    public function render()
    {
        $productQuery = Product::query()
            ->with(['images'])
            ->select(['id', 'slug', 'type', 'name', 'price'])
            ->when($this->search, fn($q) => $q->whereLikes(['name'], $this->search), fn($q) => $q->whereName(''));

        $products = $productQuery->clone()->when(!$this->isAll, fn($q) => $q->limit($this->limit))->get();

        // $productName = [];
        // foreach ($products as $item) {
        //     $productName[] = $item->name;
        // }

        $suggestions = Product::query()
            ->select(['name'])
            ->whereLikes(['name'], 'tr')
            ->when($this->search, fn($q) => $q->whereLikes(['name'], $this->search), fn($q) => $q->whereName(''))
            // ->whereNotIn('name', $productName)
            ->take(8)
            ->get()
            ->groupBy('name');

        return view('livewire.search-products', [
            'products' => $products,
            'products_count' => $productQuery->clone()->count(),
            'suggestions' => $suggestions,
        ]);
    }
}
