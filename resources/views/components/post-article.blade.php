@props([
    'titleName'=>'', 'titleURI'=>null,
    'postDate',
    'autherName'=>'', 'autherURI'=>null,
    'categoryName'=>'','categoryURI'=>null,
    'postImage'=>null,
    'loopIteration'=>1,
    'body'=>'',
    'clicable'=>false
    ])
    @php
        use Illuminate\Support\Carbon;
    @endphp
{{-- card section --}}
        <div class="col-sm-12 {{$loopIteration%4==1?'col-md-12':'col-md-6 col-lg-4'}} mb-4">
            <div class="{{$loopIteration%4==1?'flex-row':''}} card text-dark">
                @if ($postImage)
                    <img class="card-img {{$loopIteration%4==1?'w-auto':''}}" src="{{asset($postImage)}}" alt="">
                @endif
                <div class="d-flex flex-column flex-fill">
                    <div class="card-body p-0">
                        @if ($clicable)
                            <x-anchor-link noHoverEffect={{true}} class="text-dark" href="{{route('posts-show',$titleURI)}}">
                                <h4 class="card-title mt-0 p-3 bg-body-secondary">
                                    {{$titleName}}
                                </h4>
                                <p class="p-3 h-100">{{$body}}</p>
                                @if ($postDate)
                                    <small class="px-3">
                                        <i class="far fa-clock"></i>{{Carbon::parse($postDate)->diffForHumans()}}
                                    </small>
                                @endif
                            </x-anchor-link>
                        @else
                            <h4 class="card-title mt-0 p-3 bg-body-secondary">
                                {{$titleName}}
                            </h4>
                            <p class="p-3 h-100">{{$body}}</p>
                            @if ($postDate)
                                <small class="px-3">
                                    <i class="far fa-clock"></i>{{Carbon::parse($postDate)->diffForHumans()}}
                                </small>
                            @endif
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="media">
                            {{-- <img class="ms-3 rounded-circle" src="" alt="" style="max-width:50px"> --}}
                            <div class="d-flex gap-2 justify-content-between">
                                <div class="d-flex gap-2 align-items-start">
                                    @if ($autherURI)
                                        <x-anchor-link class="badge bg-body-secondary mb-3" href="/posts?PostAuther={{$autherURI}}">
                                            <h6 class="my-0 text-dark fw-bold">{{$autherName}}</h6>
                                        </x-anchor-link>
                                    @endif
                                    @if ($categoryURI)
                                        <x-anchor-link class="badge fs-6 bg-success rounded-pill mb-3" href="/posts?PostCategory={{$categoryURI}}">
                                            <small class="my0- text-dark">{{$categoryName}}</small>
                                        </x-anchor-link>
                                    @endif
                                </div>
                                @can('ISAdmin',$autherURI)
                                    <form action="{{route('posts-delete')}}?post={{$titleURI}}" method="post" url="deletePostForm" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <div class="d-flex gap-2 align-items-start">
                                        <x-anchor-link href="{{route('posts-edit')}}?post={{$titleURI}}">Edit</x-anchor-link>
                                        <x-anchor-link href="deletePostAnchor">Delete</x-anchor-link>
                                    </div>
                                @endcan
                                @if (request()->user()->username === $autherURI)
                                    
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- === card section ===  --}}