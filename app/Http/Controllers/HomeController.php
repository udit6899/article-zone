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
        $posts = Post::published()->latest()->paginate(4);

        // Get the admin details
        $admin = User::admin(true)->first();

        // Return to welcome view
        return view('welcome', compact('admin', 'posts'));
    }
}
