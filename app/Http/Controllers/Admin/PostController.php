<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NotificationHelper;
use App\Http\Controllers\Common\BasePostController;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PostController extends BasePostController
{

    /**
     * Initialize the post view prefix for admin
     */
    public function __construct()
    {
        $this->prefix = 'admin';
    }

    /**
     * Display a listing of the pending posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        // Get all pending posts
        $posts = Post::where('is_approved', false)->latest()->get();

        // Return to index view
        return view('admin.post.pending', compact('posts'));
    }

    /**
     * Display a listing of the all resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        // Get all latest posts
        $posts = Post::latest()->get();

        // Return to index view
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Get previous post
        $prev = Post::previous($post)->first();

        // Get next post
        $next = Post::next($post)->first();

        // Return to show post view
        return view('admin.post.show', compact('prev', 'post', 'next'));
    }

    /**
     * Approve post operation by admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, Post $post)
    {
        // Check the post is approved or not
        if ($post->is_approved == false) {

            // If post is not approved, then approve the post
            $post->update(['is_approved' => true]);

            // Send notification to the atuhor
            NotificationHelper::notify('author', $post);

            // Send notification to the all subscribers
            NotificationHelper::notify('subscriber', $post);

            // Make success response
            Toastr::success('Post Successfully Approved !', 'Success');
        } else {
            // If post is already approved, then make info response
            Toastr::info('This post is already approved !', 'info');
        }

        // Return to back page
        return redirect()->back();
    }
}
