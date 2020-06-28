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
Auth::routes(['verify' => true]);

// GET: routes for index page
Route::get('/', 'HomeController@index')->name('home');


// Routes group for posts
Route::group(['namespace' => 'Common'], function () {

    // GET: route for about page
    Route::get('/about', 'PagesController@about')->name('about');

    // GET: route for contact page
    Route::get('/contact', 'PagesController@contact')->name('contact');

    // POST: route to store message
    Route::resource('message', 'MessageController')->only('store');

    // POST: route to store subscriber
    Route::resource('subscriber', 'SubscriberController')->only('store');

    // Routes for the admin operation
    Route::group(['prefix' => 'admin', 'as' =>'admin.', 'middleware' => ['auth', 'admin', 'verified']], function () {

        // Routes for Subscriber operations
        Route::resource('subscriber', 'SubscriberController')->only(['index', 'destroy']);

        // Routes for message operations
        Route::resource('message', 'MessageController')->only(['index', 'update', 'destroy']);

        // GET: route for read message
        Route::get('message/read', 'MessageController@read')->name('message.read');

        // GET: route for unread message
        Route::get('message/unread', 'MessageController@unread')->name('message.unread');
    });

    // Routes group for common posts
    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {

        // GET: route for create post page
        Route::get('create', 'BasePostController@create'  )->name('create');

        // POST: route to store new post by guest
        Route::post('store', 'BasePostController@store'  )->name('store');

        // GET: route for searched post page
        Route::get('search', 'PagesController@postSearch'  )->name('search');

        // GET: route for post category page
        Route::get('category', 'PagesController@postCategories'  )->name('category');

        // GET: route for post tag page
        Route::get('tag', 'PagesController@postTags'  )->name('tag');

        // GET: route for post tag-item page
        Route::get('tag/{tag}/item', 'PagesController@postTagItems'  )->name('tag.item');

        // GET: route for post category-item page
        Route::get('category/{category}/item', 'PagesController@postCategoryItems'  )->name('category.item');

        // Routes for the comment operations
        Route::post('comment', 'BaseCommentController@store')->name('comment.store');

        // GET: route for post details
        Route::get('details/{post}', 'PagesController@postDetails'  )->name('details');

        // GET: route for author-post-profile view
        Route::get('author/{author}/profile', 'PagesController@authorProfile'  )->name('author.profile');
    });

});


// Routes for the authors
Route::group([
    'prefix' => 'author', 'as' =>'author.',
    'namespace' => 'Author', 'middleware' => ['auth', 'author', 'verified']
], function () {

    // GET: routes for dashboard page
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Routes for Post operations
    Route::resource('post', 'PostController');

    // Routes for the comment operations
    Route::resource('comment', 'CommentController')->only(['index', 'update', 'destroy']);

    // Routes for favourite post operations
    Route::resource('favourite-post', 'FavouritePostController')->only(['index', 'store', 'destroy']);

    // GET: route for settings page
    Route::get('settings', 'SettingController@index')->name('settings.index');

    // PATCH: route for update profile
    Route::patch('settings/profile-update', 'SettingController@updateProfile')
        ->name('settings.profile.update');

    // PATCH: route for update profile
    Route::patch('settings/password-update', 'SettingController@updatePassword')
        ->name('settings.password.update');
});


// Routes for the admin
Route::group([
    'prefix' => 'admin', 'as' =>'admin.',
    'namespace' => 'Admin', 'middleware' => ['auth', 'admin', 'verified']
], function () {

    // GET: routes for dashboard page
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');


    // Routes for Tag operations
    Route::resource('tag', 'TagController');

    // Routes for Category operations
    Route::resource('category', 'CategoryController');

    // Routes for author operations
    Route::resource('author', 'AuthorController')->only(['index', 'destroy']);

    // Routes for favourite post operations
    Route::resource('favourite-post', 'FavouritePostController')->only(['index', 'store', 'destroy']);

    // GET: route for pending post
    Route::get('post/pending', 'PostController@pending')->name('post.pending');

    // GET: route for all post
    Route::get('post/all', 'PostController@all')->name('post.all');

    // PATCH: route for post approval operation
    Route::patch('post/{post}/approve', 'PostController@approve')->name('post.approve');

    // Routes for Post operations
    Route::resource('post', 'PostController');


    // GET: route for all comments
    Route::get('comment/all', 'CommentController@all')->name('comment.all');

    // GET: route for pending comments
    Route::get('comment/pending', 'CommentController@pending')->name('comment.pending');

    // PATCH: route for comment approval
    Route::patch('comment/{comment}/approve', 'CommentController@approve')->name('comment.approve');

    // Routes for the comment operations
    Route::resource('comment', 'CommentController')->only(['index', 'update', 'destroy']);


    // GET: route for settings page
    Route::get('settings', 'SettingController@index')->name('settings.index');

    // PATCH: route for update profile
    Route::patch('settings/profile-update', 'SettingController@updateProfile')
          ->name('settings.profile.update');

    // PATCH: route for update profile
    Route::patch('settings/password-update', 'SettingController@updatePassword')
        ->name('settings.password.update');

});
