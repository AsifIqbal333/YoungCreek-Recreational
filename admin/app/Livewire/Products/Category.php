<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Category extends Component
{
    public $allProducts, $products, $type, $category, $subCategory, $ageRanges, $capacityFilters, $priceFilters, $width, $length;

    public function mount($products, $type, $category, $subCategory)
    {
        $this->allProducts = $products;
        $this->products = $products;
        $this->type = $type;
        $this->category = $category;
        $this->subCategory = $subCategory;

        $this->ageRanges = $this->products->groupBy('age_group')->map->count();

        $query = Product::query()
            ->where('type', $this->type)
            ->where('category', $this->category)
            ->when($this->subCategory, fn($q) => $q->where('sub_category', $this->subCategory));

        $this->capacityFilters = [
            '1-5 Kids' => $query->clone()->where('max_capacity', '<=', 5)->count(),
            '6-10 Kids' => $query->clone()->whereBetween('max_capacity', [6, 10])->count(),
            '11-15 Kids' => $query->clone()->whereBetween('max_capacity', [11, 15])->count(),
            '16-20 Kids' => $query->clone()->whereBetween('max_capacity', [16, 20])->count(),
            '20+ Kids' => $query->clone()->where('max_capacity', '>', 20)->count(),
        ];

        $this->priceFilters = [
            '$0 to $1000' => $query->clone()->whereBetween('price', [0, 1000])->count(),
            '$1000 to $5000' => $query->clone()->whereBetween('price', [1001, 5000])->count(),
            '$5000 to $10000' => $query->clone()->whereBetween('price', [5001, 10000])->count(),
            '$10000 to $15000' => $query->clone()->whereBetween('price', [10001, 15000])->count(),
            '$15000 to $20000' => $query->clone()->whereBetween('price', [15001, 20000])->count(),
            '$20000 & Above' => $query->clone()->where('price', '>', 20001)->count(),
        ];
    }

    public function render()
    {
        return view('livewire.products.category');
    }

    public function sortBy($order)
    {
        $products = $this->allProducts;
        // dd($this->products->sortByDesc('price'));
        if ($order === 'asc') {
            $this->products = $products->sortBy('price');
        } else if ($order === 'desc') {
            $this->products = $products->sortByDesc('price');
        } else if ($order === 'popularity') {
            $this->products = $products->shuffle();
        }
    }

    public function filterBy($type, $value)
    {
        // dd($type, $value);
        $products = $this->allProducts;

        if ($type === "age_group") {
            $this->products = $products->where('age_group', $value);
        } else if ($type === "capacity") {
            $filters = [
                '1-5 Kids' => ['min' => 1, 'max' => 5],
                '6-10 Kids' => ['min' => 6, 'max' => 10],
                '11-15 Kids' => ['min' => 11, 'max' => 15],
                '16-20 Kids' => ['min' => 16, 'max' => 20],
                '20+ Kids' => ['min' => 20, 'max' => null]
            ];
            $filter = $filters[$value];

            if ($filter['max'] == 5) {
                $this->products = $products->where('max_capacity', '<=', 5);
            } else if (is_null($filter['max'])) {
                $this->products = $products->where('max_capacity', '>', 20);
            } else {
                $this->products = $products->whereBetween('max_capacity', [$filter['min'], $filter['max']]);
            }
        } else if ($type === "price") {
            $filters = [
                '$0 to $1000' => ['min' => 0, 'max' => 1000],
                '$1000 to $5000' => ['min' => 1001, 'max' => 5000],
                '$5000 to $10000' => ['min' => 5001, 'max' => 10000],
                '$10000 to $15000' => ['min' => 10001, 'max' => 15000],
                '$15000 to $20000' => ['min' => 15001, 'max' => 20000],
                '$20000 & Above' => ['min' => 20001, 'max' => null],
            ];
            $filter = $filters[$value];

            if (is_null($filter['max'])) {
                $this->products = $products->where('price', '>', 20001);
            } else {
                $this->products = $products->whereBetween('price', [$filter['min'], $filter['max']]);
            }
        }
    }

    public function updatedWidth()
    {
        $this->products = $this->allProducts->where('width', '>=', $this->width);
        // $this->products = $this->allProducts->filter(function ($product) {
        //     return $product->width >= $this->width;
        // });
    }

    public function updatedLength()
    {
        $this->products = $this->allProducts->where('length', '>=', $this->length);
    }

    public function addToWishlist($productId)
    {
        $alreadyExist = Wishlist::where([
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ])->exists();

        if (!$alreadyExist) {
            Wishlist::create([
                'session_id' => session()->getId(),
                'user_id' => auth()->id(),
                'product_id' => $productId,
            ]);
        }

        return to_route('products.index', ['type' => $this->type, 'category' => $this->category])->with('success', 'Product added to wishlist!');
    }
}
