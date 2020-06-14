<?php

namespace App\Http\Controllers\Author;

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

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all latest posts of user
        $posts = Auth::user()->posts()->latest()->get();

        // Return to index view
        return view('author.post.index', compact('posts'));
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
        return view('author.post.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // Store uploaded image : Storage/posts
        $imageUrl = FileHelper::upload(
            $request->file('image'), [ 0 => 'posts'],
            [0 => ['width' => 338, 'height' => 245]]
        );

        // Prepare post option to store
        $post = new Post([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'slug' => $request->slug,
            'quote' => $request->quote,
            'body' => $request->body,
            'image' => $imageUrl,
            'is_published' => $request->is_published ? true : false,
            'is_approved' => false
        ]);
        $post->save();

        // Store post's category and togs
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        // Send notification to admin
        NotificationHelper::notify('admin', $post);

        // Create success message
        Toastr::success('Your Post Successfully Saved !', 'Success');

        // Return to index view
        return redirect()->route('author.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Get previous post ID
        $prev = Auth::user()->posts()->where('id', '<', $post->id)->max('id');

        // Get next post ID
        $next = Auth::user()->posts()->where('id', '>', $post->id)->min('id');

        // Return to show post view
        return view('author.post.show', compact('prev', 'post', 'next'));
    }

    /**
     * Show the form for editing the specified resource.
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
        return view('author.post.edit', compact('post', 'tags', 'categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        // Store uploaded image : Storage/posts
        $imageUrl = FileHelper::upload(
            $request->file('image'), [ 0 => 'posts'],
            [0 => ['width' => 338, 'height' => 245]], $post->image
        );

        // Prepare post option to update
        $post->update([
            'title' => $request->title ? $request->title : $post->title,
            'slug' => $request->slug ? $request->slug : $post->slug,
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
        return redirect()->route('author.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Delete associated post images from dir
        Storage::disk('public')->delete('posts/'.$post->image);
        Storage::disk('public')->delete('posts/slider/'.$post->image);

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
