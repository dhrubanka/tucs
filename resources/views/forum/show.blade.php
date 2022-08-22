<x-layouts.app>
<link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">
<div class=" " >
                   <div
                    class="bg-image d-flex justify-content-left align-items-center"
                    style="
                        background-image: url('https://mdbootstrap.com/img/new/fluid/nature/015.jpg');
                        height: 25vh;
                    "
                    >
                    <h1 class="text-white" style="padding: 1em; padding-left: 4em;">
                    {{$communites->name}} </h1>
                    @if ($communites->profile_id)
                            <form method="POST" action="/community/unsubscribe">
                                @csrf
                                <input type="hidden" name="community_id" value="{{ $communites->id }}">
                                {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
                                    Unsubscribe</button>
                            </form>
                        @else
                            <form method="POST" action="/community/subscribe">
                                @csrf
                                <input type="hidden" name="community_id" value="{{ $communites->id }}">
                                {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                                <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>
                                    Subscribe</button>
                            </form>
                        @endif
                    </div>
                </div>

<div class="container" style="padding-top: 2em;">
    <div class="row">
        <!-post-->
        <div class="col-md-8">
            <!--create post demo-->
            <div class="card">
                    <div class="card-body" style="padding:5px">
                        <div class="row">
                            <div class="col-11">
                                <a class="btn" href="/post/create" style="border:solid; border-color: silver; border-width:1px; width:100%; border-radius: 20px;"> Create a post</a>
                            </div>
                            <div class="col-1">
                                <a><i class="fas fa-image fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--posts-->
                @foreach($posts as $post)
                <div class="card" style="margin: 10px 0px 10px 0px;" >
                <a href="/post/{{$post->id}}" style="text-decoration: none; color: black;">
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
                                         <small> </small>{{ $post->community->name}}</div>
                                    </h5>
                                    <p class="card-text">{!! Str::limit( strip_tags( $post->content), 200 ) !!}</p>
                                    <p class="card-text"><small class="text-muted">{{Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-2"><a href="" style="text-decoration: none;"><i class="far fa-thumbs-up"></i> 20</a></div>
                                <div class="col-2"><a href="" style="text-decoration: none;"><i class="far fa-thumbs-down"></i> 12</a></div>
                                <div class="col-2"><a href="" style="text-decoration: none;"><i class="far fa-comments"></i></i> 125</a></div>
                                <div class="col-2"><a href="" style="text-decoration: none;"><i class="fas fa-share"></i> Share</a></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <!--right pane-->
        <div class="col-md-4">
        <div class="text-white text-center" style=" margin: 1em; margin-top: 0; 
                height: 80px; background-color: cornflowerblue;
    color: blanchedalmond;">
                        <div style="padding-top: 10px;">
                            <h5>{{$communites->name}}</h5>
                            @if ($communites->profile_id)
                            <form method="POST" action="/community/unsubscribe">
                                @csrf
                                <input type="hidden" name="community_id" value="{{ $communites->id }}">
                                {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
                                    Unsubscribe</button>
                            </form>
                        @else
                            <form method="POST" action="/community/subscribe">
                                @csrf
                                <input type="hidden" name="community_id" value="{{ $communites->id }}">
                                {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                                <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>
                                    Subscribe</button>
                            </form>
                        @endif
                        </div>
                    </div>
                    <div class="side-list3" style="border-style: solid; border-color: cornflowerblue; margin: 1em; margin-top: -1em; padding:10px;">
                        <p>{{$communites->description}}</p>
                        <h6>Created: {{ $communites->created_at}}</h6>
                        <h6>Total Members: </h6>
                    </div>

                    <div class="" id="request-comm"> Request Community</div>
        </div>
    </div>
</div>                
  
</x-layouts.app>
