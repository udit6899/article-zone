<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'message',
    ];

    /**
     * Scope a query to get all the read/unrea messages.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function scopeRead($query, $value) {

        return $query->where('is_replied', $value)->latest()->get();
    }


}
