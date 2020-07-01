<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Common\BaseCommentController;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommentController extends BaseCommentController
{

    /**
     * Initialize the comment view prefix for admin
     */
    public function __construct()
    {
        $this->prefix = 'admin';

        // Apply policy action ability for admin
        $this->authorizeResource(Comment::class, 'comment');
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
        return view('admin.comment.index', compact('comments'));
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
        return view('admin.comment.index', compact('comments'));
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

        // Approve the comment details
        $comment->update(['is_approved' => true]);

        // Notify author to inform that, comment is approved
        NotificationHelper::notify('author', $comment, 'comment');

        // Make success response
        Toastr::success('Comment Successfully Approved !', 'Success');

        // Return to back page
        return redirect()->back();
    }

}
