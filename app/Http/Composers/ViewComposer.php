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
            $view->with('categories', Category::all());

            // Bind all categories to view
            $view->with('tags', Tag::all());

            // Bind popular posts to view
            $view->with('popularPosts', Post::popular());

            // Bind all recent post to view
            $view->with('recentPosts', Post::recent());
        }
    }
