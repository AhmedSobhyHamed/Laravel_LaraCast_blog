<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post)
    {
        Post::firstWhere('slug', str_replace('post/', '', str_replace('/comment', '', $request->path()))) ??
            throw ValidationException::withMessages(['post' => 'post not found']);
        $request->validate([
            'comment' => 'required|min:3'
        ]);
        $post->comment()->create([
            'content' => $request->comment,
            'user_id' => auth()->user()->id
        ]);
        return back();
    }
}
