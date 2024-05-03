<x-layout title='blog'>
    <main>
        <article>
            <h2>{{$category->name}}</h2>
            @forelse ($posts as $post)
                <article>
                    <h3><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h3>
                    <p>by 
                        <a href="/authers/{{$post->auther->username}}">{{$post->auther->name}} </a>
                    </p>
                    <p>{{$post->excert}}</p>
                </article>
            @empty
                <p>no files found</p>
            @endforelse
        </article>
    </main>
</x-layout>
