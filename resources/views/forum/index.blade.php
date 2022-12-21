<x-layouts.app>

    <link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">

    <style>
        .projcard-textbox {
            top: 7%;
            bottom: 7%;
            font-size: 17px;
        }

        .projcard-title {
            font-family: 'Voces', 'Open Sans', arial, sans-serif;
            font-size: 24px;
        }

        .projcard-subtitle {
            font-family: 'Voces', 'Open Sans', arial, sans-serif;
            color: #888;
        }


        .projcard-description {
            z-index: 10;
            font-size: 15px;
            color: #424242;
            height: 125px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .projcard-tagbox {
            position: relative;
            bottom: 3%;
            font-size: 14px;
            cursor: default;
            user-select: none;
            pointer-events: none;
        }

        .projcard-tag {

            background: #4417c0;
            color: #fff;
            border-radius: 3px 0 0 3px;
            line-height: 26px;
            padding: 0 10px 0 23px;
            position: relative;
            margin-right: 20px;
            cursor: default;
            user-select: none;
            transition: color 0.2s;
        }
    </style>
    <div class="wrapper">
        <!-- side nav community-->
        @if (Auth::check())
            <x-layouts.ForumSide :communities="$communities" />
        @else
            <x-layouts.ForumSide :communities="[]" />
        @endif
        <div class="row" id="content">
            <!--post cards-->
            <div class="col-md-12 ">
                <div class="row mb-4">
                    <div class="col-1 ">
                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-align-left"></i>
                        </button>
                    </div>
                    <div class=" col-10 " style="margin-left: 1em;" id="post-button">
                        <!--create post demo-->
                        <div class="card">
                            <div class="card-body" style="padding:5px">
                                <a class="btn" href="/post/create"
                                    style="border:solid; border-color: silver; border-width:1px; width:100%; border-radius: 20px;">
                                    Create a post</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--posts-->
                @foreach ($posts as $post)
                    
                    <a href="/post/{{ $post->id }}">

                        <div class="card m-3 ">
                            <div class="row">
                                <div class="col-6"><img
                                        src="https://source.unsplash.com/collection/1097769?{!! rand(10, 100) !!}&w=600&h=400"
                                        class="img-fluid rounded-start" alt="... "
                                        style="height: 200px; width: 300px"></div>
                                <div class="col-6">

                                    <div class="card-body">
                                        <div class="projcard-textbox">
                                            <div class="projcard-title">{{ $post->title }}</div>
                                            <div class="projcard-subtitle"> Posted on
                                                {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} by
                                                {{ $post->profile->firstName }}</div>
                                            <div class="projcard-bar"></div>
                                            <div class="projcard-tagbox">
                                                <span class="projcard-tag">{{ $post->community->name }}</span>
                                                {{-- <span class="projcard-tag">{{ $post->profile_id }}</span> --}}
                                                

                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        @Auth
                                            @if ($post->profile_id == Auth::user()->profile->id)
                                                <div class="col-12 col-md-4">
                                                    <a href="/post/{{ $post->id }}/edit"
                                                        class="btn bg-success btn-sm text-white">Edit</a>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <button type="button" class="btn btn-danger btn-sm text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#confirmDelete">Delete</button>
                                                </div>
                                                <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h5 class="text-center">Are you sure you want to delete
                                                                    {{ $post->title }} ?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="/post/{{ $post->id }}/delete"
                                                                    method="post">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">Yes,
                                                                        Delete </button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endAuth

                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach

                <div class="d-flex justify-content-center">
                    {!! $posts->links() !!}
                </div>

            </div>
            {{-- <!--right side pane-->
            <div class="d-none d-md-block col-md-4 right-bar">

                <div class="text-white text-center" id="top-growing">
                    <div style="padding-top: 40px;">
                        <div
                            style=" border-style: solid; border-radius: 10px; padding: 5px 15px 5px 15px;;
                     border-width: 2px; display: inline;">
                            Top Growing Communities <i class="fas fa-fire" style="color: orange;"></i></div>
                    </div>
                </div>
                <ol class="side-list3" id="top-growing-list">
                    <li>
                        <div class="p-3 m-3">

                            <i class="fas fa-hashtag" style="font-size: 14px"> Web Development </i>
                        </div>
                    </li>
                    <li>
                        <div class="p-3 m-3">

                            <i class="fas fa-hashtag" style="font-size: 14px"> Machine Learning </i>
                        </div>
                    </li>
                    <li>
                        <div class="p-3 m-3">

                            <i class="fas fa-hashtag" style="font-size: 14px"> Deep Learning </i>
                        </div>
                    </li>
                    <li>
                        <div class="p-3 m-3">

                            <i class="fas fa-hashtag" style="font-size: 14px"> React JS </i>
                        </div>
                    </li>
                    <li>
                        <div class="p-3 m-3">

                            <i class="fas fa-hashtag" style="font-size: 14px"> Laravel </i>
                        </div>
                    </li>

                </ol>
                <a href="/community-request" id="request-comm"> Request Community</a>
            </div>
        </div> --}}
    </div>
    <script>
        function postRedirect(post) {
            window.location = '{{ url("/post/' + post + '") }}';
        }
    </script>
</x-layouts.app>
