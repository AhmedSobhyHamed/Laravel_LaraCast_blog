@php
    use Illuminate\Support\Carbon;
@endphp
@props(['name','content','time'])
<div class="d-flex border-0 border-bottom border-light p-4 mb-2 bg-info bg-opacity-10 text-white gap-4">
    <div class="flex-shrink-1">
        <img src="https://i.pravatar.cc/100?id={{$name}}" alt="" class="rounded-pill">
    </div>
    <div class="flex-grow-1">
        <h3>{{$name}}</h3>
        <time>{{Carbon::parse($time)->diffForHumans()}}</time>
        <p>{{$content}}</p>
    </div>
</div>