@props(['areaName','isLabel'=>true,'isError'=>true,'value'=>null])
<div class="mb-3">
    @if ($isLabel)
        <label 
            for="{{$areaName}}"
            class="form-label"
        >
            {{$areaName}}
        </label>
    @endif
    <textarea 
        {{$attributes->merge(['class'=>'form-control'])}}
        id="{{$areaName}}" 
        name="{{$areaName}}" 
        required
        {{$attributes->merge(['placeholder'=>''])}}
    >{{$value??old($areaName)}}</textarea>
    @if ($isError)
        @error($areaName)
            <span class="text-danger">{{$message}}</span>
        @enderror
    @endif
</div>