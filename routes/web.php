<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Rotes for user auth
Auth::routes();

// GET: routes for index page
Route::get('/', 'HomeController@index')->name('home');

// GET: routes for about page
Route::get('/about', 'HomeController@about')->name('about');

// GET: routes for contact page
Route::get('/contact', 'HomeController@contact')->name('contact');

// Routes group for articles
Route::group(['prefix' => 'article', 'as' => 'article.'], function () {

    // GET: routes for category page
    Route::get('/category', function () {
        return view('articles.category');
    })->name('category');

    // GET: routes for single-article page
    Route::get('/{slug}', function () {
            return view('articles.single-article');
    })->name('singleArticle');
});

// Routes group for users
Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    // GET: routes for account view
    Route::get('account', 'UserController@account')->name('account');
    // PATCH: routes for update user account
    Route::put('account', 'UserController@updateUser')->name('account');
});


// Routes for authors
Route::group([
    'prefix' => 'author', 'as' =>'author.',
    'namespace' => 'Author', 'middleware' => ['auth', 'author']
], function () {

    // GET: routes for dashboard page
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});

// Routes for admin
Route::group([
    'prefix' => 'admin', 'as' =>'admin.',
    'namespace' => 'Admin', 'middleware' => ['auth', 'admin']
], function () {

    // GET: routes for dashboard page
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Routes for Tag operations
    Route::resource('tag', 'TagController');
});
