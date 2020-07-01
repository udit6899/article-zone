<?php

    namespace App\Http\Composers;

    use App\Models\Category;
    use App\Models\Post;
    use App\Models\Tag;
    use Illuminate\View\View;

    class ViewComposer
    {

        /**
         * Initialize composer
         *
         * @return void
         */
        public function __construct()
        {

        }

        /**
         * Bind common data to the view
         *
         * @param  View  $view
         * @return void
         */
        public function compose(View $view)
        {

            // Bind all categories to view
            $view->with('categories', Category::has('posts')->get());

            // Bind all categories to view
            $view->with('tags', Tag::has('posts')->get());

            // Get popular posts
            $popularPosts = Post::published()->popular()
                ->take(env('POPULAR_POST', 5))->get();

            // Bind popular posts to view
            $view->with('popularPosts', $popularPosts);

            // Bind all recent post to view
            $view->with('recentPosts', Post::recent());
        }
    }
