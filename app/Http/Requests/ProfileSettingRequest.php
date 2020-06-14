<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileSettingRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'mobile_no' => ['nullable', 'digits:10', Rule::unique('users')->ignore(Auth::user())],
            'about' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
        ];
    }
}
