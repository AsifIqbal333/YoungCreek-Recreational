<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class Products extends Paginator
{
    public array $types, $categories, $sub_categories = [];
    public string $type = "";
    public string $category = "";
    public string $sub_category = "";

    public function mount()
    {
        $productQuery = Product::select(['type', 'category', 'sub_category'])->get();

        foreach ($productQuery->groupBy('type') as $type => $value) {
            if ($type !== "") {
                $this->types[] = $type;
            }
        }
        foreach ($productQuery->groupBy('category') as $category => $value) {
            if ($category !== "") {
                $this->categories[] = $category;
            }
        }
        foreach ($productQuery->groupBy('sub_category') as $item => $value) {
            if ($item !== "") {
                $this->sub_categories[] = $item;
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.products', [
            'products' => Product::query()
                ->with(['images'])
                ->when($this->search, fn($q) => $q->whereLikes(['name', 'type', 'category', 'sku', 'price', 'sub_category'], $this->search))
                ->when($this->type, fn($q) => $q->whereType($this->type))
                ->when($this->category, fn($q) => $q->whereCategory($this->category))
                ->when($this->sub_category, fn($q) => $q->whereSubCategory($this->sub_category))
                ->paginate($this->limit)
        ]);
    }

    public function updateFeatured($productId)
    {
        $product = Product::select(['id', 'featured'])->find($productId);
        $product->update(['featured' => !$product->featured]);
    }
}
