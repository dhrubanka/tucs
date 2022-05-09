<link rel="stylesheet" href="{{ asset('css/forum/comment.css') }}">
@foreach($comments as $comment)
    <div class="card" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <div class="card-title1 row" >
        <div class="col-md-6  col-sm-4"><strong><img src="https://avatars.dicebear.com/api/{!! ($comment->user->user->gender == 'M')? 'male' : 'female'; !!}/:seed.svg" 
            style="height:20px; width: 20px; border-radius: 50%;"><b> {{ $comment->user->user->name }} </b> <small><i>says : </small> </i> 
        </strong></div> 
        <div class="col-md-4 col-sm-4 d-flex justify-content-end"> <small> Replied {{Carbon\Carbon::parse($comment->created_at)->diffForHumans() }} </small></div>
        <div class="col-md-2  col-sm-12 d-flex justify-content-end"> 
        <?php $role=$comment->user->user->getRoleNames();
                                $role= $role[0]; ?>
                              <x-badge :role="$role" />
    </div>
        </div>    
    <div class="card-body"> <p>{{ $comment->body }}</p> </div>
        
        <a href="" id="reply"></a>
        @auth
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
           
            <div class="form-group" style="padding: 1em;">
                <input type="submit" class="btn btn-success" value="Reply" />
            </div>
            <hr />
            
        </form>
        @endauth
        @include('forum.post.comment.comment', ['comments' => $comment->replies])
    </div>
@endforeach