<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

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
}
