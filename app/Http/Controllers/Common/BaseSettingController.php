<?php

namespace App\Http\Controllers\Common;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\ChangePasswordRequest;
use App\Http\Requests\Setting\ProfileSettingRequest;
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
     * @param ProfileSettingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(ProfileSettingRequest $request)
    {

        // Store uploaded image for user
        $imageUrl = FileHelper::manageUpload(
            $request->file('image'), 'user', $request->oldImageUrl);

        // Update user details
        Auth::user()->update(array_merge($request->input(), ['avatar_path' => $imageUrl]));

        // Make success response
        Toastr::success('Your Profile Successfully Updated !', 'Success');

        // Redirect to index page
        return redirect()->back();
    }

    /**
     * Update password of the user
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(ChangePasswordRequest $request)
    {

        // Update new password
        Auth::user()->update([ 'password' => Hash::make($request->new_password) ]);

        // Make success response
        Toastr::success('Your Password Successfully Updated.', 'Success');

        // Redirect to index page
        return redirect()->back();
    }
}
