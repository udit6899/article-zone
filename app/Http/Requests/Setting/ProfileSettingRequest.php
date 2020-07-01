<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileSettingRequest extends FormRequest
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

    /*
     * Prepare user profile to update
     *
     */
    protected function prepareForValidation()
    {
        // Get current user's old details
        $user = Auth::user();

        // Manage the user details
        $this->request->add([
            'name' => $this->name ?? $user->name,
            'oldImageUrl' => $user->avatar_path,
            'mobile_no' => $this->mobile_no ?? $user->mobile_no,
            'about' => $this->about ?? $user->about
        ]);

    }

    /**
     * Get the validation rules that apply to the profile setting request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'mobile_no' => ['nullable', 'digits:10'],
            'about' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:1024', 'mimes:jpeg,png,jpg'],
        ];
    }
}
