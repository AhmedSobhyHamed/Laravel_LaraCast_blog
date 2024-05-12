<x-layout title='blog'>
    @include('parts.navbar')
    <main>
        <section>
            <div class="container">
                <div class="row pt-4 mb-3">
                    <h1 class="text-center my-5">Edit the post: {{$post->title}}</h1>
                    <div class="d-flex gap-2">
                        <form class="flex-grow-1" action="{{route('posts-update')}}?post={{$post->slug}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label for="category" class="form-label">category</label>
                                <select name="category" id="category" class="form-select">
                                    @foreach ($categories as $category)
                                    <option 
                                        value="{{$category->slug}}" 
                                        {{$post->category===$category->id?'selected':''}}
                                    >
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <x-form-field fieldName='title' value='{{$post->title}}' class="fs-4"/>
                            <x-form-field fieldName='excert' value='{{$post->excert}}' class="fs-4"/>
                            <x-form-area areaName='content' value='{{$post->content}}' class="h-29 fs-4"/>
                            <x-form-field fieldName='image' fieldType="file" isRequired={{false}} class="fs-4"/>
                            <x-g-button buttonType='submit' class="fs-4">
                                <x-slot name='before'>
                                    <x-anchor-link class="fs-4 me-3" href="{{route('posts-index')}}">
                                        Descard
                                    </x-anchor-link>
                                </x-slot>
                                update
                            </x-g-button>
                        </form>
                        <div>
                            <img class="rounded" src="{{asset($post->image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-layout>