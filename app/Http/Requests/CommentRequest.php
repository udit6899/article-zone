<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentRequest extends FormRequest
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
     * Add firstOrCreate operation for guest user to store comment
     */
    protected function prepareForValidation()
    {
        // Check the user is authenticated or not
        if (Auth::check()) {
            // If authenticated the return user details
            $this->user = Auth::user();
        } else {
            // If user is not authenticated, then create new one
            $this->user = User::firstOrCreate([
                'name' => $this->name,
                'email' => $this->email,
                'mobile_no' => random_int(5, 10),
                'password' => ''
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['sometimes', 'required', 'string'],
            'email' => ['sometimes', 'required', 'email'],
            'post_id' => [ 'required', 'integer'],
            'comment' => ['required', 'string']
        ];
    }
}
