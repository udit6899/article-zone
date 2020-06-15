<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;

class PostViewCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get a specific post by slug
        $request->post = Post::published()->where([
            'slug' => $request->route('slug'),
        ])->first();

        // Count the post view
        $blogKey = 'blog_' . $request->post->id;

        // If the key is not present in session, then increment the count
        if (!session()->has($blogKey)) {
            $request->post->increment('view_count');
            session()->put($blogKey, 1);
        }
        return $next($request);
    }
}
