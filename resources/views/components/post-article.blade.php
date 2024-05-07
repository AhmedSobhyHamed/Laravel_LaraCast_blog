@props([
    'titleName'=>'', 'titleURI'=>'#',
    'postDate',
    'autherName'=>'', 'autherURI'=>null,
    'categoryName'=>'','categoryURI'=>null,
    'postImage'=>'',
    'loopIteration'=>1,
    'body'=>''
    ])
    @php
        use Illuminate\Support\Carbon;
    @endphp
{{-- card section --}}
        <div class="col-sm-12 {{$loopIteration%4==1?'col-md-12':'col-md-6 col-lg-4'}} mb-4">
            <div class="{{$loopIteration%4==1?'flex-row':''}} card text-dark">
                <img class="card-img {{$loopIteration%4==1?'w-auto':''}}" src="{{$postImage}}" alt="">
                <div class="d-flex flex-column flex-fill">
                    <div class="card-body">
                        <a class="text-dark" href="{{$titleURI}}">
                            <h4 class="card-title mt-0 ">
                                {{$titleName}}
                            </h4>
                        </a>
                        <p>{{$body}}</p>
                        @if ($postDate)
                            <small>
                                <i class="far fa-clock"></i>{{Carbon::parse($postDate)->diffForHumans()}}
                            </small>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="media">
                            {{-- <img class="ms-3 rounded-circle" src="" alt="" style="max-width:50px"> --}}
                            <div class="media-body d-flex flex-column align-items-start">
                                @if ($autherURI)
                                    <a href="/posts?PostAuther={{$autherURI}}">
                                        <h6 class="my-0 text-dark">{{$autherName}}</h6>
                                    </a>
                                @endif
                                @if ($categoryURI)
                                    <a href="/posts?PostCategory={{$categoryURI}}">
                                        <small>{{$categoryName}}</small>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- === card section ===  --}}