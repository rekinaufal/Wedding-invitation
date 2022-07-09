<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MempelaiController;
use App\Http\Controllers\PriaController;
use App\Models\Category;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'pageTitle' => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'pageTitle' => "About"
    ]);
});

//Route::get('/post', [PostController::class, 'index']);

// middleware > defaultnya itu /home, untuk mengubahnya (app/http/providers/routeservice) ganti /home
// berikan name('login'), karna pada (app/http/middleware/authenticate) 'login', agar membaca route get/login itu namanya login   
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);   
Route::post('/logout', [LoginController::class, 'logout']);   

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');  
Route::post('/register', [RegisterController::class, 'store']); 

Route::get('/admin', function(){
    return view ('admin.index');
})->middleware('auth');  
Route::get('/dashboard', function(){
    return view ('dashboard.index');
})->middleware('auth');  
// jika ingin setting masuk ke register tidak harus login terlebih dahulu, pakai middleware'guest'
// jika ingin setting tidak bisa masuk ke dashboard harus login terlebih dahulu, pakai middleware'auth'

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::resource('user', 'App\Http\Controllers\UserController');

Route::get('/mempelai', [MempelaiController::class, 'index'])->name('mempelai.index');
Route::resource('mempelai', 'App\Http\Controllers\MempelaiController');

Route::get('/pria', [PriaController::class, 'index'])->name('pria.index');
Route::resource('pria', 'App\Http\Controllers\PriaController');

Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
// menamaan pada      ini  \|/ (category) harus sama dengan ini \|/  $category  
Route::get('/categories/{category:slug}', function(Category $category){
    return view ('/post/category', [
        'title' => $category->name,
        'posts' => $category->posts,
        'category' => $category->name,
        'pageTitle' => 'Category '.$category->name
    ]);
});

Route::get('/authors/{user}', function(User $user){
    return view ('/post/index', [
        'title' => 'User Post',
        'posts' => $user->posts,
        'pageTitle' => 'User Post'
    ]);
});

Route::group(['prefix' => 'api'], function () {
    Route::get('getDataPria', 'App\Http\Controllers\ApiController@getDataPria')->name('DataPria');
});
// Route::get('/', function () {
//     return view('welcome');
// });