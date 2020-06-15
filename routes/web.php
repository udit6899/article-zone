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

// Routes group for posts
Route::group(['prefix' => 'post', 'as' => 'post.'], function () {

    // GET: route for post details
    Route::get('details/{slug}', 'HomeController@details'  )->name('details');

    // GET: route for post category page
    Route::get('category', 'HomeController@categories'  )->name('category');
});


// Routes group for posts
Route::group(['namespace' => 'Common'], function () {

    // GET: route for all comments
    Route::get('comment/all', 'CommentController@all')->name('comment.all');

    // GET: route for pending comments
    Route::get('comment/pending', 'CommentController@pending')->name('comment.pending');

    // PATCH: route for comment approval
    Route::patch('comment/{comment}/approve', 'CommentController@approve')->name('comment.approve');

    // Routes for the comment operations
    Route::resource('comment', 'CommentController')->except(['edit', 'show']);

});


// POST: route to store subscriber
Route::post('subscriber', 'Admin\SubscriberController@store')->name('subscriber.store');

// Routes for authors
Route::group([
    'prefix' => 'author', 'as' =>'author.',
    'namespace' => 'Author', 'middleware' => ['auth', 'author']
], function () {

    // GET: routes for dashboard page
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Routes for Post operations
    Route::resource('post', 'PostController');
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

    // Routes for Category operations
    Route::resource('category', 'CategoryController');

    // Routes for Subscriber operations
    Route::resource('subscriber', 'SubscriberController')->except('store');


    // GET: route for pending post
    Route::get('post/pending', 'PostController@pending')->name('post.pending');

    // GET: route for all post
    Route::get('post/all', 'PostController@all')->name('post.all');

    // PATCH: route for post approval operation
    Route::patch('post/{post}/approve', 'PostController@approve')->name('post.approve');

    // Routes for Post operations
    Route::resource('post', 'PostController');


    // Route for settings page
    Route::get('settings', 'SettingController@index')->name('settings.index');

    // Route for update profile
    Route::patch('settings/profile-update', 'SettingController@updateProfile')
          ->name('settings.profile.update');

    // Route for update profile
    Route::patch('settings/password-update', 'SettingController@updatePassword')
        ->name('settings.password.update');

});
