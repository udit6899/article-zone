<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Tag\TagStoreRequest;
use App\Http\Requests\Tag\TagUpdateRequest;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all latest tags
        $tags = Tag::latest()->get();

        // Return to index view
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return to add tag view
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TagStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        // Store new tag details
        Tag::create($request->input());

        // Create success message
        Toastr::success('Tag Successfully Saved !', 'Success');

        // Return back
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        // Return to edit view
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagUpdateRequest  $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        // Update tag details
        $tag->update();

        // Make success response
        Toastr::success('Tag Successfully Updated !', 'Success');

        // Redirect to index page
        return redirect()->route('admin.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->posts->count() < 1) {

            // Delete tag from db
            $tag->delete();

            // Make success response
            Toastr::success('Tag Successfully Deleted !', 'Success');

        } else {
            // Make error response
            Toastr::error("The tag can\'t be delete ! It\'s associated with some posts.", 'Error');
        }

        // Return to index page
        return redirect()->back();
    }
}
