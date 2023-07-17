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
            "authors" => $authors
        ]);
    }

    public function create()
    {
        $cats = Category::all();
        return view('postcreate', ["categories" => $cats]);
    }
    public function store()
    {
        request()->file('thumbnail')->store('public/thumbnails');

        $attributes = request()->validate(
            [
                'title' => ['required', 'unique:posts'],
                'body' => ['required'],
                'thumbnail' => ['required', 'image'],
                'category_id' => ['required'],
                'excerpt' => ['required'],
                'img' => ['required']
            ]
        );
        $attributes['author_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/');
    }
}
