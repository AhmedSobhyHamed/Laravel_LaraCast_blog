@props([
    'titleName'=>'', 'titleURI'=>'#',
    'postDate',
    'autherName'=>'', 'autherURI'=>'#',
    'categoryName'=>'','categoryURI'=>'#',
    'postImage'=>'',
    'loopIteration'=>1,
    'body'=>''
    ])
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
                                <i class="far fa-clock"></i>{{$postDate}}
                            </small>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="media">
                            {{-- <img class="ms-3 rounded-circle" src="" alt="" style="max-width:50px"> --}}
                            <div class="media-body d-flex flex-column align-items-start">
                                <a href="{{$autherURI}}">
                                    <h6 class="my-0 text-dark">{{$autherName}}</h6>
                                </a>
                                <a href="{{$categoryURI}}">
                                    <small>{{$categoryName}}</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{-- === card section ===  --}}