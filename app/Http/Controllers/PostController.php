<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public static $pageTitle = 'Post';
    
    public function index ()
    {
        $posts = Post::all();
        //dd($posts);
        $pageTitle = self::$pageTitle;
        return view ('post.index', compact('pageTitle', 'posts'));
    }

    public function show ($id)
    {
        $post = Post::find($id);
        $pageTitle = self::$pageTitle;

        return view ('post.show', compact('pageTitle', 'post'));
    }
}
