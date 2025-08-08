<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'shipping_first_name' => ['required', 'string', 'max:255'],
            'shipping_last_name' => ['required', 'string', 'max:255'],
            'shipping_company_name' => ['required', 'string', 'max:255'],
            'shipping_country_id' => ['required', 'string', 'exists:countries,id'],
            'shipping_address_1' => ['required', 'string', 'max:255'],
            'shipping_address_2' => ['nullable', 'string', 'max:255'],
            'shipping_city' => ['required', 'string', 'max:255'],
            'shipping_postcode' => ['required', 'string', 'max:255'],
            'shipping_phone' => ['nullable', 'string', 'max:255'],
            'shipping_email' => ['nullable', 'email', 'max:255'],
        ];
    }
}
