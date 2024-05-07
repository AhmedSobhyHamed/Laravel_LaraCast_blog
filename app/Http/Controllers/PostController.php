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
            'posts' => $this->SearchForPosts(
                $request->PostSearch,
                $request->PostCategory,
                $request->PostAuther
            )
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => caching('-p', 60, fn () => $post),
        ]);
    }

    protected function SearchForPosts(
        ?String $KeySentince,
        ?String $CategorySentince,
        ?string $AuthSentince
    ) {
        return
            $KeySentince || $CategorySentince || $AuthSentince
            ?
            Post::latest()->filter([
                'KeySentince' => $KeySentince,
                'CategorySentince' => $CategorySentince,
                'AuthSentince' => $AuthSentince
            ])->paginate(8)->withQueryString()
            :
            caching('-all', 60, fn () => Post::latest()->paginate(8)->withQueryString());
    }
}
