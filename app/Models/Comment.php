<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'post_id', 'comment', 'is_approved'
    ];


    /**
     * Get the user that owns the comment.
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the post that owns the comment.
     * @return BelongsTo
     */
    public function post() {
        return $this->belongsTo('App\Models\Post');
    }
}
