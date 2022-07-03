<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public static $pageTitle = 'Dashboard';

    public function index() {
        $pageTitle = self::$pageTitle;
        return view ('dashboard.index', compact('pageTitle'));
    }
}
