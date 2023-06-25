<?php

use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Rizki Iqbal Muladi",
        "email" => "roxashiqbal12@gmail.com",
        "image" => "iqbal.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']); //class "PosController", method index


Route::get('/posts/{post:slug}', [PostController::class, 'show']); //class "PosController", method show

Route::get('/categories', function(){
    return view('categories', [
        'title' => "Post Categories",
        "active" => "categories",
        'categories' => Category::all() //harus di balikin relasinya di model Post
    ]);
});

//kenapa harus dikasih name, biar ga mesti berpatokan sama url, kalau route nya diarahin ke name maka otomatis dia direct ke /login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


















// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//         'title' => "Post by Category : $category->name",
//         "active" => "categories",
//         'posts' => $category->posts->load(['category', 'author']) //harus di balikin relasinya di model Post
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts', [
//         'title' => "Created by : $author->name",
//         "active" => "author",
//         'posts' => $author->posts->load(['category', 'author']) //harus di balikin relasinya di model Post
//     ]);
// });
