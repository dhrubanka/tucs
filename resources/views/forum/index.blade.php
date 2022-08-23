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

    <div class="wrapper">
        <!-- side nav community-->
        @if(Auth::check())
        <x-layouts.ForumSide :communities="$communities" />
        @else
        <x-layouts.ForumSide :communities="[] " />
        @endif
        <div class="row" id="content">
            <!--post cards-->
            <div class="col-md-8 ">
                <div class="row mb-4">
                    <div class="col-1">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i> 
                    </button></div>
                    <div class=" col-10" style="margin-left: 1em;" id="post-button">
                    <!--create post demo-->
                        <div class="card">
                            <div class="card-body" style="padding:5px">
                                    <a class="btn" href="/post/create"  style="border:solid; border-color: silver; border-width:1px; width:100%; border-radius: 20px;"> Create a post</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--posts-->
                @foreach($posts as $post)
                {{-- <div class="card post-card">
                    <a href="/post/{{$post->id}}">
                        <div class="card-header bg-white">
                            <div class="row">
                                <h3><b>{{$post->title}} </b> </h3>
                            </div>
                        </div>
                        <div class="row" style="padding: 5px;">
                            <div class="row g-0">
                                <div class="col-md-3" style="">
                                    {{-- <img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="img-fluid rounded-start" alt="..."> --}}
                                    {{-- <svg xmlns='http://www.w3.org/2000/svg' width='190' height='190' viewBox='0 0 800 800'><rect fill='#330033' width='800' height='800'/><g fill='none' stroke='#404' stroke-width='6.3'><path d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/><path d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/><path d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/><path d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/><path d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/></g><g fill='#505'><circle cx='769' cy='229' r='16'/><circle cx='539' cy='269' r='16'/><circle cx='603' cy='493' r='16'/><circle cx='731' cy='737' r='16'/><circle cx='520' cy='660' r='16'/><circle cx='309' cy='538' r='16'/><circle cx='295' cy='764' r='16'/><circle cx='40' cy='599' r='16'/><circle cx='102' cy='382' r='16'/><circle cx='127' cy='80' r='16'/><circle cx='370' cy='105' r='16'/><circle cx='578' cy='42' r='16'/><circle cx='237' cy='261' r='16'/><circle cx='390' cy='382' r='16'/></g></svg>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <h5 class="card-title">

                                            <div style="color:cornflowerblue ;border-style: solid; border-radius: 10px;
                                         padding: 5px 15px 5px 15px;  border-width: 2px; display: inline;">
                                                <small> </small>{{ $post->community->name}}
                                            </div>
                                        </h5>
                                        <p class="card-text">{!! Str::limit( strip_tags( $post->content), 200 ) !!}</p>
                                        <p class="card-text"><small class="text-muted">
                                            created {{Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </small></p>
                                    </div>
                                </div>
                            </div> --}}
                            <!--card Starts-->
                            <!-- <div class="card-footer bg-white">
                                <div class="row">
                                        <div class="col-2">
                                            @if (is_null($post->like))
                                                <form method="POST" action="/post/unlike">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-up bg-success fa-2x"></i></button>
                                                </form>
                                            @else
                                                @if ($post->like)
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
                                            @if (is_null($post->dislike))
                                                <form method="POST" action="/post/undislike">
                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn"><i class="far fa-thumbs-down bg-success fa-2x"></i></button>
                                                </form>
                                            @else
                                                @if ($post->dislike)
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
                            </div>  -->

                            <!--footer ends-->
                        {{-- </div>
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
                
                <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
                </div>
               
            </div>
            <!--right side pane-->
            <div class="d-none d-md-block col-md-4 right-bar">

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
                            <div class="offset-1 col-9"> <small> <i> </small>Web Development</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="offset-1 col-9"> <small> <i> </small>AI</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="offset-1 col-9"> <small> <i> </small>Computer Vision</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="offset-1 col-9"> <small> <i> </small>Machine Learning</i></div>
                    </li>
                    <li>
                        <div class="row">
                            <div class="col-2"><img src="https://picsum.photos/200/200?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="...">
                            </div>
                            <div class="offset-1 col-9"> <small> <i> </small>OS</i></div>
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