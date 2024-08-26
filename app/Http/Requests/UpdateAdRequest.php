<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url1' => 'nullable|url',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url2' => 'nullable|url',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url3' => 'nullable|url',
        ];
    }
}
