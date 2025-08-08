<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['totalProducts'] = Product::count();
        $data['totalOrders'] = Order::count();
        $data['totalQuotes'] = QuoteRequest::count();
        $data['products'] = Product::with(['images'])->latest()->take(5)->get();
        $data['orders'] = Order::with(['user'])->latest()->take(5)->get();
        $data['quotes'] = QuoteRequest::latest()->take(5)->get();

        return view('admin.dashboard', compact('data'));
    }
}
