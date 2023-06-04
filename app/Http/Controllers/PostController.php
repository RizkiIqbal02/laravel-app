<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "All Posts",
            "active" => "posts",
            // "posts" => Post::all() //posts nya yang di ambil
            "posts" => Post::latest()->get()
        ]);
    }

    public function show(Post $post) //route model binding, variable yang diterima harus sama dengan yang ada di web.php, dan di ikat oleh model nya yaitu Post
    {
        return view('post',[
            "title" => "Single Post",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
