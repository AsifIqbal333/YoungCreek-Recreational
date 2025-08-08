<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ThankYouController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        abort_if(!$request->has('order'), 404);
        $order = Order::select(['number', 'tracking_number', 'created_at'])->where('uuid', $request->order)->first();
        abort_if(!$order, 404);

        return view('thank-you', compact('order'));
    }
}
