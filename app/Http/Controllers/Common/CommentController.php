<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Apply the middleware for operations
     */
    public function __construct()
    {
        // Apply auth and admin middleware only for admin
        $this->middleware(['auth', 'admin'])->only(['all, pending', 'approve']);
        // Apply auth middleware for both admin and author
        $this->middleware(['auth'])->only(['index', 'update', 'destroy']);
    }

    /**
     * Display a listing of the own comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all latest comments of the user
        $comments = Auth::user()->comments()->latest()->get();

        // Return to index view
        return view('common.comment.index', compact('comments'));
    }


    /**
     * Display a listing of the pending comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        // Get all pending comments
        $comments = Comment::where('is_approved', false)->latest()->get();

        // Return to index view
        return view('common.comment.index', compact('comments'));
    }

    /**
     * Display a listing of the all comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        // Get all latest comments
        $comments = Comment::latest()->get();

        // Return to index view
        return view('common.comment.index', compact('comments'));
    }


    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        // Store new comment in DB
        $comment = new Comment([
            'user_id' => $request->user->id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'is_approved' => $request->user->is_admin ? true : false
        ]);

        $comment->save();

        // Make success response
        if ($request->user->is_admin) {
            Toastr::success('Your Comment Successfully Added !', 'Success');
        } else {
            Toastr::success('Your Comment Successfully Added ! Wait For Admin Approval.', 'Success');
        }

        // Redirect to back
        return redirect()->back();
    }

    /**
     * Approve the comment by admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, Comment $comment)
    {
        // Check the comment is approved or not
        if ($comment->is_approved == false) {

            // If comment is not approved, then approve it
            $comment->update(['is_approved' => true]);

            // Make success response
            Toastr::success('Comment Successfully Approved !', 'Success');
        } else {
            // If comment is already approved, then make info response
            Toastr::info('This comment is already approved !', 'info');
        }

        // Return to back page
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        // Validate the request
        $this->validate($request, ['comment' => 'required|string']);

        // Update the comment details
        $comment->update([
            'comment' => $request->comment,
            'is_approved' => Auth::user()->is_admin && $comment->is_approved
        ]);

        // Make success response
        if (Auth::user()->is_admin) {
            Toastr::success('Your Comment Successfully Updated !', 'Success');
        } else {
            Toastr::success('Your Comment Successfully Updated ! Wait For Admin Approval.', 'Success');
        }

        // Redirect to back
        return redirect()->back();
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        // Delete comment from db
        $comment->delete();

        // Make success response
        Toastr::success('Comment Successfully Deleted !', 'Success');

        // Return to index page
        return redirect()->back();
    }
}
