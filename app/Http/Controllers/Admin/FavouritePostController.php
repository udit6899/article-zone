<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\BaseFavouritePostController;

class FavouritePostController extends BaseFavouritePostController
{

    /**
     * Initialize the favourite post prefix for admin
     */
    public function __construct()
    {

        $this->prefix = 'admin';
    }

}
