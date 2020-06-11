<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{

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
        return view('pages.about');
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        // Return to contact page
        return view('pages.contact');
    }

    /**
     * Show the application post detail page
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function details($slug)
    {
        // Get a specific post by slug
        $post = Post::where([
            'slug' => $slug,
            'is_approved' => true,
            'is_published' => true
        ])->first();

        // Return to post details view
        return view('pages.details', compact('post'));
    }

    /**
     * Show the application post categories page
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        // Return to post category view
        return view('pages.category');
    }

}
