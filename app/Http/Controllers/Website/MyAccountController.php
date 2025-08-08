<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillingAddressRequest;
use App\Http\Requests\ShippingAddressRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Country;
use App\Models\UserInfo;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function index()
    {
        return view('my-account.index');
    }

    public function update(UpdateAccountRequest $request)
    {
        $request->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password !== null) {
            $request->user()->update(['password' => Hash::make($request->password)]);
        }

        return back()->with('success', 'Account information updated successfully!');
    }
}
