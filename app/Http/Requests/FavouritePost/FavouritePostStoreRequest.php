<?php

namespace App\Http\Requests\FavouritePost;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FavouritePostStoreRequest extends FormRequest
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
        return  [
            'post_id' => [ 'required', 'integer', Rule::exists('posts', 'id')],
        ];
    }
}
