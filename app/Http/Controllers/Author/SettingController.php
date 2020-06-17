<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Common\BaseSettingController;

class SettingController extends BaseSettingController
{

    /**
     * Initialize the setting view prefix for author
     */
    public function __construct()
    {

        $this->prefix = 'author';
    }

}
