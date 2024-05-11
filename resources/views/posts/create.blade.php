<x-layout title='blog'>
    @include('parts.navbar')
    <main>
        <section>
            <div class="container">
                <div class="row pt-4 mb-3">
                    <h1 class="text-center my-5">create a post.</h1>
                    <form action="{{route('posts-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="category" class="form-label fs-4">select a category for your post</label>
                            <select name="category" id="category" class="form-select">
                                @foreach ($categories as $category)
                                <option 
                                    value="{{$category->slug}}" 
                                    {{old('category')===$category->slug?'selected':''}}
                                >
                                    {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <x-form-area areaName='post' isLabel='0' placeholder="type here any thing you want to share with your community" class="h-29 fs-4"/>
                        <x-form-field fieldName='image' fieldType="file" isRequired={{false}} class="fs-4"/>
                        <x-g-button buttonType='submit' class="fs-4">
                            <x-slot name='before'>
                                <x-anchor-link class="fs-4 me-3" href="{{route('posts-index')}}">
                                    Descard
                                </x-anchor-link>
                            </x-slot>
                            create
                        </x-g-button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-layout>