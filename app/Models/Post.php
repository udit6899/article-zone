<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

}
