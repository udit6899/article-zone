<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostStoreRequest extends FormRequest
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
     * Prepare the post details to store
     *
     */
    protected function prepareForValidation()
    {
        // Manage the post details
        $this->request->add([
            'slug' => Str::slug($this->title),
            'is_published' => Auth::check() ? ($this->is_published ? true : false) : true,
        ]);
    }

    /**
     * Get the validation rules that apply to the post store request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'unique:posts'],
            'quote' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'categories' => ['required', 'array', 'min:1'],
            'tags' => ['required', 'array', 'min:1'],
            'image' => ['required', 'image', 'max:5120', 'mimes:jpeg,png,jpg'],
            'is_published' => ['nullable', 'boolean', Rule::in([true, false])],
        ];
    }
}
