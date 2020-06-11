<?php
namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileHelper {

    /**
     * Store uploaded image for slider and header position.
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @param  string  $imageName
     * @param  string $tempDest
     */
    private static function storeFile(FormRequest $request, $imageName, $tempDest = '') {

        $storage = Storage::disk('public');

        // Check if destination dir is exists or not
        if(!$storage->exists($request->destination.$tempDest)) {
            // If dir not exists then create new one
            $storage->makeDirectory($request->destination.$tempDest);
        } else if (
            $request->isMethod('patch') &&
            $storage->exists($request->destination.$tempDest.'/'.$request->oldData->image)
        ){
            // Delete old image from file if request for update
            $storage->delete($request->destination.$tempDest.'/'.$request->oldData->image);
        }

        // Resize the uploaded image
        $tempImage = Image::make($request->file('image'))->resize(338, 245)->save();

        // Store resized in destination dir
        $storage->put($request->destination.$tempDest.'/'.$imageName, $tempImage);
    }

    /**
     * Store uploaded images by users
     *
     * @param \Illuminate\Foundation\Http\FormRequest $request
     * @return string
     */
    public static function upload(FormRequest $request) {

        // Retrieve image from request
        $image = $request->file('image');
        $request->slug = Str::slug($request->name ? $request->name : $request->title);

        // Check if the image is exist or not
        if (isset($image)) {

            // Create image file name
            $imageName = $request->slug.'-'.Carbon::now()->toDateString()
                .'-'.uniqid().'.' .$image->getClientOriginalExtension();

            // Store uploaded image for header position :destination/
            FileHelper::storeFile($request, $imageName);

            // Store uploaded image for slider position :destination/slider
            FileHelper::storeFile($request, $imageName, '/slider');

        } else {
            // If image is not exist and method is post then set it to default
            // If image is not exist and method is put/patch the set it to old image
            $imageName = $request->isMethod('post') ? 'default.jpg' : $request->oldData->image;
        }

        // After successful upload, return imageName
        return $imageName;
    }
}
