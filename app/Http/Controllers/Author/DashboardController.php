<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // show dashboard of author
    public function index() {
        return view('author.dashboard');
    }
}
