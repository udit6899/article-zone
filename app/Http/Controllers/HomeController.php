<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application welcome page.
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
}
