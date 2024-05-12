@php
    $pre??='';
@endphp

<x-layout title='blog'>
    @include('parts.navbar')
    <main>
        <section>
            <div class="container">
                <div class="row pt-4">
                    <div class="col-12 mb-4">
                        <a href="{{route('posts-create')}}" class="btn p-4 btn-info w-100 text-dark fs-3 rounded-pill">create a new post</a>
                    </div>
                </div>
                <div class="row pt-4">
                    @forelse ($posts as $post)
                        <x-post-article 
                            :titleName="$post->title"
                            :titleURI="$post->slug"
                            :postDate="$post->published_at"
                            :body="$post->excert"
                            :autherName="$post->auther->name"
                            :autherURI="$post->auther->username"
                            :categoryName="$post->Category->name"
                            :categoryURI="$post->category->slug"
                            :postImage="$post->image"
                            :loopIteration="$loop->iteration"
                            :clicable='true'
                        />
                    @empty
                        <p>no files found</p>
                    @endforelse
                </div>
                {{$posts->links()}}
            </div>
        </section>
    </main>
</x-layout>


