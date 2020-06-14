<?php
namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileHelper {

    /**
     * Store uploaded images
     *
     * @param array | UploadedFile | UploadedFile[] | null $image
     * @param array $paths
     * @param array[] $sizes
     * @param string $oldImageName
     * @return string
     */
    public static function upload($image, $paths, $sizes, $oldImageName = 'default.jpg') {

        $storage = Storage::disk('public');

       // Check if the image is valid or not
        if (isset($image)) {

            // Create new image file name to store
            $newImageName = Str::slug($image->getClientOriginalName()) . '-' . uniqid()
                        . '-' . Carbon::now()->toDateString() . '.' .$image->getClientOriginalExtension();

            foreach ($paths as $key => $path) {

                // Check the destination dir is exist or not
                if (!$storage->exists($path)) {
                    // If dir is not exists, then create new one
                    $storage->makeDirectory($path);
                } elseif (
                    $oldImageName !== 'default.jpg' &&
                    $storage->exists($path . '/', $oldImageName)
                ) {
                    // Delete old image from file, if it's exists
                    $storage->delete($path . '/' . $oldImageName);
                }

                // Resize the uploaded image
                $resizedImage = Image::make($image)->resize($sizes[$key]['width'], $sizes[$key]['height'])->save();

                // Store resized image in destination dir
                $storage->put($path . '/' . $newImageName, $resizedImage);
            }

        } else {
            // If the image is invalid, store the old value
            $newImageName = $oldImageName;
        }

        // After successful upload, return new imageName
        return $newImageName;
    }
}
