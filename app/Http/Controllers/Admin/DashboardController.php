<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Message;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /*
     * Show dashboard of admin
     */
    public function index() {

        $data = array(

            // Get the total posts
            'totalPosts' => Post::count(),

            // Get total post's views
            'totalPostViews' => Post::sum('view_count'),

            // Get total post's comments
            'totalPostComments' => Post::withCount('comments')->get()->sum('comments_count'),

            // Get the total subscribers
            'totalMessages' => Message::count(),

            // Get the total authors
            'totalAuthors' => User::admin(false)->count(),

            // Get most popular posts
            'popularPosts' => Post::popular()->take(env('POPULAR_POST', 5))->get(),

            // Get most active authors
            'activeAuthors' => User::admin(false)
                ->withCount('posts')->withCount('comments')
                ->orderByDesc('posts_count')->orderByDesc('comments_count')
                ->take(env('ACTIVE_AUTHOR', 5))->get()

        );

        // Return to admin dashboard
        return view('admin.dashboard', compact('data'));
    }
}
