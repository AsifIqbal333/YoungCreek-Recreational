<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $age_groups = $types = $categories = $sub_categories = [];
        foreach (Product::select(['age_group'])->orderBy('age_group', 'desc')->get()->groupBy('age_group') as $group => $value) {
            if ($group !== "") {
                $age_groups[] = $group;
            }
        }

        $productQuery = Product::select(['type', 'category', 'sub_category'])->get();
        foreach ($productQuery->groupBy('type') as $type => $value) {
            if ($type !== "") {
                $types[] = $type;
            }
        }
        foreach ($productQuery->groupBy('category') as $category => $value) {
            if ($category !== "") {
                $categories[] = $category;
            }
        }
        foreach ($productQuery->groupBy('sub_category') as $item => $value) {
            if ($item !== "") {
                $sub_categories[] = $item;
            }
        }

        return view('admin.products.create', compact('age_groups', 'types', 'categories', 'sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // create new product
        $product = Product::create($this->prepareForSaving($request));

        // Handle images
        $this->handleProductImages($product, $request);

        return to_route('admin.products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $age_groups = $types = $categories = $sub_categories = [];
        foreach (Product::select(['age_group'])->orderBy('age_group', 'desc')->get()->groupBy('age_group') as $group => $value) {
            if ($group !== "") {
                $age_groups[] = $group;
            }
        }

        $productQuery = Product::select(['type', 'category', 'sub_category'])->get();
        foreach ($productQuery->groupBy('type') as $type => $value) {
            if ($type !== "") {
                $types[] = $type;
            }
        }
        foreach ($productQuery->groupBy('category') as $category => $value) {
            if ($category !== "") {
                $categories[] = $category;
            }
        }
        foreach ($productQuery->groupBy('sub_category') as $item => $value) {
            if ($item !== "") {
                $sub_categories[] = $item;
            }
        }

        return view('admin.products.edit', compact('product', 'age_groups', 'types', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        // dd($product->images, $request->uploaded_images);
        $product->update($this->prepareForSaving($request));

        // Handle images
        $this->handleProductImages($product, $request);

        return back()->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    protected function handleProductImages(Product $product, Request $request)
    {
        // Delete marked images
        if ($request->has('images_to_delete')) {
            foreach ($request->images_to_delete as $imageId) {
                $image = ProductImage::find($imageId);
                if ($image) {
                    // if image is from local storage
                    if (!str_contains($image->image, "playtopiaplaygrounds.com")) {
                        $this->deleteFile($image->image);
                        Storage::delete($image->image);
                    }

                    $image->delete();
                }
            }
        }

        // Store new images
        if ($request->hasFile('uploaded_images')) {
            foreach ($request->file('uploaded_images') as $file) {
                // $path = $file->store('product_images', 'public');
                $path = $this->fileUpload($file, 'product_images');
                $product->images()->create(['image' => $path]);
            }
        }

        // store images with paths in database
        if ($request->has('uploaded_images')) {
            foreach ($request->uploaded_images as $path) {
                $product->images()->updateOrCreate(['image' => $path], ['image' => $path]);
            }
        }
    }

    private function prepareForSaving(ProductRequest $request)
    {
        $data = $request->validated();
        $description = '<div class="product__description rte quick-add-hidden">';
        $description .= $data['description'];
        $description .= '</div>';

        $data['description_html'] = $description;
        $data['description'] = $data['seo_description'];

        return $data;
    }
}
