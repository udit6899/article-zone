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
     * Do some operation before the validation.
     *
     */
    protected function prepareForValidation()
    {
        // Add destination and oldData field to the request
        $this->destination = 'categories';
        $this->oldData = $this->route('category');
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
                'image' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg']
            ];
        } else if ($this->isMethod('patch')) {
            // If request for update operation the return validation rules
            return [
                'name' => ['required', 'string', 'max:255', Rule::unique('categories')->ignore($this->oldData)],
                'description' => ['nullable', 'string', 'max:255'],
                'image' => ['nullable', 'image', 'max:1024', 'mimes:jpeg,png,jpg']
            ];
        }
    }
}
