<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search = '';

    public function mount()
    {
        $this->search = request()->get('q');
    }

    public function render()
    {
        return view('livewire.search-products', [
            'products' => Product::query()
                ->with(['images'])
                ->select(['id', 'slug', 'name', 'price'])
                ->when($this->search, fn($q) => $q->whereLikes(['name'], $this->search), fn($q) => $q->whereName(''))
                ->get()
        ]);
    }
}
