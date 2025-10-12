<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'passsword' => 'required|min:6|confirmed',
            'role' => 'in:admin,user',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email is required.',
            'email.unique' => 'Email already registered.',
            'email.email' => 'Invalid Email address.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters long.',
            'password.confirmed' => 'Confirm your password.',
        ];
    }
}
