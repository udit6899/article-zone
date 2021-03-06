<?php

namespace App\Http\Requests\Message;

use App\Models\Message;
use Illuminate\Foundation\Http\FormRequest;

class ReplyRequest extends FormRequest
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
     * Get the validation rules that apply to the message reply request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reply' => ['required', 'string']
        ];
    }
}
