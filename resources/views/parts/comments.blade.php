@php
    $commentInputLine = 'flex-grow-1 text-light border-3 border-info
    p-3 bg-info bg-opacity-10 border-start-0 rounded-pill rounded-end';
@endphp
<div class="py-4 mb-4 rounded-4 bg-info bg-opacity-10 p4 border border-3 border-light">
    <form action="{{route('comment-create',$post->slug)}}" method="post" id="commentFormID">
        @csrf
        <div class="d-flex mb-3">
            <input 
                type="text" 
                placeholder="new comment" 
                name="comment"
                class="{{$commentInputLine}}"
            >
            <button class="btn btn-info rounded-start rounded-pill" type="submit">
                add
            </button>
        </div>
    </form>

    @foreach ($post->comment as $comment)
        <x-comment :name='$comment->user->name' :content='$comment->content' :time='$comment->created_at'/>
    @endforeach
</div>
