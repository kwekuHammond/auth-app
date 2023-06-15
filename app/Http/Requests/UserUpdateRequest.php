<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'min:5'],
            'password' => ['sometimes', 'string', 'min:6'],
            'email' => ['sometimes', Rule::unique('users', 'email')->ignore(Request::get('email'), 'email')],
            'phone' => ['sometimes', 'digits:10', Rule::unique('users', 'phone')->ignore(Request::get('phone'), 'phone')],
        ];
    }
}
