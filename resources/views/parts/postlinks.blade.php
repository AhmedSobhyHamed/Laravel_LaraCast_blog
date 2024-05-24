@php
    function linkClass($url=null,$val=null){ return 'd-block mb-2 w-100 text-light fs-6 '.(request()->url().$val!==$url?:'bg-success');}
@endphp

<x-anchor-link href="{{route('posts-create')}}" class="{{linkClass(route('posts-create'))}}">create a new post</x-anchor-link>
<x-anchor-link href="{{route('posts-index').'?PostOrder=latest'}}" class="{{linkClass(route('posts-index').'?PostOrder='.request('PostOrder'),'?PostOrder=latest')}}">All posts (latest first)</x-anchor-link>
<x-anchor-link href="{{route('posts-index').'?PostOrder=oldest'}}" class="{{linkClass(route('posts-index').'?PostOrder='.request('PostOrder'),'?PostOrder=oldest')}}">All posts (oldest first)</x-anchor-link>
