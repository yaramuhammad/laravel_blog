<?php

namespace App\Http\Controllers;

use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate(
            [
                'body' => 'required',
            ]
        );

        $post->comment()->create([
            'author_id' => request()->user()->id,
            'body' => request('body'),
        ]);

        return back();
    }
}
