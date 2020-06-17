<?php

namespace App\Http\Controllers\Common;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSettingRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BaseSettingController extends Controller
{

    protected $prefix;

    /**
     * Display the user settings page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return to settings view
        return view("$this->prefix.setting.settings");
    }

    /**
     * Update profile setting of the user
     *
     * @param \App\Http\Requests\ProfileSettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(ProfileSettingRequest $request)
    {
        // Get user's old details
        $user = Auth::user();

        // Store uploaded image : Storage/users
        $imageUrl = FileHelper::upload(
            $request->file('image'), [0 => 'users'],
            [0 => ['width' => 176, 'height' => 176]], $user->avatar_path
        );

        // Update user details
        $user->update([
            'name' => $request->name ? $request->name : $user->name,
            'mobile_no' => $request->mobile_no ? $request->mobile_no : $user->mobile_no,
            'about' => $request->about ? $request->about : $user->about,
            'avatar_path' => $imageUrl
        ]);

        // Make success response
        Toastr::success('Your Profile Successfully Updated !', 'Success');

        // Redirect to index page
        return redirect()->back();
    }

    /**
     * Update password of the user
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {

        // Validate the request
        $this->validate($request, [
            'old_password' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Your old password didn\'t matched !');
                }
            }],
            'new_password' => ['required', 'string', 'max:255'],
            'confirm_password' => ['required', 'string', 'same:new_password'],
        ]);

        // Update new password
        Auth::user()->update([ 'password' => Hash::make($request->new_password) ]);

        // Make success response
        Toastr::success('Your Password Successfully Updated.', 'Success');

        // Redirect to index page
        return redirect()->back();
    }
}
