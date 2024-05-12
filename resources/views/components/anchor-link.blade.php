@props(['href', 'noHoverEffect'=>false])
@php
    $hoverE = $noHoverEffect?:'link-underline-opacity-50-hover';
@endphp
<a 
    {{$attributes(['class'=>"link-underline $hoverE link-offset-3 link-underline-opacity-0"])}} href="{{$href}}"
>
{{$slot}}
</a>
