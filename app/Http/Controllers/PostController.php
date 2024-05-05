<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('posts.index', [
            'posts' => $this->getPosts($request->PostSearch),
            'categories' => caching('-C', 60, fn () => Category::all())
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => caching('-p', 60, fn () => $post),
            'categories' => caching('-C', 60, fn () => Category::all())
        ]);
    }

    protected function getPosts(?String $KeySentince)
    {
        return
            $KeySentince
            ?
            Post::latest()->filter(['KeySentince' => $KeySentince])->get()
            :
            caching('-all', 60, fn () => Post::latest()->get());
    }
}
