@php
    $pre??='';
@endphp

<x-layout title='blog'>
    @include('parts.navbar')
    <main>
        <section>
            <div class="container">
                <div class="row pt-4 mb-3">
                    <x-post-article 
                        :titleName="$post->title"
                        :postDate="$post->published_at"
                        :body="$post->content"
                        :autherName="$post->auther->name"
                        :autherURI="$post->auther->username"
                        :categoryName="$post->Category->name"
                        :categoryURI="$post->category->slug"
                    />
                    <a href="/{{$pre}}posts">go back</a>
                </div>
                <div class="row">
                    @include('parts.comments')
                </div>
            </div>
        </section>
    </main>
</x-layout>