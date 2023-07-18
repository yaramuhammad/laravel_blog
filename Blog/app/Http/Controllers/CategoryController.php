<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show(Category $category)
    {
        $posts = $category->post;
        $cats = Category::all();
        return view(
            'category',
            [
                "cat" => $category,
                "posts" => $posts,
                "categories" => $cats
            ]
        );
    }
}
