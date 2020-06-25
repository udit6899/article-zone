<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TagUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Prepare the tag details for update
     *
     */
    protected function prepareForValidation()
    {
        // Get the tag details from the request
        $tag = $this->route('tag');

        // Manage the tag details
        $tag->name = $this->name ?? $tag->name;
        $tag->slug = Str::slug($this->name) ?? $tag->slug;
    }

    /**
     * Get the validation rules that apply to the tag update request.
     *
     * @return array
     */
    public function rules()
    {
        return ['name' => ['required', 'string', 'max:255',
                Rule::unique('tags')->ignore($this->route('tag'))],
        ];
    }
}
