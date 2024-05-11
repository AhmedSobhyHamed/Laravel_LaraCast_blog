@props(['buttonType'=>'button'])
<div class="d-flex justify-content-end align-items-center mt-5">
    {{$before??''}}
    <button 
        type="{{$buttonType}}" 
        {{$attributes->merge(['class'=>'px-3 py-2 rounded btn btn-info'])}}
    >
        {{$slot}}
    </button>
    {{$after??''}}
</div>
