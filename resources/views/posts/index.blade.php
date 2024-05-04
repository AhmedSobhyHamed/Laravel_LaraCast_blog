@php
    $pre??='';
@endphp

<x-layout title='blog'>
    <main>
        <section>
            <div class="container">
                <div class="row pt-4">
                    @forelse ($posts as $post)
                        <x-post-article 
                            titleName="{{$post->title}}"
                            titleURI="/{{$pre}}posts/{{$post->slug}}"
                            postDate="{{$post->published_at}}"
                            body="{{$post->excert}}"
                            autherName="{{$post->auther->name}}"
                            autherURI="/authers/{{$post->auther->username}}"
                            categoryName="{{$post->Category->name}}"
                            categoryURI="/category/{{$post->category->slug}}"
                            loopIteration="{{$loop->iteration}}"
                        />
                    @empty
                        <p>no files found</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</x-layout>


