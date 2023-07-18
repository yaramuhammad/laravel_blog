<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function show(Author $author)
    {
        $posts = $author->post;
        return view('author', ["author" => $author, "posts" => $posts]);
    }

    public function store()
    {
        request()->file('photo')->store('public/photos');
        $attributes = request()->validate(
            [
                'name' => ['required', 'unique:authors'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8', 'max:16'],
                'img' =>['required']
            ]
        );
        $attributes['photo'] = request()->file('photo')->store('photos');
        $author = Author::create($attributes);
        auth()->login($author);

        return redirect('/')->with('success', 'You have registered successfully');
    }
}
