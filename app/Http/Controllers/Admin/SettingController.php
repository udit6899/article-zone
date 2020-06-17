<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\BaseSettingController;

class SettingController extends BaseSettingController
{

    /**
     * Initialize the post setting prefix for admin
     */
    public function __construct()
    {

        $this->prefix = 'admin';
    }

}
