<?php

namespace App\Http\Controllers\Common;

use App\Helpers\GuestUserHelper;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaseCommentController extends Controller
{

    protected $prefix;

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
        return view("$this->prefix.comment.index", compact('comments'));
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get the user details
        $user = GuestUserHelper::getOrcreate($request);

        // Validate the request
        $this->validate($request, [
            'post_id' => [ 'required', 'integer'],
            'comment' => ['required', 'string']
        ]);

        // Store new comment in DB
        $comment = new Comment([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'is_approved' => $user->is_admin ? true : false
        ]);

        $comment->save();

        // Make success response
        if ($user->is_admin) {
            Toastr::success('Your Comment Successfully Added !', 'Success');
        } else {
            // Notify admin to approve the new comment
            NotificationHelper::notify('admin', $comment, 'comment', 'new');
            Toastr::success('Your Comment Successfully Added ! Wait For Admin Approval.', 'Success');
        }

        // Redirect to back
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
        $previousApprovedStatus = $comment->is_approved;

        // Update the comment details
        $comment->update([
            'comment' => $request->comment,
            'is_approved' => Auth::user()->is_admin && $comment->is_approved
        ]);

        // Make success response
        if (Auth::user()->is_admin) {
            Toastr::success('Your Comment Successfully Updated !', 'Success');
        } else {
            if ($previousApprovedStatus == true) {
                // Notify admin to approve the updated comment
                NotificationHelper::notify('admin', $comment, 'comment', 'update');
            }
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
