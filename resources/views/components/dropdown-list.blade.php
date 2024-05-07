@props(['currentCategory'=>null])
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{$currentCategory??'Categories'}}
    </a>
    <ul class="dropdown-menu">
        <li><a 
            class="dropdown-item 
                {{!isset($currentCategory)?'bg-success text-dark':''}}"
            href="/posts?{{http_build_query(request()->except('PostCategory','page'))}}">
            All
        </a></li>
        @foreach ($categories as $category)
            <li><a 
                class="dropdown-item 
                    {{isset($currentCategory) && 
                    $category->name==$currentCategory?'bg-success text-dark':''}}"
                href="/posts?PostCategory={{$category->slug}}&{{http_build_query(request()->except('PostCategory','page'))}}">
                {{ucwords($category->name)}}
            </a></li>
        @endforeach
    </ul>
</li>