<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Common\BaseCommentController;

class CommentController extends BaseCommentController
{

    /**
     * Initialize the comment view prefix for author
     */
    public function __construct()
    {
        $this->prefix = 'author';
    }

}
