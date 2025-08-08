<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealRequest;
use App\Models\Deal;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class DealController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.deals.upsert', ['deal' => $deal = Deal::with('products')->first()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DealRequest $request)
    {
        $productIds = json_decode($request->product_ids);
        if (count($productIds) < 2) {
            return back()->with('error', 'Please select at least 2 products')->withInput();
        }

        $deal = Deal::first();
        if ($deal) {
            $deal->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        } else {
            $deal = Deal::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
        }

        // attach deal products
        $deal->products()->delete();
        foreach ($productIds as $productId) {
            $deal->products()->create(['product_id' => $productId]);
        }

        // Store new images
        if ($request->hasFile('image')) {
            $path = $this->fileUpload($request->file('image'), 'sections');
            $deal->update(['image' => $path]);
        }

        return back()->with('success', 'Deal updated successfully');
    }
}
