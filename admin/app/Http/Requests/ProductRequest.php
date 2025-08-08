<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'type' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'sub_category' => ['nullable', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['required', 'string', 'max:255'],
            'lead_time' => ['nullable', 'string', 'max:255'],
            'age_group' => ['nullable', 'string', 'max:255'],
            'length' => ['nullable', 'string', 'max:255'],
            'width' => ['nullable', 'string', 'max:255'],
            'min_capacity' => ['nullable', 'string', 'max:255'],
            'max_capacity' => ['nullable', 'string', 'max:255'],
            'playground_series' => ['nullable', 'string', 'max:255'],
            'recycled_content' => ['nullable', 'string', 'max:255'],
            'materials' => ['nullable', 'string', 'max:255'],
            'quick_ship_item' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'dimensions' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'seo_description' => ['required', 'string', 'max:160'],
        ];
    }
}
