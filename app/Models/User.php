<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Encryption\DecryptException;
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
     * Get the favourite posts of the user
     */
    public function favouritePosts() {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
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
     * Check favorite post is exists or not.
     *
     * @param int $post
     * @return boolean
     */
    public function hasFavouritePost($post) {

        $status = false;

        if ($this->favouritePosts()->where('post_id', $post)->count() > 0) {

            // If post is added as favourite
            $status = true;
        }

        return $status;
    }

    /**
     * Get encrypted ID of the user
     *
     * @return string
     */
    public function getEncryptIdAttribute()
    {
        return encrypt($this->attributes['id']);
    }

    /**
     * Decrypt the Id and retrieve the model
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        try {
            return $this->where('id', decrypt($value))->firstOrFail();

        } catch (DecryptException $exception) {
            // If decryption is failed, abort the operation
            abort(401, $exception->getMessage());
        }
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
        return route('post.author.profile', $this->encryptId);
    }

    /**
     * Get sharable link for author's posts
     *
     * @return string
     */
    public function getShareUrlAttribute() {

        // Get author profile page link
        $url = route('post.author.profile', $this->encryptId);

        // Return sharable link of the author's post profile
        return new ShareableLink($url,
            env('APP_NAME') . ": Read the aticles by $this->name");
    }
}
