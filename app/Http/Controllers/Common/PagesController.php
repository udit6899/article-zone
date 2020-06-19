<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Add post viewcount middleware
     */
    public function __construct()
    {
        $this->middleware('viewCount')->only('postDetails');
    }

    /**
     * Show the application about-us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        // Return to about page
        return view('common.pages.about');
    }

    /**
     * Show the application contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        // Return to contact page
        return view('common.pages.contact');
    }

    /**
     * Show the application post detail page
     *
     * @param  string $slug
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postDetails(Request $request, $slug)
    {
        // Get a specific post by slug
        $post = $request->post;

        // Return to post details view
        return view('common.pages.post-details', compact('post'));
    }

    /**
     * Show the searched post lists
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function postSearch(Request $request)
    {
        // Get query from the request
        $query = $request->query('query');

        // Retrieve the searched post
        $searchedPosts = Post::where('title', 'Like', "%$query%")->published()->paginate(4);

        // Return to post search view
        return view('common.pages.post-search', compact('query', 'searchedPosts'));
    }

    /**
     * Show the author profile post lists
     *
     * @param \Illuminate\Http\Request
     * @param \App\Models\User $author
     * @return \Illuminate\Http\Response
     */
    public function authorProfile(Request $request, User $author)
    {

        // Retrieve the author's published posts
        $authorPosts = Post::where('user_id', $author->id)->published()->paginate(4);

        // Return to author-post-profile view
        return view('common.pages.author-profile', compact('author', 'authorPosts'));
    }

    /**
     * Show the post categories page
     *
     * @return \Illuminate\Http\Response
     */
    public function postCategories()
    {
        // Retrieve all non-empty categories
        $nonEmptyCategories = Category::has('posts')->latest()->paginate(9);

        // Return to post category view
        return view('common.pages.post-category', compact('nonEmptyCategories'));
    }

    /**
     * Show the post tags page
     *
     * @return \Illuminate\Http\Response
     */
    public function postTags()
    {
        // Retrieve all non-empty tags
        $nonEmptyTags = Tag::has('posts')->latest()->paginate(9);

        // Return to post tag view
        return view('common.pages.post-tag', compact('nonEmptyTags'));
    }

    /**
     * Show the post tag-items page
     *
     * @param $name
     * @return \Illuminate\Http\Response
     */
    public function postTagItems($name)
    {
        // Get the tag details
        $tag = Tag::where('name', $name)->firstOrFail();

        // Retrieve all the published posts of the tag
        $tagPosts = $tag->posts()->published()->latest()->paginate(4);

        // Return to post tag-item view
        return view('common.pages.post-tag-items', compact('tag', 'tagPosts'));
    }

    /**
     * Show the post category-items page
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function postCategoryItems($slug)
    {
        // Get the category details
        $category = Category::where('slug', $slug)->firstOrFail();

        // Retrieve all the published posts of the category
        $categoryPosts = $category->posts()->published()->latest()->paginate(4);

        // Return to post category-item view
        return view('common.pages.post-category-items', compact('category', 'categoryPosts'));
    }
    
}
