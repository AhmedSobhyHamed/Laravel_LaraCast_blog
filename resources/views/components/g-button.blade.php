@props(['buttonType'=>'button'])
<div class="d-flex justify-content-end mt-5">
    <button type="{{$buttonType}}" class="px-3 py-2 rounded btn btn-info">
        {{$slot}}
    </button>
</div>