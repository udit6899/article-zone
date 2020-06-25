<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryUpdateRequest extends FormRequest
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
     * Prepare the category details for update
     *
     */
    protected function prepareForValidation()
    {
        // Get the category details from the request
        $category = $this->route('category');

        // Manage the category details
        $category->name = $this->name ?? $category->name;
        $category->slug = Str::slug($this->name) ?? $category->slug;
        $category->description = $this->description ?? $category->description;
    }

    /**
     * Get the validation rules that apply to the category update request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255',
                Rule::unique('categories')->ignore($this->route('category'))],
            'image' => ['nullable', 'image', 'max:5120', 'mimes:jpeg,png,jpg'],
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }
}
