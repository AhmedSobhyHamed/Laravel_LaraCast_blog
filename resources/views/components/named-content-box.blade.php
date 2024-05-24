@props(['key','val'])
<div {{$attributes(['class'=>"p-3 shadow"])}}>
    <h5 class="text-secondary">{{ucwords($key)}}:</h5>
    <p class="text-info-subtle">{{$val}}</p>
</div>