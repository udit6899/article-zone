<?php

namespace App\Providers;

use App\Models\Post;
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
        View::composer(
            [
                'common.pages.post-search','common.pages.post-details', 'common.pages.post-category',
                'common.pages.contact', 'welcome', 'common.pages.about', 'auth.login', 'auth.register',
                'common.pages.author-profile', 'common.pages.post-tag', 'common.pages.post-create',
                'common.pages.post-tag-items', 'common.pages.post-category-items'
            ],
            'App\Http\Composers\ViewComposer'
        );

        // Pass random post to view
        View::composer(
            [
                'common.pages.post-details', 'common.pages.post-search',
                'common.pages.author-profile', 'common.pages.post-tag-items',
                'common.pages.post-category-items'
            ], function ($view) {

            // Bind random posts to view
            $view->with('randomPosts', Post::published()->get()->random(3));
        });
    }
}
