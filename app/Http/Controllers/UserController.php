<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['web', 'auth']);
    }

    // View account page operation
    public function account(Request $request) {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    // Update user details operation
    public function updateUser(UpdateUserDetail $request) {

        // Get validated data from request
        $validData = $request->validated();

        // Get user data from db
        $user =  Auth::user();

        // Update user details
        User::where($user)->update([
           name => $validData->name || $user->name,
           mobile_no => $validData->mobile_no || $user->mobile_no,
           gender => $validData->gender || $user->gender,
           age => $validData->age || $user->age,
           about => $validData->about || $user->about,
           address => $validData->address || $user->address,
           privacy => $validData->privacy || 'private'
        ]);

        $status = '';

        // Return success response if user details updated
        if ($user->wasChanged()) {
            $status = '<div class="alert alert-success text-center alert-dismissible show" role="alert">
                            <strong>Your profile updated successfully !</strong>
                       </div>';
        } else {
            $status = '<div class="alert alert-success text-center alert-dismissible show" role="alert">
                            <strong>Your profile update failed !</strong>
                       </div>';
        }

        // Return response
        return redirect()->route('account')->with('status', $status);
    }
}
