<x-layout title='blog'>
    @include('parts.navbar')
    <main>
        <section>
            <div class="row">
                <h2>{{$auther->name}}</h2>
            </div>
            <div class="container">
                <div class="row pt-4">
                    @forelse ($posts as $post)
                        <x-post-article 
                            :titleName="$post->title"
                            titleURI="/posts/{{$post->slug}}"
                            :postDate="$post->published_at"
                            :body="$post->excert"
                            :categoryName="$post->Category->name"
                            :categoryURI="$post->category->slug"
                            :loopIteration="$loop->iteration"
                        />
                    @empty
                        <p>no files found</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
</x-layout>
