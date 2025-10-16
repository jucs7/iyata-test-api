<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'state' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name field is required.',
            'phone.required' => 'Phone field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Invalid email address.',
        ];
    }
}
