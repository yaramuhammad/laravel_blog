<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category']))->paginate(6)->withQueryString();
        $cats = Category::all();
        $authors = Author::all();

        return view('welcome', [
            'posts' => $posts,
            'categories' => $cats,
            'authors' => $authors,
        ]);
    }

    public function show(Post $post)
    {
        $comments = $post->comment;

        return view(
            'post',
            [
                'post' => $post,
                'comments' => $comments,
            ]
        );
    }
}
