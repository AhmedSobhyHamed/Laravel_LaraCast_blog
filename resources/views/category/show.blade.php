<x-layout title='blog'>
    <main>
        <section>
            <div class="container">
                <div class="row">
                    <h2>{{$category->name}}</h2>
                </div>
                <div class="row pt-4">
                    @forelse ($posts as $post)
                        <x-post-article 
                            titleName="{{$post->title}}"
                            titleURI="/posts/{{$post->slug}}"
                            postDate="{{$post->published_at}}"
                            body="{{$post->excert}}"
                            autherName="{{$post->auther->name}}"
                            autherURI="/authers/{{$post->auther->username}}"
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