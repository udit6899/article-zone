<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\FavouritePost\FavouritePostStoreRequest;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class BaseFavouritePostController extends Controller
{
    protected $prefix;

    /**
     * Display a listing of the favourite post of user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return to index page
        return view("$this->prefix.favourite.index");
    }

    /**
     * Add a post to favorite list of a user
     *
     * @param  FavouritePostStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavouritePostStoreRequest $request)
    {

        // Add the post to authenticated user's favourite list
        Auth::user()->favouritePosts()->attach($request->post_id);

        // Make success respose
        Toastr::success('The article added to your favourite list.', 'Success');

        // Return to back
        return redirect()->back();
    }


    /**
     * Remove the post from favourite list of a user
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $favourite_post)
    {
        // Remove the post from authenticated user's favourite list
        Auth::user()->favouritePosts()->detach($favourite_post->id);

        // Make success response
        Toastr::success('The article removed from your favourite list.', 'Success');

        return redirect()->back();
    }
}
