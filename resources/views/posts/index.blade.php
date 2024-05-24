<x-layout title='blog'>
    @include('parts.navbar')
    <x-side-main-layout>
        <x-slot name="links">
            @include('parts.postlinks')
        </x-slot>
        <section>
            <div class="container">
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
    </x-side-main-layout>
</x-layout>
