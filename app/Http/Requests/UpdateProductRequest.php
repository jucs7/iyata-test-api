<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category_id' => 'nullable|exists:categories,id',
            'supplier_id' => 'sometimes|required|exists:suppliers,id',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0|max:99999999.99',
            'stock' => 'sometimes|required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.exists' => 'Selected category does not exist.',
            'supplier_id.required' => 'Supplier field is required.',
            'supplier_id.exists' => 'Selected supplier does not exist.',
            'name.required' => 'Name field is required.',
            'price.required' => 'Price field is required.',
            'price.numeric' => 'Price field must be a number.',
            'price.min' => 'Price field must be a positive number.',
            'stock.required' => 'Stock field is required.',
            'stock.integer' => 'Stock field must be an integer.',
            'stock.min' => 'Stock field must be a positive number.',
        ];
    }
}
