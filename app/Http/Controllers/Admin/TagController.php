<?php

namespace App\Http\Controllers\Admin;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:tags',
        ]);

        // Store new tag
        $tag = new Tag([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        $tag->save();

        // Create success message
        Toastr::success('Tag Successfully Saved !', 'success');

        // Return back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        // Validate the request
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:tags,name,'.$tag->id,
        ]);

        // Update tag details
        $tag->update([
           'name' => $request->name,
           'slug' => Str::slug($request->name)
        ]);

        // Make success response
        Toastr::success('Tag Successfully Updated !', 'success');

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
        // Delete tag from db
        $tag->delete();

        // Make success response
        Toastr::success('Tag Successfully Deleted !', 'success');

        // Return to index page
        return redirect()->back();
    }
}
