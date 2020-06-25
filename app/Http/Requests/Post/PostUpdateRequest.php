<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostUpdateRequest extends FormRequest
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
     * Prepare the post details for update
     *
     */
    protected function prepareForValidation()
    {
        // Get the post details from the request
        $post = $this->route('post');

        // Manage the post details
        $this->previousApprovedStatus = $post->is_approved;
        $post->slug = Str::slug($this->title) ?? $post->slug;
        $post->title = $this->title ?? $post->title;
        $post->quote = $this->quote ?? $post->quote;
        $post->body = $this->body ?? $post->body;
        $post->is_published = $this->is_published ? true : false;
        $post->is_approved =  Auth::user()->is_admin ? true : false;
    }


    /**
     * Get the validation rules that apply to the post update request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['nullable', 'string',
                Rule::unique('posts')->ignore($this->route('post'))],
            'quote' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'categories' => ['required', 'array', 'min:1'],
            'tags' => ['required', 'array', 'min:1'],
            'image' => ['nullable', 'image', 'max:5120', 'mimes:jpeg,png,jpg'],
            'is_published' => ['nullable', 'boolean','in:1'],
        ];
    }
}
