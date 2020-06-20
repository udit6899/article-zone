<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // show dashboard of admin
    public function index() {

        // Get the total posts
        $totalPosts = Post::count();

        // Get total pending posts
        $totalPendingPosts = Post::approved(false)->count();

        // Get total post's views
        $totalPostViews = Post::sum('view_count');

        // Get total post's comments
        $totalPostComments = Post::withCount('comments')->get()->sum('comments_count');

        // Get the total subscribers
        $totalSubscribers = Subscriber::count();

        // Get the total authors
        $totalAuthors = User::admin(false)->count();

        // Get the total categories
        $totalCategories = Category::count();

        // Get the total tags
        $totalTags = Tag::count();

        // Get most popular posts
        $popularPosts = Post::popular(5);

        // Get most active authors
        $activeAuthors = User::admin(false)
            ->withCount('posts')->withCount('comments')
            ->orderByDesc('posts_count')->orderByDesc('comments_count')
            ->take(5)->get();

        return view('admin.dashboard', compact(
            'totalPosts', 'totalTags', 'totalCategories',
            'totalSubscribers', 'totalPostViews', 'totalPostComments',
            'popularPosts', 'activeAuthors', 'totalAuthors', 'totalPendingPosts'
        ));
    }
}
