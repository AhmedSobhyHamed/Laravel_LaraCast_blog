<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\FilesPost;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('fileposts', function () {
    return view('posts.index', ['posts' => FilesPost::allAndCache(), 'pre' => 'file']);
});
Route::get('fileposts/{post}', function ($post) {
    return view('posts.show', ['post' => FilesPost::findOrFail($post), 'pre' => 'file']);
});

function caching($path, $ttl, $fn)
{
    Cache::forget(request()->method() . request()->path() . $path);
    return Cache::remember(
        request()->method() . request()->path() . $path,
        now()->minutes($ttl),
        $fn
    );
}

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{post}', [PostController::class, 'show']);


Route::get('category/{cat}', [CategoryController::class, 'show']);


Route::get('authers/{auther:username}', function (User $auther) {
    return view('authers.show', [
        'auther' => caching('-a', 60, fn () => $auther->load(['post'])),
        'posts' => caching('-p', 60, fn () => $auther->post)
    ]);
});
