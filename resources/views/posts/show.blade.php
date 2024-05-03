@php
    $pre??='';
@endphp

<x-layout title='blog'>
    <main>
        <article>
                <h2>{{$post->title}}</h2>
                <p>by 
                    <a href="/authers/{{$post->auther->username}}">{{$post->auther->name}} </a>
                    in 
                    <a href="/category/{{$post->category->slug}}">{{$post->Category->name}}</a>
                </p>
                <h4>{{$post->publiched_at}}</h4>
                <p>{{$post->content}}</p>
                <a href="/{{$pre}}posts">go back</a>
        </article>
    </main>
</x-layout>