<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd(menues());
        $categories = [];
        foreach (categories() as $category) {
            $item = $category;
            if ($category['slug'] !== 'safety-surfacing-edging') {
                // $productQuery = Product::query()->with('images')
                //     ->select(['id', 'name', 'slug', 'type', 'category', 'sub_category', 'price'])
                //     ->whereType($category['slug']);

                $item['products_count'] = Product::whereType($category['slug'])->count();
                // $item['product'] = $productQuery->clone()
                //     ->whereHas('images')
                //     ->whereHas('orders')
                //     ->withCount('orders')
                //     ->orderByDesc('orders_count')
                //     ->first();
                // if (!$item['product']) {
                //     $item['product'] = $productQuery->clone()
                //         ->with('images')
                //         ->whereHas('images')
                //         ->first();
                // }
            }

            $categories[] = $item;
        }
        // dd($categories);

        $ourPicks = Product::with(['images'])->whereHas('images')->where('featured', true)->get();

        $topPicks = Product::query()
            ->with('images')
            ->has('images', '>=', 2)
            // ->whereHas('images')
            ->select(['id', 'name', 'slug', 'type', 'category', 'sub_category', 'price', 'description'])
            ->take(8)
            ->get();

        $deal = Deal::with(['products.product.images'])->first();
        // dd($deal);

        return view('homepage', [
            'categories' => $categories,
            'ourPicks' => $ourPicks,
            'topPicks' => $topPicks,
            'deal' => $deal
        ]);
    }
}
