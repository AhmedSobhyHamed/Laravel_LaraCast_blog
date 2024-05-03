<x-layout title='blog'>
    <main>
        <article>
            <h2>{{$auther->name}}</h2>
            @forelse ($posts as $post)
                <article>
                    <h3><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h3>
                    <p>in
                        <a href="/category/{{$post->category->slug}}">{{$post->Category->name}}</a>
                    </p>
                    <p>{{$post->excert}}</p>
                </article>
            @empty
                <p>no files found</p>
            @endforelse
        </article>
    </main>
</x-layout>