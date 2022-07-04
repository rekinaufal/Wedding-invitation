<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public static $pageTitle = 'User';
    
    public function index ()
    {
        $Users = User::all();
        //dd($Users);
        $pageTitle = self::$pageTitle;
        return view ('user.index', compact('pageTitle', 'Users'));
    }

    public function show ($id)
    {
        $User = User::find($id);
        $pageTitle = self::$pageTitle;

        return view ('user.show', compact('pageTitle', 'user'));
    }
}
