<?php

use App\Models\Category;
use App\Models\FilesPost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('fileposts', function () {
    return view('posts.index', ['posts' => FilesPost::allAndCache(), 'pre' => 'file']);
});
Route::get('fileposts/{post}', function ($post) {
    return view('posts.show', ['post' => FilesPost::findOrFail($post), 'pre' => 'file']);
});


Route::get('posts', function () {
    return view('posts.index', [
        'posts' => Cache::remember(
            'get' . request()->path() . '-all',
            now()->minutes(60),
            fn () => Post::latest()->get()
        )
    ]);
});
Route::get('posts/{post}', function (Post $post) {
    return view('posts.show', [
        'post' => Cache::remember(
            'get' . request()->path() . '-p',
            now()->minutes(60),
            fn () => $post
        )
    ]);
});


Route::get('category/{cat}', function (Category $cat) {
    return view('category.show', [
        'category' => Cache::remember(
            'get' . request()->path() . '-c',
            now()->minutes(60),
            fn () => $cat->load(['post'])
        ),
        'posts' => Cache::remember(
            'get' . request()->path() . '-p',
            now()->minutes(60),
            fn () => $cat->post
        )
    ]);
});


Route::get('authers/{auther:username}', function (User $auther) {
    return view('authers.show', [
        'auther' => Cache::remember(
            'get' . request()->path() . '-a',
            now()->minutes(60),
            fn () => $auther->load(['post'])
        ),
        'posts' => Cache::remember(
            'get' . request()->path() . '-p',
            now()->minutes(60),
            fn () => $auther->post
        )
    ]);
});
