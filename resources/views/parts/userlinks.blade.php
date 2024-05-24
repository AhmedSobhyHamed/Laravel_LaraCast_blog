@php
    function linkClass($url=null,$val=null){ return 'd-block mb-2 w-100 text-light fs-6 '.(request()->url().$val!==$url?:'bg-success');}
@endphp

<x-anchor-link href="{{route('posts-create')}}" class="{{linkClass(route('posts-create'))}}">create a new post</x-anchor-link>
<x-anchor-link href="{{route('posts-index')}}?PostAuther={{auth()->user()->username}}&PostOrder=latest" class="{{linkClass(route('posts-index').'?PostAuther='.auth()->user()->username,'?PostAuther='.request('PostAuther'))}}">my posts</x-anchor-link>
<x-anchor-link href="{{route('session-show')}}?user={{auth()->user()->username}}" class="{{linkClass(route('session-show').'?user='.auth()->user()->username,'?user='.request('user'))}}">user's profile</x-anchor-link>
