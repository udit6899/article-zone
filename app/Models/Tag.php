<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
     * The posts that belong to the tag.
     * @return BelongsToMany posts
     */
    public function posts() {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }
}
