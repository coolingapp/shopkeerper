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
            'product' => 'required|string|max:255', // Assuming 'product' is the name field
            'price' => 'required|numeric', // Assuming 'price' is the price field
            'category' => 'required', // Assuming 'category' is the category field with predefined options
        ];
    }

    public function messages(): array
    {
        return [
            'product.required' => 'The product name is required.',
            'product.string' => 'The product name must be a string.',
            'product.max' => 'The product name must not exceed :max characters.',

            'price.required' => 'The product price is required.',
            'price.numeric' => 'The product price must be a number.',
            'category.required' => 'The product category is required.',
        ];
    }
}
