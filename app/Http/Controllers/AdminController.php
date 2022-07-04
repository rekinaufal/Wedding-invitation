<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public static $pageTitle = 'Admin';

    public function index() {
        $pageTitle = self::$pageTitle;
        return view ('admin.index', compact('pageTitle'));
    }
}
