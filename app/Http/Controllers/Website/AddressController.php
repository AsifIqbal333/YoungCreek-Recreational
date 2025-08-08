<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\BillingAddressRequest;
use App\Http\Requests\ShippingAddressRequest;
use App\Models\Country;
use App\Models\UserInfo;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return view('my-account.address', [
            'userInfo' => UserInfo::with(['billingCountry:id,name', 'shippingCountry:id,name'])->where('user_id', auth()->id())->first(),
            'countries' => Country::select(['id', 'name'])->get()
        ]);
    }

    public function updateBilling(BillingAddressRequest $request)
    {
        UserInfo::updateOrCreate(['user_id' => auth()->id()], $request->validated());

        return to_route('my-account.address')->with('success', 'Billing address updated successfully!');
    }

    public function updateShipping(ShippingAddressRequest $request)
    {
        UserInfo::updateOrCreate(['user_id' => auth()->id()], $request->validated());

        return to_route('my-account.address')->with('success', 'Shipping address updated successfully!');
    }

    public function copyBilling(Request $request)
    {
        $userInfo = UserInfo::where('user_id', auth()->id())->first();

        if (!$userInfo && $userInfo->billing_first_name === null) {
            return back()->with('error', 'Billing address not set yet!');
        }

        $userInfo->update([
            'shipping_first_name' => $userInfo->billing_first_name,
            'shipping_last_name' => $userInfo->billing_last_name,
            'shipping_phone' => $userInfo->billing_phone,
            'shipping_company_name' => $userInfo->billing_company_name,
            'shipping_country_id' => $userInfo->billing_country_id,
            'shipping_address_1' => $userInfo->billing_address_1,
            'shipping_address_2' => $userInfo->billing_address_2,
            'shipping_city' => $userInfo->billing_city,
            'shipping_state_id' => $userInfo->billing_state_id,
            'shipping_postcode' => $userInfo->billing_postcode,
            'shipping_email' => $userInfo->billing_email,
        ]);

        return back()->with('success', 'Billing address successfully copied to shipping address!');
    }
}
