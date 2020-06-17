<?php

namespace App\Http\Controllers\Common;

use App\Helpers\FileHelper;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BasePostController extends Controller
{

    protected $prefix;

    /**
     * Display a listing of the posts
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all latest posts of user
        $posts = Auth::user()->posts()->latest()->get();

        // Return to index view
        return view("$this->prefix.post.index", compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all post's categories
        $categories = Category::all();

        // Get all post's tags
        $tags = Tag::all();

        // Return to add post view
        return view("$this->prefix.post.create", compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $user = Auth::user();

        // Store uploaded image : Storage/posts
        $imageUrl = FileHelper::upload(
            $request->file('image'), [ 0 => 'posts'],
            [0 => ['width' => 338, 'height' => 245]]
        );

        // Prepare post option to store
        $post = new Post([
            'user_id' => $user->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'quote' => $request->quote,
            'body' => $request->body,
            'image' => $imageUrl,
            'is_published' => $request->is_published ? true : false,
            'is_approved' => $user->is_admin ? true : false,
        ]);
        $post->save();

        // Store post's category and togs
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        if ($user->is_admin) {
            // If user is admin, Send notification to the all subscribers
            NotificationHelper::notify('subscriber', $post);
        } else {
            // If user is author, Send notification to admin
            NotificationHelper::notify('admin', $post);
        }

        // Create success message
        Toastr::success('Your Post Successfully Saved !', 'Success');

        // Return to index view
        return redirect()->route("$this->prefix.post.index");
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Get all post's categories
        $categories = Category::all();

        // Get all post's tags
        $tags = Tag::all();

        // Return to add post view
        return view("$this->prefix.post.edit", compact('post', 'tags', 'categories'));

    }

    /**
     * Update the specified post in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $slug = Str::slug($request->title);

        // Store uploaded image : Storage/posts
        $imageUrl = FileHelper::upload(
            $request->file('image'), [ 0 => 'posts'],
            [0 => ['width' => 338, 'height' => 245]], $post->image
        );


        // Prepare post option to update
        $post->update([
            'title' => $request->title ? $request->title : $post->title,
            'slug' => $slug ? $slug : $post->slug,
            'quote' => $request->quote ? $request->quote : $post->quote,
            'body' => $request->body ? $request->body : $post->body,
            'image' => $imageUrl,
            'is_published' => $request->is_published ? true : false,
        ]);

        // Update post's category and togs
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        // Create success message
        Toastr::success('Post Successfully Updated !', 'Success');

        // Return to index view
        return redirect()->route("$this->prefix.post.index");
    }


    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Storage::disk('public')->exists('posts/'.$post->image)) {
            // Delete associated post image for header if exists
            Storage::disk('public')->delete('posts/'.$post->image);
        }

        if (Storage::disk('public')->exists('posts/slider/'.$post->image)) {
            // Delete associated post image for slider if exists
            Storage::disk('public')->delete('posts/slider/'.$post->image);
        }

        // Remove all categories and tags of the post from pivot table
        $post->categories()->detach();
        $post->tags()->detach();

        // Delete post from db
        $post->delete();

        // Make success response
        Toastr::success('Post Successfully Deleted !', 'Success');

        // Return to index page
        return redirect()->back();
    }
}
