<x-layout title='blog'>
    {{-- @include('parts.navbar') --}}
    <main>
        <section>
            <div class="container">
                <div class="row pt-4">
                    <form action="{{route('mailchimp-create')}}" method="post">
                        @csrf
                        <x-form-field fieldName='email' placeholder='enter your email'/>
                        <x-g-button buttonType='submit'>save</x-g-button>
                    </form>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row pt-4">
                    go to home
                </div>
            </div>
        </section>
    </main>
</x-layout>


