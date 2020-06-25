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
    private static function upload($image, $paths, $sizes, $oldImageName = 'default.jpg') {

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
                }

                // Delete old image from file, if it's exists
                FileHelper::delete($path . '/' . $oldImageName);

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


    /**
     * Delete uploaded images from directory
     *
     * @param string $imagePath
     */

    public static function delete(string $imagePath) {

        if (!in_array('default.jpg', explode('/', $imagePath)) &&
            Storage::disk('public')->exists($imagePath)) {

            // Delete the image, if exists
            Storage::disk('public')->delete($imagePath);
        }
    }


    /**
     * Handle uploaded images to store
     *
     * @param array | UploadedFile | UploadedFile[] | null $uploadedResource
     * @param string $for
     * @param string $oldImageUrl
     * @return string
     */

    public static function manageUpload($uploadedResource, $for, $oldImageUrl = '') {

        switch ($for) {

            case 'user':

                // Store uploaded image for user : Storage/users
                $imageUrl = FileHelper::upload(
                    $uploadedResource, [0 => 'users'],
                    [0 => ['width' => 176, 'height' => 176]], $oldImageUrl
                );

                break;
            case 'post':

                // Store uploaded image for post : Storage/posts
                $imageUrl = FileHelper::upload(
                    $uploadedResource, [ 0 => 'posts', 1 => 'posts/slider'],
                    [0 => ['width' => 338, 'height' => 237], 1 => ['width' => 880, 'height' => 520]],
                    $oldImageUrl
                );

                break;
            case 'category':

                // Store uploaded image for category in header and slider
                //  : Storage/categories & Storage/categories/slider
                $imageUrl = FileHelper::upload(
                    $uploadedResource, [ 0 => 'categories', 1 => 'categories/slider'],
                    [0 => ['width' => 338, 'height' => 245], 1 => ['width' => 1732, 'height' => 680]],
                    $oldImageUrl
                );

                break;
            default:
                return 0;
        }

        // Return stored imageUrl
        return $imageUrl;
    }

}
