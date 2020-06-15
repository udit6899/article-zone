<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Add post viewcount middleware
     */
    public function __construct()
    {
        $this->middleware('viewCount')->only('details');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get all latest post
        $posts = Post::published()->latest()->get();


        // Return to welcome view
        return view('welcome', compact('posts'));
    }

    /**
     * Show the application about-us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        // Return to about page
        return view('common.about');
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        // Return to contact page
        return view('common.contact');
    }

    /**
     * Show the application post detail page
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request, $slug)
    {
        // Get a specific post by slug
        $post = $request->post;

        // Get some random posts
        $randomPosts = Post::published()->get()->random(3);

        // Return to post details view
        return view('common.details', compact('post', 'randomPosts'));
    }

    /**
     * Show the application post categories page
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        // Return to post category view
        return view('common.category');
    }

}
