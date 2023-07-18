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
        $attributes = request()->validate(
            [
                'name' => ['required', 'unique:authors'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8', 'max:16']
            ]
        );

        $author = Author::create($attributes);
        auth()->login($author);


        session()->flash('success', 'You have registered successfully');
        return redirect('/');
    }
}
