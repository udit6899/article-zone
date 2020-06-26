<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Common\BaseFavouritePostController;

class FavouritePostController extends BaseFavouritePostController
{

    /**
     * Initialize the favourite post prefix for author
     */
    public function __construct()
    {

        $this->prefix = 'author';
    }

}
