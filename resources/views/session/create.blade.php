@php
    $formClasses = 'bg-body-secondary border border-3 border-info
    rounded-5 p-5 my-5 text-dark w-50 mx-auto';
@endphp


<x-layout title='blog'>
    @include('parts.navbar')
    <main>
        <section>
            <div class="container">
                <div class="row pt-4">
                    <form 
                        action="{{route('session-store')}}"
                        method="POST"
                        class="{{$formClasses}}">
                        @csrf
                        <h1 class="text-center text-info mb-5">Log In</h1>
                        <x-form-field fieldName='email' fieldType='email' />
                        <x-form-field fieldName='password' fieldType='password' />
                        <x-g-button buttonType='submit'>register now</x-gbutton>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-secondary">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-layout>

