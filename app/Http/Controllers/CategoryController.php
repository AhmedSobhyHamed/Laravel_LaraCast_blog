<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $cat)
    {
        return view('category.show', [
            'category' => caching('-c', 60, fn () => $cat),
            'posts' => caching('-p', 60, fn () => $cat->post),
        ]);
    }
}
