<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;

class PostViewCount
{
    /**
     * Handle an incoming request to count the post's views.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Get a specific post by slug
        $post = $request->route('post');

        if ($post->is_approved && $post->is_published) {

            // Count the post view
            $blogKey = 'blog_' . $post->id;

            // If the key is not present in session, then increment the count
            if (!session()->has($blogKey)) {
                $post->increment('view_count');
                session()->put($blogKey, 1);
            }

            return $next($request);

        } else {

            // Return not found
            abort(404);
        }
    }
}
