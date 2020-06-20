<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all latest categories
        $categories = Category::latest()->get();

        // Return to index view
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return to add category view
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // Store uploaded image for header and slider  : Storage/categories & Storage/categories/slider
        $imageUrl = FileHelper::upload(
            $request->file('image'), [0 => 'categories', 1 => 'categories/slider'],
            [0 => ['width' => 338, 'height' => 245], 1 => ['width' => 1732, 'height' => 680]]
        );

        // Prepare category option to store
        $category = new Category([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $imageUrl,
            'description' => $request->description
        ]);
        $category->save();

        // Create success message
        Toastr::success('Category Successfully Saved !', 'Success');

        // Return back
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // Return to edit view
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Foundation\Http\FormRequest  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $slug = Str::slug($request->name);

        // Store uploaded image for header and slider  : Storage/categories & Storage/categories/slider
        $imageUrl = FileHelper::upload(
            $request->file('image'), [ 0 => 'categories', 1 => 'categories/slider'],
            [0 => ['width' => 338, 'height' => 245], 1 => ['width' => 1732, 'height' => 680]], $category->image
        );

        // Prepare category option to store
        $category->update([
            'name' => $request->name,
            'slug' => $slug ? $slug : $category->slug,
            'image' => $imageUrl,
            'description' => $request->description ? $request->description : $category->description
        ]);

        // Create success message
        Toastr::success('Category Successfully Updated !', 'Success');

        // Return back
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->posts->count() < 1) {

            if (Storage::disk('public')->exists('categories/'.$category->image)) {
                // Delete associated category image for header if exists
                Storage::disk('public')->delete('categories/'.$category->image);
            }
            if (Storage::disk('public')->exists('categories/slider/'.$category->image)) {
                // Delete associated category image for slider if exists
                Storage::disk('public')->delete('categories/slider/'.$category->image);
            }

            // Delete category from db
            $category->delete();

            // Make success response
            Toastr::success('Category Successfully Deleted !', 'Success');

        } else {
            // Make error response
            Toastr::error("The category can\'t be delete ! It\'s associated with some posts.", 'Error');
        }

        // Return to index page
        return redirect()->back();

    }
}
