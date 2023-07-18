<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthorPostsController extends Controller
{
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

    public function create()
    {
        $cats = Category::all();
        return view('create', ["categories" => $cats]);
    }

    public function edit(Post $post)
    {
        $cats = Category::all();
        return view('edit', ["categories" => $cats, "post" => $post]);
    }

    public function update(Post $post)
    {

        $attributes = request()->validate(
            [
                'title' => ['required', Rule::unique('posts')->ignore($post->id, 'id')],
                'body' => ['required'],
                'thumbnail' => ['image'],
                'category_id' => ['required'],
                'excerpt' => ['required']
            ]
        );

        if (request('thumbnail')) {
            request()->file('thumbnail')->store('public/thumbnails');
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
            $attributes['img'] = 1;
        }
        $attributes['author_id'] = auth()->id();
        $post->update($attributes);

        return redirect('/')->with('success', 'Post Updated');
    }

    public function index()
    {
        $user = Author::find(Auth::id());
        $posts = $user->post()->get();

        return view('posts', ['posts' => $posts]);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/')->with('success', 'Post Deleted');
    }
}
