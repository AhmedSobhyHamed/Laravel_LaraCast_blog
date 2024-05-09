<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::middleware('auth')->group(function () {
    Route::get('posts', [PostController::class, 'index'])->name('posts-index');
    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts-show');


    Route::get('category/{cat}', [CategoryController::class, 'show'])->name('category-show');


    Route::get('authers/{auther:username}', function (User $auther) {
        return view('authers.show', [
            'auther' => caching('-a', 60, fn () => $auther->load(['post'])),
            'posts' => caching('-p', 60, fn () => $auther->post)
        ]);
    });
});

Route::middleware('guest')->group(function () {
    Route::get('register/create', [RegisterController::class, 'create'])
        ->name('register-create');
    Route::post('register/store', [RegisterController::class, 'store'])
        ->name('register-store');
});

Route::get('login',     [SessionController::class, 'create'])
    ->name('session-create')->middleware('guest');
Route::post('login',    [SessionController::class, 'store'])
    ->name('session-store')->middleware('guest');
Route::delete('logout', [SessionController::class, 'destroy'])
    ->name('session-destroy')->middleware('auth');


Route::post('post/{post}/comment', [CommentsController::class, 'store'])
    ->name('comment-create')->middleware('auth');
