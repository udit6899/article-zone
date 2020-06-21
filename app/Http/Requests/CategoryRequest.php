<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            // If request for create operation the return validation rules
            return [
                'name' => ['required', 'string', 'max:255', 'unique:categories'],
                'description' => ['required', 'string', 'max:255'],
                'image' => ['required', 'image', 'max:5120', 'mimes:jpeg,png,jpg']
            ];
        } else if ($this->isMethod('patch')) {
            // If request for update operation the return validation rules
            return [
                'name' => ['required', 'string', 'max:255',
                          Rule::unique('categories')->ignore($this->route('category'))],
                'image' => ['nullable', 'image', 'max:5120', 'mimes:jpeg,png,jpg'],
                'description' => ['nullable', 'string', 'max:255'],
            ];
        }
    }
}
