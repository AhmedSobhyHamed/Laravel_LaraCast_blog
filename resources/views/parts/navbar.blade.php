<!-- nav bar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
<!------logo -->
        <a class="navbar-brand" href="#">
            <img class="" height="40" src="/images/logo.webp" alt="">
        </a>
<!------main menu button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarSupportedContent">
<!----------main menu list -->
            @auth
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Last Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/authers">Top Contributers</a>
                    </li>
<!------------------drop down category menu -->
                    @if (request()->routeIs('posts-show','posts-index','category-show'))
                        <x-dropdown-list />
                    @endif
                </ul>
<!--------------serrch for post -->
                @if (request()->routeIs('posts-show','posts-index','category-show'))
                    <form class="d-flex" role="search" method="GET" action="/posts">
                        @if (request()->PostCategory)
                            <input type="hidden" name="PostCategory" value="{{request()->PostCategory}}">
                        @endif
                        @if (request()->PostAuther)
                            <input type="hidden" name="PostAuther" value="{{request()->PostAuther}}">
                        @endif
                        <input class="form-control me-2" type="search" placeholder="Search"
                        name="PostSearch" value="{{request('PostSearch')}}" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                @endif
<!----------drop down user menu -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/images/avatarIcon.png" height="25" class="me-1" alt="">
                            {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">My Posts</a></li>
                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" id="logoutlink" href="{{route('session-destroy')}}">Log Out</a></li>
                        </ul>
                        <form id="logoutform" action="{{route('session-destroy')}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                </ul>
            @endauth
            @guest
            <div class="d-lg-flex align-items-center justify-content-end flex-grow-1">
                <a class="my-3 my-lg-0 me-lg-2 d-block rounded rounded-pill btn btn-outline-warning" href="{{route('session-create')}}">Log In</a>
                <a class="d-block rounded rounded-pill btn btn-outline-secondary" href="{{route('register-create')}}">Register Now</a>
            </div>
            @endguest
        </div>
    </div>
</nav>
<!-- === nav bar === -->