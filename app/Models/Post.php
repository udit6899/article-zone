<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'slug', 'quote', 'body', 'image', 'is_published', 'is_approved'
    ];

    /**
     * Get the user that owns the post.
     * @return BelongsTo user
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * The categories that belong to the post.
     * @return BelongsToMany categories
     */
    public function categories() {
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    /**
     * The tags that belong to the post.
     */
    public function tags() {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    /**
     * Get the comments of the post.
     * @return HasMany
     */
    public function comments() {

        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Scope a query to get published posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query) {

        return $query->where(['is_approved' => true, 'is_published' => true]);
    }

    /**
     * Get all the popular posts.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function popular() {

        return Post::published()->orderByDesc('view_count')->take(3)->get();
    }

    /**
     * Get all the recent posts.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function recent() {

        return Post::published()->latest()->take(3)->get();
    }

    /**
     * Get all the approved comments of a specific post.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getApprovedCommentsAttribute()
    {
        return Comment::where([ 'post_id' => $this->id, 'is_approved' => true ])->latest()->get();
    }
}
