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


// GET: routes for index page
Route::get('/', function () {
    return view('index', [ 'title' => 'Article Zone' ]);
})->name('home');

// GET: routes for about page
Route::get('/about', function () {
    return view('pages.about', [ 'title' => 'About me' ]);
})->name('about');

// GET: routes for contact page
Route::get('/contact', function () {
    return view('pages.contact', [ 'title' => 'Contact' ]);
})->name('contact');


// Routes group for articles
Route::prefix('article')->name('article.')->group(function () {

    // GET: routes for category page
    Route::get('/category', function () {
        return view('articles.category', [ 'title' => 'Categories' ]);
    })->name('category');

    // GET: routes for single-article page
    Route::get('/{title}', function () {
            return view('articles.single-article', [ 'title' => 'Single Article' ]);
    })->name('singleArticle');
});
