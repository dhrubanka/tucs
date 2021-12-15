<x-layouts.app>

    <link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">


    <div class="forum-home">
        <div class="row">
            <!-- side nav community-->
            <x-layouts.ForumSide :communities="$communities" />
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
                            <div class="card-footer bg-white">
                                <div class="row">

                                    <div class="col-2"><a href=""><i class="far fa-thumbs-up"></i> 20</a></div>
                                    <div class="col-2"><a href=""><i class="far fa-thumbs-down"></i> 12</a></div>
                                    <div class="col-2"><a href=""><i class="far fa-comments"></i> 125</a></div>
                                    <div class="col-2"><a href=""><i class="fas fa-share"></i> Share</a></div>
                                </div>
                            </div>
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