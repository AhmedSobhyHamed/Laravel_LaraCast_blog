<x-layout title="user's profile">
    @include('parts.navbar')
    <x-side-main-layout>
        <x-slot name="links">
            @include('parts.userlinks')
        </x-slot>
        <section>
            <div class="container">
                <div class="row pt-4 mb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <x-named-content-box key='name' :val='$user->name'/>
                                <x-named-content-box key='username' :val='$user->username'/>
                                @if(request('user') === $user->username)
                                    <x-named-content-box key='email' :val='$user->email'/>
                                    <x-named-content-box key='password' val='*********************************'/>
                                @endif
                                <hr>
                                <h6>posts</h6>
                                <div>
                                    <div class="row pt-4">
                                        @forelse ($user->post as $post)
                                            <x-post-article 
                                                :titleName="$post->title"
                                                :titleURI="$post->slug"
                                                :postDate="$post->published_at"
                                                :body="$post->excert"
                                                :clicable='true'
                                            />
                                        @empty
                                            <p>no files found</p>
                                        @endforelse
                                    </div>
                                    {{-- if us nee pagenation --}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                            <div class="d-flex flex-column">
                                <img src="" alt=""> image in future updates
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-side-main-layout>
</x-layout>
