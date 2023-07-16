<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public static function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString();
        $cats = Category::all();
        $authors = Author::all();


        return view('welcome', [
            "posts" => $posts,
            "categories" => $cats,
            "authors"=>$authors
        ]);
    }
}
