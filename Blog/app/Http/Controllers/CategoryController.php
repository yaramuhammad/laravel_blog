<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->post;
        $cats = Category::all();

        return view(
            'category',
            [
                'cat' => $category,
                'posts' => $posts,
                'categories' => $cats,
            ]
        );
    }
}
