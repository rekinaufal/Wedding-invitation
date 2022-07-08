<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public static $pageTitle = 'Register';
    
    public function index() {
        $pageTitle = self::$pageTitle;
        return view ('register.index', compact('pageTitle'));
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:1|max:255',
            'status' => 'required|min:1|max:255'
        ]);
//        $validateData['password'] = bcrypt($validateData['password']);
       $validateData['password'] = Hash::make($validateData['password']); 
        User::create($validateData);
//        $request->session()->flash('success', 'Registration successfully, Please login');
       return redirect ('/login')->with('success', 'Registration successfully, Please login');
    }
}
