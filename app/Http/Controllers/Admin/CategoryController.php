<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{

    /**
     * Display a listing of the category details.
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
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return to add category view
        return view('admin.category.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  CategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        try {

            // Store uploaded category image and append the imageUrl to reqeust
            $imageUrl = FileHelper::manageUpload($request->file('image'), 'category');

            // Store the category details
            Category::create(array_merge($request->input(), ['image' => $imageUrl]));

            // Create success message
            Toastr::success('Category Successfully Saved !', 'Success');

        } catch (\Throwable $throwable) {

            // Create error message
            Toastr::error($throwable->getMessage(), 'Error');
        }

        // Return back
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified category.
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
     * Update the specified category in storage.
     *
     * @param  CategoryUpdateRequest  $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        try {

            // Store uploaded category image and update the details
            $category->update(['image' => FileHelper::manageUpload(
                $request->file('image'), 'category', $category->image
            )]);

            // Create success message
            Toastr::success('Category Successfully Updated !', 'Success');

        } catch (\Throwable $throwable) {

            // Create error message
            Toastr::error($throwable->getMessage(), 'Error');
        }

        // Return back
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->posts->count() < 1) {

            try {

                // Delete the associated images of category for header and slider
                FileHelper::delete("categories/$category->image");
                FileHelper::delete("categories/slider/$category->image");

                // Delete the category, If it doesn't contain post
                $category->delete();

                // Make success response
                Toastr::success('Category Successfully Deleted !', 'Success');

            } catch (\Throwable $throwable) {

                // Create error message
                Toastr::error($throwable->getMessage(), 'Error');
            }

        } else {
            // Make error response, If it contains post
            Toastr::error("The category can\'t be delete ! It\'s associated with some posts.", 'Error');
        }

        // Return to index page
        return redirect()->back();

    }
}
