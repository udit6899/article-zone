<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Rees\Sanitizer\Sanitizer;

class UpdateUserDetail extends FormRequest
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

    // Sanitize input data before validation
    protected function prepareForValidation()
    {
        // Sanitization
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
            'mobile_no' => ['nullable', 'digits:10', 'unique:users'],
            'gender' => ['nullable', 'string', Rule::in(['male', 'female', 'other'])],
            'age' => ['nullable', 'digits_between:18,99'],
            'about' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'privacy' => ['nullable', 'string', 'in:public' ]
        ];
    }
}
