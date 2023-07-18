<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorPostsController;
use Illuminate\Support\Facades\Route;

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



Route::get('/',[PostController::class,'index']);
Route::get('post/{post:title}',[PostController::class,'show']);

Route::get('categories/{category:name}',[CategoryController::class,'show']);

Route::get('/authors/{author:name}',[AuthorController::class,'show']);

Route::get('/register', [AuthorController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthorController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store']);

Route::get('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('/post/{post:title}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::get('/create', [AuthorPostsController::class,'create']) ->middleware('auth');
Route::post('/create', [AuthorPostsController::class,'store']) ->middleware('auth');

Route::get('/edit/posts/{post:title}', [AuthorPostsController::class,'edit']) ->middleware('auth');
Route::patch('/edit/posts/{post:title}', [AuthorPostsController::class,'update']) ->middleware('auth');

Route::get('/edit/posts/', [AuthorPostsController::class,'index'])->middleware('auth');

Route::get('/delete/posts/{post:title}', [AuthorPostsController::class,'delete']) ->middleware('auth');


