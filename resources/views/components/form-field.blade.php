@props(['fieldName','fieldType'=>'text','isLabel'=>true,'isError'=>true,'isRequired'=>true])
<div class="mb-3">
    @if ($isLabel)
        <label 
            for="{{$fieldName}}"
            class="form-label"
        >
            {{$fieldName}}
        </label>
    @endif
    <input 
        {{$attributes->merge(['class'=>'form-control'])}}
        type="{{$fieldType}}" 
        id="{{$fieldName}}" 
        name="{{$fieldName}}" 
        value="{{old($fieldName)}}"
        {{$isRequired?'required':''}}
        {{$attributes->merge(['placeholder'=>''])}}
    >
    @if ($isError)
        @error($fieldName)
            <span class="text-danger">{{$message}}</span>
        @enderror
    @endif
</div>