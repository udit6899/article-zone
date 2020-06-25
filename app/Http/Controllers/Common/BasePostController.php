<?php

namespace App\Http\Controllers\Common;

use App\Helpers\FileHelper;
use App\Helpers\GuestUserHelper;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Models\Post;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // Making view destination for auth user and guest user
        $view = Auth::check() ? "$this->prefix.post.create" : 'common.pages.post-create';

        // Return to add post view
        return view($view);

    }


    /**
     * Store a newly created post in storage.
     *
     * @param  PostStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        // Get the user details
        $user = GuestUserHelper::getOrCreate($request);

        // Store uploaded image for post
        $imageUrl = FileHelper::manageUpload($request->file('image'), 'post');

        DB::beginTransaction();

        try {

            // Store a new post in Db
            $post = Post::create( array_merge($request->input(), [
                'user_id' => $user->id, 'image' => $imageUrl,
                'is_approved' => $user->is_admin ? true : false,
            ]));

            // Store post's category and togs
            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);

            DB::commit();

            if ($user->is_admin) {

                // If user is admin, Send notification to the all subscribers
                NotificationHelper::notify('subscriber', $post, 'post');
                // Create success message for admin
                Toastr::success('Your Post Successfully Saved !', 'Success');
            } else {

                // If user is author or guest, Send notification to admin
                NotificationHelper::notify('admin', $post, 'post', 'new');
                // Create success message for author and guest
                Toastr::success('Your Post Successfully Saved ! Wait For Admin Approval.', 'Success');
            }

        } catch (\Throwable $throwable) {

            DB::rollBack();

            // Create error message, If update failed
            Toastr::error($throwable->getMessage(), 'Error');
        }

        // Make route path for authorized user and guest user
        $routePath = Auth::check() ? "$this->prefix.post.index" : 'post.create';

        // Return to post view
        return redirect()->route($routePath);
    }


    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // Return to add post view
        return view("$this->prefix.post.edit", compact('post'));

    }


    /**
     * Update the specified post in storage.
     *
     * @param  PostUpdateRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        // Store uploaded image for post
        $imageUrl = FileHelper::manageUpload(
            $request->file('image'), 'post', $post->image);

        DB::beginTransaction();

        try {

            // Prepare post option to update
            $post->update(['image' => $imageUrl]);

            // Update post's category and togs
            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);

            DB::commit();

            if (Auth::user()->is_admin) {
                // Create success message for admin
                Toastr::success('Post Successfully Updated !', 'Success');
            } else {
                if ($request->previousApprovedStatus) {
                    // If user is author, Send notification to admin for approval
                    NotificationHelper::notify('admin', $post, 'post','update');
                }
                // Create success message for author
                Toastr::success('Your Post Successfully Updated ! Wait For Admin Approval.', 'Success');
            }

        } catch (\Throwable $throwable) {

            DB::rollBack();

            // Create error message, If update failed
            Toastr::error($throwable->getMessage(), 'Error');
        }
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
        DB::beginTransaction();

        try {

            // Delete the associated image for post
            FileHelper::delete("posts/$post->image");
            FileHelper::delete("posts/slider/$post->image");

            // Remove all categories and tags of the post from pivot table
            $post->categories()->detach();
            $post->tags()->detach();

            // Delete post from db
            $post->delete();

            DB::commit();

            // Make success response
            Toastr::success('Post Successfully Deleted !', 'Success');

        } catch (\Throwable $throwable) {

            DB::rollBack();

            // Create error message, If update failed
            Toastr::error($throwable->getMessage(), 'Error');
        }


        // Return to index page
        return redirect()->back();
    }
}
