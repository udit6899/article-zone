<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
        $this->destination = 'posts';
        $this->oldData = $this->route('post');
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
                'title' => ['required', 'string', 'unique:posts'],
                'quote' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
                'categories' => ['required', 'array', 'min:1'],
                'tags' => ['required', 'array', 'min:1'],
                'image' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
                'is_published' => ['nullable', 'boolean','in:1'],
            ];
        } else if ($this->isMethod('patch')) {
            // If request for update operation the return validation rules
            return [
                'title' => ['nullable', 'string', Rule::unique('posts')->ignore($this->oldData)],
                'quote' => ['nullable', 'string', 'max:255'],
                'body' => ['nullable', 'string'],
                'categories' => ['required', 'array', 'min:1'],
                'tags' => ['required', 'array', 'min:1'],
                'image' => ['nullable', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
                'is_published' => ['nullable', 'boolean','in:1'],
            ];
        }
    }
}
