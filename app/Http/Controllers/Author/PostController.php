<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Common\BasePostController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends BasePostController
{

    /**
     * Initialize the post view prefix for author
     */
    public function __construct()
    {
        $this->prefix = 'author';

        // Apply policy action ability for author
        $this->authorizeResource(Post::class, 'post');
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
        $prev = Auth::user()->posts()->previous($post)->first();

        // Get next post
        $next = Auth::user()->posts()->next($post)->first();

        // Return to show post view
        return view('author.post.show', compact('prev', 'post', 'next'));
    }
}
