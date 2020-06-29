<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Common\BaseCommentController;
use App\Models\Comment;

class CommentController extends BaseCommentController
{

    /**
     * Initialize the comment view prefix for author
     */
    public function __construct()
    {
        $this->prefix = 'author';

        // Apply policy action ability for author
        $this->authorizeResource(Comment::class, 'comment');
    }

}
