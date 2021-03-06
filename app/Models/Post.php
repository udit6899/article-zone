<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use ImLiam\ShareableLink;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'slug', 'quote',
        'body', 'image', 'is_published', 'is_approved'
    ];

    /*
    * Change route binding key
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the user that owns the post.
     * @return BelongsTo user
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the categories that belong to the post.
     * @return BelongsToMany categories
     */
    public function categories() {
        return $this->belongsToMany('App\Models\Category')->withTimestamps();
    }

    /**
     * Get the tags that belong to the post.
     */
    public function tags() {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    /**
     * Get the users, those added to this post as favourite
     */
    public function favouriteToUsers() {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
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
     * Scope a query to get previous posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  \App\Models\Post
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePrevious($query, $post) {

        return $query->where('id', '<', $post->id)->latest();
    }

    /**
     * Scope a query to get next posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param  \App\Models\Post
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNext($query, $post) {
        return $query->Where('id', '>', $post->id);
    }

    /**
     * Scope a query to get all the popular posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Collection
     */
    public static function scopePopular($query) {

        return $query->withCount('comments')->withCount('favouriteToUsers')
            ->orderByDesc('view_count')->orderByDesc('favourite_to_users_count')
            ->orderByDesc('comments_count');
    }

    /**
     * Scope a query to get all the recent posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function scopeRecent($query) {

        return $query->published()->latest()->take(3)->get();
    }

    /**
     * Scope a query to get all the approved/pending posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $condition
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function scopeApproved($query, $condition = true) {

        return $query->where('is_approved', $condition);
    }

    /**
     * Get all the approved comments of a specific post.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getApprovedCommentsAttribute() {

        return Comment::where([ 'post_id' => $this->id, 'is_approved' => true ])->latest()->get();
    }

    /**
     * Get formatted date of a specific post.
     *
     * @return string
     */
    public function getCreatedDateAttribute() {

        return $this->created_at->toFormattedDateString();
    }

    /**
     * Get Image url of the post
     *
     * @return string
     */
    public function getImageUrlAttribute() {

        return Storage::disk('s3')->url("posts/$this->image");
    }

    /**
     * Get Permalink of the post
     *
     * @return string
     */
    public function getViewLinkAttribute() {

        return route('post.details', $this->slug);
    }

    /**
     * Get sharable link for post details
     *
     * @return string
     */
    public function getShareUrlAttribute() {

        // Get post-details page link
        $url = route('post.details', $this->slug);

        // Return sharable link of the post
        return new ShareableLink($url, $this->title);
    }
}
