<?php

namespace App\Http\Controllers\Common;

use App\Helpers\GuestUserHelper;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentStoreRequest;
use App\Http\Requests\Comment\CommentUpdateRequest;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
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
     * @param  CommentStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentStoreRequest $request)
    {
        // Get the user details
        $user = GuestUserHelper::getOrCreate($request);

        // Store new comment in DB
        $comment = Comment::create(array_merge($request->input(),
            ['user_id' => $user->id, 'is_approved' => $user->is_admin ? true : false]
        ));

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
     * Update the specified comment in storage.
     *
     * @param  CommentUpdateRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {

        // Update the comment details
        $comment->update();

        // Make success response
        if (Auth::user()->is_admin) {

            Toastr::success('Your Comment Successfully Updated !', 'Success');
        } else {

            if ($request->previousApprovedStatus) {

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
