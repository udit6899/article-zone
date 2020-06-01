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
Route::prefix('article')->name('article.')->group(function () {

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
Route::prefix('user')->name('user.')->group(function () {
    Route::get('account', function () {
       return view('users.profile');
    })->name('account');

    Route::post('account', function () {
        return 'userProfile';
    })->name('account');
});

