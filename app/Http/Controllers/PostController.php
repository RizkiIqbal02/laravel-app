<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
// use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        // if (request('category')) {
        //     $category = Category::firstWhere('slug', request('category'));
        //     $title = ' in ' . $category->name;
        // }
        return view('posts', [
            "title" => "All Posts" . $title,
            "active" => "posts",
            // "posts" => Post::all() //posts nya yang di ambil
            // "posts" => Post::latest()->searching(request(['search', 'category', 'author']))->paginate(10)->withQueryString()
            "posts" => Post::latest()->searching(request(['search', 'author']))->paginate(10)->withQueryString()
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
