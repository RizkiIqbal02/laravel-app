<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


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
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Rizki Iqbal Muladi",
        "email" => "roxashiqbal12@gmail.com",
        "image" => "iqbal.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']); //class "PosController", method index


Route::get('posts/{post:slug}', [PostController::class, 'show']); //class "PosController", method show
