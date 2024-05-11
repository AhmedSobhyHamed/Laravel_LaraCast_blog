@props(['href'])
<a 
    {{$attributes(['class'=>"link-underline link-underline-opacity-50-hover link-offset-3 link-underline-opacity-0"])}} href="{{$href}}"
>
{{$slot}}
</a>
