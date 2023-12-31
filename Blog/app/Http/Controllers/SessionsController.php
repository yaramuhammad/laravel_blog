<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/');
    }

    public function create()
    {
        return view('login');
    }

    public function store()
    {
        $attributes = request()->validate(
            [
                'email' => ['required', 'exists:authors', 'email'],
                'password' => ['required'],
            ]
        );

        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success', 'Welcome '.ucfirst(auth()->user()->name));
        } else {
            return back()->withErrors([
                'password' => 'The password you entered is not correct.',
            ])->withInput();
        }
    }
}
