<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|string',
            'password'=> 'nullable|string|min:8|confirmed',
            'role'=> 'required|in:1,2',
            'email'=> 'required|email|unique:admins,email,'.$this->route('admin')->id,
        ];
    }
}
