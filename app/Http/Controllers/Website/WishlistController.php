<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        $productsIds = Wishlist::query()
            ->where(function ($q) {
                if (auth()->check()) {
                    $q->where('session_id', session()->getId())
                        ->orWhere('user_id', auth()->id());
                } else {
                    $q->where('session_id', session()->getId());
                }
            })->select('product_id');

        $products = Product::with(['images'])->whereIn('id', $productsIds)->get();

        $featuresProducts = Product::with(['images'])->whereHas('images')->where('featured', true)->get();

        return view('wish-list', [
            'products' => $products,
            'featuresProducts' => $featuresProducts,
        ]);
    }

    /**
     * Add product to wish list.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // check if item is already in cart or not
        $alreadyInWishlist = Wishlist::query()
            ->where(function ($q) {
                if (auth()->check()) {
                    $q->where('session_id', session()->getId())
                        ->orWhere('user_id', auth()->id());
                } else {
                    $q->where('session_id', session()->getId());
                }
            })
            ->where('product_id', $request->product_id)
            ->exists();

        if ($alreadyInWishlist) {
            return back();
        }

        Wishlist::create([
            'product_id' => $request->product_id,
            'session_id' => session()->getId(),
            'user_id' => auth()->id(),
        ]);

        return to_route('wish-list.index')->with('success', 'Product added to wishlist!');
    }

    /**
     * Remove product to wish list.
     */
    public function destroy(string $wishlist)
    {
        Wishlist::query()
            ->where(function ($q) {
                if (auth()->check()) {
                    $q->where('session_id', session()->getId())
                        ->orWhere('user_id', auth()->id());
                } else {
                    $q->where('session_id', session()->getId());
                }
            })
            ->where('product_id', $wishlist)
            ->delete();

        return back()->with('success', 'Product removed from wishlist!');
    }
}
