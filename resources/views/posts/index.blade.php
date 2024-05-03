@php
    $pre??='';
@endphp

<x-layout title='blog'>
    <main>
        @forelse ($posts as $post)
            <article>
                <h3><a href="/{{$pre}}posts/{{$post->slug}}">{{$post->title}}</a></h3>
                <p>by 
                    <a href="/authers/{{$post->auther->username}}">{{$post->auther->name}} </a>
                    in 
                    <a href="/category/{{$post->category->slug}}">{{$post->Category->name}}</a>
                </p>
                <p>{{$post->excert}}</p>
            </article>
        @empty
            <p>no files found</p>
        @endforelse
    </main>
</x-layout>


