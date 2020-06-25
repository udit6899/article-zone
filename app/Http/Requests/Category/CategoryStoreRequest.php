<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryStoreRequest extends FormRequest
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
     * Store category slug in request
     *
     */
    protected function prepareForValidation()
    {
        $this->request->add(['slug' => Str::slug($this->name)]);
    }

    /**
     * Get the validation rules that apply to the category store request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
            'description' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:5120', 'mimes:jpeg,png,jpg']
        ];
    }
}
