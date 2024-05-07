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
<!--------------drop down category menu -->
                <x-dropdown-list />
            </ul>
<!----------serrch for post -->
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
<!----------drop down user menu -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/images/avatarIcon.png" height="25" class="me-1" alt="">
                        User Name
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">My Posts</a></li>
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- === nav bar === -->