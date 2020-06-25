<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Allowing composer to bind data to views
        View::composer(['common.pages.*', 'welcome', 'auth.*'],

            'App\Http\Composers\ViewComposer'
        );

        // Pass random post to view
        View::composer(['common.pages.*'], function ($view) {

            $randomPosts = Post::published()->get();

            // If collection is not empty then get 3 posts
            if (!$randomPosts->isEmpty()) {
                $randomPosts = $randomPosts->random(3);
            }
            // Bind random posts to view
            $view->with('randomPosts', $randomPosts );
        });

        // Pass tags and categories to view
        View::composer([
            '*.dashboard', 'common.pages.post-create', '*.post.create', '*.post.edit',
        ], function ($view) {

            // Bind all tags to view
            $view->with('allTags', Tag::all());

            // Bind all categories to view
            $view->with('allCategories', Category::all());

        });
    }
}
