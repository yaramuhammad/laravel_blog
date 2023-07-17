<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use \App\Models\Post;
use \App\Models\Author;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {

    return PostController::index();
});

Route::get('post/{post:title}', function (Post $post) {
    $comments = $post->comment;
    return view(
        'post',
        [
            "post" => $post,
            "comments" => $comments
        ]
    );
});


Route::get('/categories/{cat:name}', function (Category $cat) {

    $posts = $cat->post;
    $cats = Category::all();
    return view('category', ["cat" => $cat, "posts" => $posts,  "categories" => $cats]);
});


Route::get('/authors', function () {
    $authors = Author::all();
    return view('authors', ["authors" => $authors]);
});

Route::get('/authors/{author:name}', function (Author $author) {

    $posts = $author->post;
    return view('author', ["author" => $author, "posts" => $posts]);
});

Route::get('/register', [AuthorController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthorController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionsController::class, 'destroy']);

Route::post('/post/{post:title}/comments', [CommentController::class, 'store']);
