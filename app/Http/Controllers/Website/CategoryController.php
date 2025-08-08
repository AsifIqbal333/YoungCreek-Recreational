<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $type)
    {
        $category = collect(categories())->where('slug', $type)->first();
        abort_if(!$category, 404);

        return view('products.categories', compact('category'));
    }
}
