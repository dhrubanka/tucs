<x-layouts.app>

    <link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">


    <div class="forum-home">
        <div class="row">
            <!-- side nav community-->
            @if(Auth::check())
            <x-layouts.ForumSide :communities="$communities" />
            @else
            <x-layouts.ForumSide  />
            @endif
            <!--post cards-->
            <div class="col-md-6">
                <!--create post demo-->
                <div class="card">
                    <div class="card-body" style="padding:5px">
                        <div class="row">
                            <div class="col-11">
                                <a class="btn" href="/post/create"  style="border:solid; border-color: silver; border-width:1px; width:100%; border-radius: 20px;"> Create a post</a>
                            </div>
                            <div class="col-1">
                                <a><i class="fas fa-image fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--posts-->
                @foreach($posts as $post)
                <div class="card" style="margin: 10px 0px 10px 0px;">
                    <a href="/post/{{$post->id}}">
                        <div class="card-header bg-white">
                            <div class="row">
                                <h3><b>{{$post->title}}</b> </h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">

                                            <div style="color:cornflowerblue ;border-style: solid; border-radius: 10px;
                                         padding: 5px 15px 5px 15px;  border-width: 2px; display: inline;">
                                                <small> </small>{{ $post->community->name}}
                                            </div>
                                        </h5>
                                        <p class="card-text">{!! Str::limit( strip_tags( $post->content), 200 ) !!}</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-footer bg-white">
                                <div class="row">
                                        <div class="col-2">
                                            @if (is_null($post->like->profile_id))
                                                <form method="POST" action="/post/unlike">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-up bg-success fa-2x"></i></button>
                                                </form>
                                            @else
                                                @if ($post->like->profile_id)
                                                <form method="POST" action="/post/unlike">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-up bg-success fa-2x"></i></button>
                                                </form>
                                                @else
                                                <form method="POST" action="/post/like">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-up bg-primary fa-2x"></i></button>
                                                </form>
                                                @endif
                                            @endif
                                        </div>
    
                                        <div class="col-2">
                                            @if (is_null($post->dislike->profile_id))
                                                <form method="POST" action="/post/undislike">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-down bg-success fa-2x"></i></button>
                                                </form>
                                            @else
                                                @if ($post->dislike->profile_id)
                                                <form method="POST" action="/post/undislike">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-down bg-success fa-2x"></i></button>
                                                </form>
                                                @else
                                                <form method="POST" action="/post/dislike">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-down bg-primary fa-2x"></i></button>
                                                </form>
                                                @endif    
                                            @endif

                                        </div>
    
                                </div>
                            </div> --}}
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
                </div>
               
            </div>
            <!--right side pane-->
            <div class="col-md-3">

                <div class="text-white text-center" id="top-growing">
                    <div style="padding-top: 40px;">
                        <div style=" border-style: solid; border-radius: 10px; padding: 5px 15px 5px 15px;;
                     border-width: 2px; display: inline;">Top Growing Communities <i class="fas fa-fire" style="color: orange;"></i></div>
                    </div>
                </div>
                <ol class="side-list3" id="top-growing-list">
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="col-1"> <small> <i> </small>Web Development</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="col-1"> <small> <i> </small>AI</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="col-1"> <small> <i> </small>Computer Vision</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="col-1"> <small> <i> </small>Machine Learning</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="col-1"> <small> <i> </small>OS</i></div>
                    </li>

                </ol>
                <div class="" id="request-comm"> Request Community</div>
            </div>
        </div>
    </div>
    <script>
        function postRedirect(post) {
            window.location = '{{ url("/post/' + post + '")}}';
        }
    </script>
</x-layouts.app>