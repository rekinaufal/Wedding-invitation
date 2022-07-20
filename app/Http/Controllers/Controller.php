<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Mempelai;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static $pageTitle = 'Mempelai';
    
    public function index ()
    {
        $Mempelai = Mempelai::all();
        $pageTitle = self::$pageTitle;
        // dd($Mempelai);
        return view ('home', compact('pageTitle', 'Mempelai'));
    }
}
