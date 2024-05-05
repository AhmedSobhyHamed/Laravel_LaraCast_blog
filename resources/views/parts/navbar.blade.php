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
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Last Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Top Contributers</a>
                </li>
<!--------------drop down category menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$currentCategory??'Categories'}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a 
                            class="dropdown-item 
                                {{request()->path()==='posts'?'bg-success text-dark':''}}"
                            href="/posts">
                            All
                        </a></li>
                        @foreach ($categories as $category)
                            <li><a 
                                class="dropdown-item 
                                    {{isset($currentCategory) && 
                                    $category->name==$currentCategory?'bg-success text-dark':''}}"
                                href="/category/{{$category->slug}}">
                                {{ucwords($category->name)}}
                            </a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
<!----------serrch for post -->
            <form class="d-flex" role="search" method="GET" action="">
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