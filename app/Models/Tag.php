<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use ImLiam\ShareableLink;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * Get the posts that belong to the tag.
     * @return BelongsToMany posts
     */
    public function posts() {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }

    /**
     * Get posts Permalink of the tag
     *
     * @return string
     */
    public function getPostsLinkAttribute()
    {
        return route('post.tag.item', $this->slug);
    }

    /**
     * Get sharable link for tag's post list
     *
     * @return string
     */
    public function getShareUrlAttribute() {

        // Get posts-list page link of tag
        $url = route('post.tag.item', $this->slug);

        // Return sharable link of the tag's posts list
        return new ShareableLink($url,
            env('APP_NAME') . " : Read articles on $this->name");
    }
}
