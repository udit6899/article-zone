<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Common\BaseSubscriberController;


class SubscriberController extends BaseSubscriberController
{
    /**
     * Initialize the subscriber prefix for admin
     */
    public function __construct()
    {

        $this->prefix = 'admin';
    }

}
