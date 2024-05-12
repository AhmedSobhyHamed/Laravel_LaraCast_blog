<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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

    public function create()
    {
        return view('posts.create', ['categories' => Category::all()]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'post' => ['required', 'min:10', 'max:6000'],
            'category' => ['required', Rule::exists('categories', 'slug')]
        ]);

        $request->file('image') ? $request->validate([
            'image' => 'image'
        ]) : null;
        $file = static::storeImage($request, 'image');

        $splitedArray = preg_split('/\n|\r\n/', $request->post, 2);
        [$title, $content] = isset($splitedArray[1]) ? $splitedArray : [substr($request->post, 0, 20), substr($request->post, 0)];
        Post::create([
            'title' => $title,
            'slug' => $title,
            'content' => $content,
            'excert' => substr($content, 0, 120),
            'user_id' => auth()->id(),
            'category_id' => Category::firstWhere('slug', $request->category)->id,
            'image' => $file
        ]);
        return redirect(route('posts-index'))->with('popup message', 'posted successfully :)');
    }

    public function edit(Request $request)
    {
        return view('posts.edit', [
            'post' => Post::firstWhere('slug', $request->post),
            'categories' => Category::all()
        ]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', ''],
            'excert' => ['required', 'string', ''],
            'content' => ['required', 'string', ''],
            'category' => ['required', Rule::exists('categories', 'slug')]
        ]);
        $request->file('image') ? $request->validate([
            'image' => 'image'
        ]) : null;
        $post = Post::firstWhere('slug', $request->post);
        if (!static::deleteImage($post->image)) return back()->with('popup message', 'something happen wrong when deleting the file');
        $file = static::storeImage($request, 'image');
        $post->update([
            'title' => $request->title,
            'slug' => $request->title,
            'content' => $request->content,
            'excert' => $request->excert,
            'user_id' => auth()->id(),
            'category_id' => Category::firstWhere('slug', $request->category)->id,
            'image' => $file
        ]);
        return redirect(route('posts-index'))->with('popup message', 'posted updated :)');
    }
    public function destroy(Request $request)
    {
        $post = Post::firstWhere('slug', $request->post);
        if (!static::deleteImage($post->image)) return back()->with('popup message', 'something happen wrong when deleting the file');
        $post->delete();
        return redirect(route('posts-index'))->with('popup message', 'post deleted successfuly.');
    }

    protected function SearchForPosts(
        ?string $KeySentince,
        ?string $CategorySentince,
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
    protected static function storeImage(Request $request, string $fileName)
    {
        return $request->file($fileName)?->store('posts-images');
    }

    protected static function deleteImage(?string $fileName)
    {
        if (!Storage::exists(str_replace('storage/', '', $fileName)))
            return false;
        return Storage::delete(str_replace('storage/', '', $fileName));
    }
}
