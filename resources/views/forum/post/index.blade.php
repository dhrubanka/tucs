<x-layouts.app>

    <div class="row" >
        <!--post cards-->
        <div class="bg-image d-flex justify-content-left align-items-center" style="
                        background-image: url('https://mdbootstrap.com/img/new/fluid/nature/015.jpg');
                        height: 25vh;
                    ">
            <h1 class="text-white" style="padding-left: 4em; padding-right: 1em;"><a
                    style="color: whitesmoke; text-decoration: none"
                    href="/community/{{ $post->community->slug }}">{{ $post->community->name }}</a></h1>
            @auth

                @if ($communities->profile_id)
                    <form method="POST" action="/community/unsubscribe">
                        @csrf
                        <input type="hidden" name="community_id" value="{{ $communities->id }}">
                        {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
                            Unsubscribe</button>
                    </form>
                @else
                    <form method="POST" action="/community/subscribe">
                        @csrf
                        <input type="hidden" name="community_id" value="{{ $communities->id }}">
                        {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                        <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>
                            Subscribe</button>
                    </form>
                @endif
            @endauth
            @guest
                <form method="POST" action="/community/subscribe">
                    @csrf
                    <input type="hidden" name="community_id" value="{{ $communities->id }}">
                    {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                    <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>
                        Subscribe</button>
                </form>
            @endguest
        </div>

        <div class="col-md-10 offset-md-1">
            <div class="row" style="margin: 10px 0px 10px 0px;">
                <div class="col-md-9">
                    <!--posts-->
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="row">
                                <h3 class="text-center"><b>{{ $post->title }}</b> </h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px;">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">

                                        <p class="card-text">{!! $post->content !!}</p>
                                        <p class="card-text"><small class="text-muted">Last updated {{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}
                                                </small></p>
                                    </div>
                                </div>
                            </div>

                            @Auth
                            @if ($post->profile_id == Auth::user()->profile->id)
                            <div class="d-flex flex-row">
                                <div class=" p-1 ">
                                    <a href="/post/{{$post->id}}/edit" class="btn bg-success btn-sm text-white">Edit</a>
                                </div>
                                <div class=" p-1 ">
                                    <button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#confirmDelete">Delete</button>
                                </div>
                            </div>
                            <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body" >
                                      <h5 class="text-center">Are you sure you want to delete {{ $post->title }} ?</h5>
                                    </div>
                                    <div class="modal-footer">
                                      <form action="/post/{{$post->id}}/delete" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-white">Yes, Delete </button>
                                      </form>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
            
                            @endif
                            @endAuth

                            
                            <div class="card-footer bg-white">
                                <div class="row">
                                    <div class="col-2">
                                        @if ($postLike->profile_id)
                                            <form method="POST" action="/post/unlike">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="btn"><i
                                                        class="far fa-thumbs-up fa-2x" style="color: green"></i>
                                                    {{ $likes }}
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="/post/like">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="btn"><i
                                                        class="far fa-thumbs-up fa-2x"
                                                        style="color: rgb(0, 153, 255)"></i>
                                                    {{ $likes }}
                                                </button>
                                            </form>
                                        @endif
                                    </div>

                                    <div class="col-2">
                                        @if ($postDislike->profile_id)
                                            <form method="POST" action="/post/undislike">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="btn"><i
                                                        class="far fa-thumbs-down fa-2x" style="color: green"></i>
                                                    {{ $dislikes }}
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="/post/dislike">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button type="submit" class="btn"><i
                                                        class="far fa-thumbs-down fa-2x"
                                                        style="color: rgb(0, 153, 255)"></i>
                                                    {{ $dislikes }}
                                                </button>
                                            </form>
                                        @endif
                                    </div>

                                    {{-- <div class="col-2"><a href="" style="text-decoration: none"><i class="far fa-thumbs-down"></i> 12</a></div> --}}
                                    <div class="col-2"><a href="" style="text-decoration: none"><i class="far fa-comments fa-2x mt-1"></i> {{ $comments }}</a></div>
                                    <div class="col-2"><a href="" style="text-decoration: none"><i class="fas fa-share fa-2x mt-1"></i> Share</a></div>
                                </div>
                            </div>


                            <!-- post comments-->


                            @include('forum.post.comment.comment', [
                                'comments' => $post->comments,
                                'post_id' => $post->id,
                            ])


                        @auth

                            <div class="card col-12 col-md-12">
                                <div class="card-header row" style="padding-top: 25px;">
                                <h5 class="card-title col-12 col-md-8">COMMENT AS {{Auth::user()->name}}</h5>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('comments.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <textarea class="form-control" name="body" id="formBody" placeholder="CONTENT" rows="3"></textarea>
                                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn text-white mt-2" style="background: rgb(82, 119, 229)">COMMENT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
                <!--right side pane-->
                <div class="col-md-3">
                    <div class="text-white text-center" style=" margin: 1em; margin-top: 0;
                height: 80px; background-color: cornflowerblue;
    color: blanchedalmond;">
                        <div style="padding-top: 10px;">
                            <h5>{{ $post->community->name }}</h5>
                            @auth


                                @if ($communities->profile_id)
                                    <form method="POST" action="/community/unsubscribe">
                                        @csrf
                                        <input type="hidden" name="community_id" value="{{ $post->community->id }}">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
                                            Unsubscribe</button>
                                    </form>
                                @else
                                    <form method="POST" action="/community/subscribe">
                                        @csrf
                                        <input type="hidden" name="community_id" value="{{ $post->community->id }}">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>
                                            Subscribe</button>
                                    </form>
                                @endif
                            @endauth
                            @guest
                                <form method="POST" action="/community/subscribe">
                                    @csrf
                                    <input type="hidden" name="community_id" value="{{ $post->community->id }}">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>
                                        Subscribe</button>
                                </form>
                            @endguest
                        </div>
                    </div>
                    <div class="side-list3"
                        style="border-style: solid; border-color: cornflowerblue; margin: 1em; margin-top: -1em; padding:10px;">
                        <p>{{ $post->community->description }}</p>
                        <h6>Created: {{ $post->community->created_at }}</h6>
                        <h6>Total Members: {{ $members }}</h6>
                    </div>

                    <div class="" id="request-comm"> Request Community</div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
