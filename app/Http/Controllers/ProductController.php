<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $type, string $category, string $subCategory = null)
    {
        $categoryInstance = collect(categories())->where('slug', $type)->first();
        abort_if(!$categoryInstance, 404);
        $categoryItem = collect($categoryInstance['items'])->where('category', $category)->first();

        if ($category === "swing-sets" && is_null($subCategory)) {
            $images = ["images/SWG1-430x287.png", "images/SWAP1-430x287.png", "images/SWGT1-430x286.jpg", "images/TSWING1-430x288.jpg"];
            $products = [];
            $categories = [];
            foreach (Product::where('type', $type)->where('category', $category)->get()->groupBy('sub_category') as $item => $product) {
                $categories[] = $item;
            }

            foreach ($categories as $key => $item) {
                $products[] = [
                    "name" => ucwords(str_replace("-", " ", $item)),
                    'category' => $item,
                    'image' => asset($images[$key])
                ];
            }

            return view('products.swings', [
                'type' => $type,
                'category' => $category,
                'subCategory' => $subCategory,
                'products' => $products,
            ]);
        }

        if ($type === "safety-surfacing-edging") {
            return view("products.safety." . $category, [
                'type' => $type,
                'category' => $category,
                'subCategory' => $subCategory,
            ]);
        }

        $productsQuery = Product::query()
            ->with(['images'])
            ->has('images')
            ->where('type', $type)
            ->where('category', $category)
            ->when($subCategory, fn($q) => $q->where('sub_category', $subCategory));

        $capacityFilters = [
            [
                'title' => '1-5 Kids',
                'key' => '1-5-kids',
                'value' => $productsQuery->clone()->whereBetween('max_capacity', [1, 5])->count()
            ],
            [
                'title' => '6-10 Kids',
                'key' => '6-10-kids',
                'value' => $productsQuery->clone()->whereBetween('max_capacity', [5, 10])->count()
            ],
            [
                'title' => '11-15 Kids',
                'key' => '11-15-kids',
                'value' => $productsQuery->clone()->whereBetween('max_capacity', [10, 15])->count()
            ],
            [
                'title' => '16-20 Kids',
                'key' => '16-20-kids',
                'value' => $productsQuery->clone()->whereBetween('max_capacity', [15, 20])->count()
            ],
            [
                'title' => '20+ Kids',
                'key' => '20-plus-kids',
                'value' => $productsQuery->clone()->where('max_capacity', '>', 20)->count()
            ],
        ];


        // dd($capacityFilters);

        return view('products.index', [
            'type' => $type,
            'category' => $categoryInstance,
            'subCategory' => $subCategory,
            'products' => $productsQuery->clone()->get(),
            'categoryItem' => $categoryItem,
            'capacityFilters' => $capacityFilters
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $type, string $slug)
    {
        $categoryInstance = collect(categories())->where('slug', $type)->first();
        abort_if(!$categoryInstance, 404);


        $product = Product::with(['images'])->where('type', $type)->where('slug', $slug)->firstOrFail();

        $categoryItem = collect($categoryInstance['items'])->where('category', $product->category)->first();

        $suggestedProducts = Product::query()
            ->with(['images'])
            ->has('images')
            ->whereNot('id', $product->id)
            ->where('type', $product->type)
            ->where('category', $product->category)
            ->inRandomOrder()
            ->take(8)
            ->get();
        $featuresProducts = Product::with(['images'])->whereHas('images')->where('featured', true)->get();

        return view('products.show', [
            'product' => $product,
            'suggestedProducts' => $suggestedProducts,
            'featuresProducts' => $featuresProducts,
            'category' => $categoryInstance,
            'categoryItem' => $categoryItem,
        ]);
    }

    /**
     * Add the product to wishlist.
     */
    public function addToWishlist(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $alreadyExist = Wishlist::where([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
        ])->exists();

        if (!$alreadyExist) {
            Wishlist::create([
                'session_id' => session()->getId(),
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ]);
        }

        return back()->with('success', 'Product added to wishlist!');
    }

}
