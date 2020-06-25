<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use ImLiam\ShareableLink;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'image', 'description'
    ];

    /**
     * The posts that belong to the category.
     * @return BelongsToMany posts
     */
    public function posts() {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }

    /**
     * Get Image url of the category
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url("categories/$this->image");
    }

    /**
     * Get posts Permalink of the category
     *
     * @return string
     */
    public function getPostsLinkAttribute()
    {
        return route('post.category.item', $this->slug);
    }

    /**
     * Get sharable link for category's posts list
     *
     * @return string
     */
    public function getShareUrlAttribute() {

        // Get posts-list page link of category
        $url = route('post.category.item', $this->slug);

        // Return sharable link of the category's posts list
        return new ShareableLink($url,
            env('APP_NAME') . " : Read articles on $this->name");
    }
}
