<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
     * Get the validation rules that apply to the change password request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Your old password didn\'t matched !');
                }
            }],
            'new_password' => ['required', 'string', 'max:255'],
            'confirm_password' => ['required', 'string', 'same:new_password'],
        ];
    }
}
