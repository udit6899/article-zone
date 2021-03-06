<?php

namespace App\Http\Requests\Comment;

use App\Helpers\GuestUserHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentStoreRequest extends FormRequest
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
     * Get the validation rules that apply to the comment store request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post_id' => [ 'required', 'integer', Rule::exists('posts', 'id')],
            'comment' => ['required', 'string']
        ];
    }
}
