<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentUpdateRequest extends FormRequest
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
     * Prepare the updated comment details
     *
     */
    protected function prepareForValidation()
    {
        // Get the comment details from the request
        $comment = $this->route('comment');

        // Manage the comment details
        $this->previousApprovedStatus = $comment->is_approved;
        $comment->comment = $this->comment ?? $comment->comment;
        $comment->is_approved = Auth::user()->is_admin && $this->previousApprovedStatus;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => ['required', 'string']
        ];
    }
}
