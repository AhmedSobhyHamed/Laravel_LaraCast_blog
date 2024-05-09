<!-- footer -->
<footer
    class="text-center text-lg-start text-white"
    style="background-color: #3e4551"
    >
    <!-- Grid container -->
    @unless (request()->routeIs('register-create') || request()->routeIs('session-create'))
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            @include('parts._footer_links')
            <!-- Section: Links -->

            <hr class="mb-4" />

            <!-- Section: CTA -->
            @guest
                <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        <span class="me-3">Register for free</span>
                        <a href="{{route('register-create')}}" class="btn btn-outline-light btn-rounded">
                            Sign up!
                        </a>
                    </p>
                </section>

                <!-- Section: CTA -->

                <hr class="mb-4" />
            @endguest

            <!-- Section: Social media -->
            @include('parts._footer_social')
            <!-- Section: Social media -->
        </div>
    @endunless
    <!-- Grid container -->

    <!-- Copyright -->
    <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
        >
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">
            MDBootstrap.com
        </a>
    </div>
    <!-- Copyright -->
</footer>
<!-- === footer === -->