<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use ImLiam\ShareableLink;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile_no', 'password', 'about', 'avatar_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the posts of the user.
     * @return HasMany
     */
    public function posts() {

        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get the comments of the user.
     * @return HasMany
     */
    public function comments() {

        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Scope a query to only include admins.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmin($query, $value) {

        return $query->where('is_admin', $value);
    }

    /**
     * Get Image url of the user
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url("users/$this->avatar_path");
    }

    /**
     * Get posts Permalink of the author
     *
     * @return string
     */
    public function getPostsLinkAttribute()
    {
        return route('post.author.profile', $this->id);
    }

    /**
     * Get sharable link for author's posts
     *
     * @return string
     */
    public function getShareUrlAttribute() {

        // Get author profile page link
        $url = route('post.author.profile', $this->id);

        // Return sharable link of the author's post profile
        return new ShareableLink($url,
            env('APP_NAME') . ": Read the aticles by $this->name");
    }
}
