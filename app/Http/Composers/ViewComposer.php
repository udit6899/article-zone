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
         * Bind data to the view.
         *
         * @param  View  $view
         * @return void
         */
        public function compose(View $view)
        {
            // Get all categories
            $categories = Category::all();
            // Bind categories to view
            $view->with('categories', $categories);

            // Get all categories
            $tags = Tag::all();
            // Bind categories to view
            $view->with('tags', $tags);

            // Get popular posts
            $popularPosts = Post::popular()->take(3)->get();
            // Bind popular posts to view
            $view->with('popularPosts', $popularPosts);

            // Get recent posts
            $recentPosts = Post::published()->latest()->take(3)->get();
            // Bind recent post to view
            $view->with('recentPosts', $recentPosts);
        }
    }
