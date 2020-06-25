<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;

class AuthorController extends Controller
{

    /**
     * Apply the confirm-password middleware to delete author
     *
     */
    public function __construct()
    {
        $this->middleware('password.confirm')->only('destroy');
    }


    /**
     * Display a listing of the authors details.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the author lists
        $authors = User::admin(false)->withCount('posts')->withCount('comments')->get();

        // Return to index page
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Remove the specified author from storage.
     *
     * @param  \App\Models\User  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $author)
    {
        // Check author's permission
        if ($author->is_admin) {

            // If user is admin, show danger message
            Toastr::error('Permission Denied !', 'Error');
        } else {

            // Delete the associated image of user
            FileHelper::delete("users/$author->avatar_path");

            // Delete author details from db
            $author->delete();

            // Make success response
            Toastr::success('Author Successfully Deleted !', 'Success');
        }

        // Return to index page
        return redirect()->back();
    }
}
