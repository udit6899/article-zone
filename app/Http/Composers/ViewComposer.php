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

            // Bind all categories to view
            $view->with('categories', Category::has('posts')->get());

            // Bind all categories to view
            $view->with('tags', Tag::has('posts')->get());

            // Bind popular posts to view
            $view->with('popularPosts', Post::published()->popular(3));

            // Bind all recent post to view
            $view->with('recentPosts', Post::recent());
        }
    }
