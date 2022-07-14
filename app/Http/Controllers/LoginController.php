<?php

namespace App\Http\Controllers;
use         DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public static $pageTitle = 'Login';
    
    public function index() {
        $pageTitle = self::$pageTitle;
        return view ('login.index', compact('pageTitle'));
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required' 
        ]);
        $GetDataUser1           = DB::table('users')->where('email', $credentials['email'])->get();
        $GetDataUserStatus 	    = json_decode(json_encode($GetDataUser1[0]), true);
        if ($GetDataUserStatus['status'] == 'Admin') {
            if(Auth::attempt($credentials)){
                $request->session()->put('id',$GetDataUserStatus['id']);
                $request->session()->put('name',$GetDataUserStatus['name']);
                $request->session()->put('status',$GetDataUserStatus['status']);
                // $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }else {
            if(Auth::attempt($credentials)){
                $request->session()->put('id',$GetDataUserStatus['id']);
                $request->session()->put('name',$GetDataUserStatus['name']);
                $request->session()->put('status',$GetDataUserStatus['status']);
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            }
        }
        return back()->with('loginError', 'Login Failed');
    }

    public function logout(){
        // jika tidak ingin memakai Request $request, bisa memakai request()
        Auth::logout();
        Session::flush();
        // request()->session()->invalidate();
    
        // request()->session()->regenerateToken();
    
        return redirect('/');
    }
}
