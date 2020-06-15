<?php

namespace App\Providers;

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
                'common.details', 'common.category', 'common.contact',
                'welcome', 'common.about', 'auth.login', 'auth.register'
            ],
            'App\Http\Composers\ViewComposer'
        );
    }
}
