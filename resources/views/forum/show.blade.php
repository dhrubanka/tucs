<x-layouts.app>
<link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">
{{-- post card --}}
<style>
 
    .projcard {
        position: relative;
        width: 100%;
        height: 230px;
        margin-bottom: 40px;
        border-radius: 10px;
        background-color: #fff;
        border: 2px solid #ddd;
        font-size: 18px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 4px 21px -12px rgba(0, 0, 0, .66);
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }
    .projcard:hover {
        box-shadow: 0 34px 32px -33px rgba(0, 0, 0, .18);
        transform: translate(0px, -3px);
    }
    .projcard::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(-70deg, #424242, transparent 50%);
        opacity: 0.07;
    }
    .projcard:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #424242, transparent 50%);
    }
    .projcard-innerbox {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
    .projcard-img {
        position: absolute;
        height: 300px;
        width: 400px;
        top: 0;
        left: 0;
        transition: transform 0.2s ease;
    }
    .projcard:nth-child(2n) .projcard-img {
        left: initial;
        right: 0;
    }
    .projcard:hover .projcard-img {
        transform: scale(1.05) rotate(1deg);
    }
    .projcard:hover .projcard-bar {
        width: 70px;
    }
    .projcard-textbox {
        position: absolute;
        top: 7%;
        bottom: 7%;
        left: 430px;
        width: calc(100% - 470px);
        font-size: 17px;
    }
    .projcard:nth-child(2n) .projcard-textbox {
        left: initial;
        right: 430px;
    }
    .projcard-textbox::before,
    .projcard-textbox::after {
        content: "";
        position: absolute;
        display: block;
        background: #ff0000bb;
        background: #fff;
        top: -20%;
        left: -55px;
        height: 140%;
        width: 60px;
        transform: rotate(8deg);
    }
    .projcard:nth-child(2n) .projcard-textbox::before {
        display: none;
    }
    .projcard-textbox::after {
        display: none;
        left: initial;
        right: -55px;
    }
    .projcard:nth-child(2n) .projcard-textbox::after {
        display: block;
    }
    .projcard-textbox * {
        position: relative;
    }
    .projcard-title {
        font-family: 'Voces', 'Open Sans', arial, sans-serif;
        font-size: 24px;
    }
    .projcard-subtitle {
        font-family: 'Voces', 'Open Sans', arial, sans-serif;
        color: #888;
    }
    .projcard-bar {
        left: -2px;
        width: 50px;
        height: 5px;
        margin: 10px 0;
        border-radius: 5px;
        background-color: #424242;
        transition: width 0.2s ease;
    }
    .projcard-blue .projcard-bar { background-color: #0088FF; }
    .projcard-blue::before { background-image: linear-gradient(-70deg, #0088FF, transparent 50%); }
    .projcard-blue:nth-child(2n)::before { background-image: linear-gradient(-250deg, #0088FF, transparent 50%); }
    
    .projcard-description {
        z-index: 10;
        font-size: 15px;
        color: #424242;
        height: 125px;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .projcard-tagbox {
        position: absolute;
        bottom: 3%;
        font-size: 14px;
        cursor: default;
        user-select: none;
        pointer-events: none;
    }
    .projcard-tag {
        display: inline-block;
        background: #E0E0E0;
        color: #777;
        border-radius: 3px 0 0 3px;
        line-height: 26px;
        padding: 0 10px 0 23px;
        position: relative;
        margin-right: 20px;
        cursor: default;
        user-select: none;
        transition: color 0.2s;
    }
    .projcard-tag::before {
        content: '';
        position: absolute;
        background: #fff;
        border-radius: 10px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
        height: 6px;
        left: 10px;
        width: 6px;
        top: 10px;
    }
    .projcard-tag::after {
        content: '';
        position: absolute;
        border-bottom: 13px solid transparent;
        border-left: 10px solid #E0E0E0;
        border-top: 13px solid transparent;
        right: -10px;
        top: 0;
    }
    </style>
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
         
        <div class="col-md-8">
            <!--create post demo-->
            <div class="card  mb-4">
                    <div class="card-body" style="padding:5px">
                        <div class="row ">
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
                {{-- <div class="card" style="margin: 10px 0px 10px 0px;" >
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
            </div> --}}

            <a href="/post/{{$post->id}}">
                <div class="projcard projcard-blue">
                    <div class="projcard-innerbox">
                        <img class="projcard-img" src="https://source.unsplash.com/collection/1097769?{!!  rand(10,100); !!}&w=600&h=400" />
                        <div class="projcard-textbox">
                            <div class="projcard-title">{{$post->title}}</div>
                            <div class="projcard-subtitle" > Posted on {{Carbon\Carbon::parse($post->created_at)->diffForHumans() }} by {{$post->profile->firstName}}</div>
                            <div class="projcard-bar"></div>
                            <div class="projcard-description">{!! Str::limit( strip_tags( $post->content), 20 ) !!}</div>
                            <div class="projcard-tagbox">
                                <span class="projcard-tag">{{ $post->community->name}}</span>
                                
                            </div>
                        </div>
                    </div>
                </div>  
     </a>
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
