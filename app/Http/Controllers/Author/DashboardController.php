<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /*
     * Show dashboard of author
     */
    public function index() {

        // Get the author details
        $user = Auth::user();

        $data = array(

            // Get author's total posts
            'totalPosts' => $user->posts->count(),

            // Get author's popular posts
            'popularPosts' => $user->posts()->popular(env('POPULAR_POST', 4)),

            // Get author's total post views
            'totalPostViews' => $user->posts()->sum('view_count'),

            // Get author's total pending posts
            'totalPendingPosts' => $user->posts()->approved(false)->count(),

            // Get author's post total comments
            'totalPostComments' => $user->posts()->withCount('comments')->get()->sum('comments_count')
        );

        // Return to author dashboard
        return view('author.dashboard', compact('data'));
    }
}
