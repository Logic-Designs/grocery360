<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditAdminSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name'=> 'required|string',
            'about'=> 'nullable|string',
            'old_password' => ['nullable','required_with:new_password', function ($attribute, $value, $fail) {
                if (! Hash::check($value, Auth::guard('admin')->user()->password)) {
                    $fail('The provided old password does not match our records.');
                }
            }],
            'new_password' =>'nullable|required_with:old_password,|min:8',
            'image'=> 'nullable|file|mimes:png,jpg',
        ];
    }
}
