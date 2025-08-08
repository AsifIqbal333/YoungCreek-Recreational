<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class CheckoutRequest extends FormRequest
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
        $rules = [
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
            'billing_first_name' => ['required', 'string', 'max:255'],
            'billing_last_name' => ['required', 'string', 'max:255'],
            'billing_company_name' => ['required', 'string', 'max:255'],
            'billing_country_id' => ['required', 'string', 'exists:countries,id'],
            'billing_address_1' => ['required', 'string', 'max:255'],
            'billing_address_2' => ['nullable', 'string', 'max:255'],
            'billing_city' => ['required', 'string', 'max:255'],
            'billing_postcode' => ['required', 'string', 'max:255'],
            'billing_phone' => ['required', 'string', 'max:255'],
            'order_comments' => ['required', 'string'],
            'ship_to_different_address' => 'sometimes|boolean',
        ];

        // check if user is loggedin or not. if not then must include password
        if (!auth()->user()) {
            $rules = array_merge($rules, [
                'password' => ['required', 'min:8', Rules\Password::defaults()]
            ]);
        }

        // Add conditional validation rules
        if ($this->has('ship_to_different_address') && $this->input('ship_to_different_address') == '1') {
            $rules = array_merge($rules, [
                'shipping_first_name' => ['required', 'string', 'max:255'],
                'shipping_last_name' => ['required', 'string', 'max:255'],
                'shipping_company_name' => ['required', 'string', 'max:255'],
                'shipping_country_id' => ['required', 'string', 'exists:countries,id'],
                'shipping_address_1' => ['required', 'string', 'max:255'],
                'shipping_address_2' => ['nullable', 'string', 'max:255'],
                'shipping_city' => ['required', 'string', 'max:255'],
                'shipping_postcode' => ['required', 'string', 'max:255'],
            ]);
        }

        return $rules;
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'shipping_first_name.required' => 'The shipping first name is required when shipping to a different address.',
            'shipping_last_name.required' => 'The shipping last name is required when shipping to a different address.',
            'shipping_company_name.required' => 'The shipping company name is required when shipping to a different address.',
            'shipping_country_id.required' => 'The shipping country is required when shipping to a different address.',
            'shipping_address_1.required' => 'The shipping address is required when shipping to a different address.',
            'shipping_city.required' => 'The shipping city is required when shipping to a different address.',
            'shipping_postcode.required' => 'The shipping postcode is required when shipping to a different address.',
        ];
    }
}
