@props(['fieldName','fieldType'=>'text'])
<div class="mb-3">
    <label 
        for="{{$fieldName}}"
        class="form-label"
    >
        {{$fieldName}}
    </label>
    <input 
        class="form-control"
        type="{{$fieldType}}" 
        id="{{$fieldName}}" 
        name="{{$fieldName}}" 
        value="{{old($fieldName)}}"
        required
    >
    @error($fieldName)
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>