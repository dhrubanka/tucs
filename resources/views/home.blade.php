<x-layouts.app>
    {{-- https://www.tezu.ernet.in/dcompsc/images/csed.jpg" --}}

    <!-- Jumbotron -->
    <style>
        .mask {
            position: relative;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-attachment: fixed;
        }

        .parallax {
            /* The image used */
            background-image: url("img_parallax.jpg");

            /* Set a specific height */
            min-height: 500px;

            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <!-- Background image -->
    <div class="parallax text-center bg-image"
        style="
      background-image: url('https://www.tezu.ernet.in/dcompsc/images/csed.jpg');
      height: 500px;
    ">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h2 class="mb-3">Tezpur University Computer Society</h2>
                    <h4 class="mb-3">Welcome Visitors</h4>
                    <a class="btn btn-outline-light btn-lg" href="#!" role="button">Know More </a>
                </div>
            </div>
        </div>
    </div>

    {{-- about --}}
    <div style="background-color: #f1f1f1">
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-12 col-md-8 p-4">
                    <h1> About </h1>
                    <p>
                        The Tezpur University Computer Society (TUCS) is an organization at Tezpur University that aims to promote the study and understanding of computer science and related fields. 
                        Established in 1997, TUCS aims to become a hub for resources, events, and communication for students and professionals in the field. <a href="/about">Learn More</a>
                    </p>
                </div>
                <div class="col-sm-12 col-md-4 p-4">

                    <img src="/images/dept2.jpg" alt=""
                        style="max-width: 100%; display: block; object-fit: cover;">


                </div>
            </div>
        </div>
    </div>
    {{-- activities --}}
    <style>
        .card2 {
            border-radius: 4px;
            background: #fff;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            padding: 14px 80px 18px 36px;
            cursor: pointer;
            /* color: rgb(82, 119, 229); */
        }

        .card2:hover {
            color: rgb(105, 118, 154) !important;
            /* color: rgb(82, 119, 229) !important; */
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }
    </style>
    <!-- Background image -->
    <div class="container p-3 text-center">

        <h1 class="p-3">Activities</h1>
        <div class=" d-flex justify-content-center">
            <hr style="width: 70%"/>
        </div>



        <div class="row mt-4">
            <div class="col-md-3 col-sm-12">
                <div class="shadow-lg m-3 card2 text-center p-3" style=" color: rgb(37, 183, 202);">
                    <i class="fa-solid fa-people-group fa-6x"></i>
                    <h3 class="p-1 mt-4 fw-normal">{{ $user_count }}</h3>
                    <h3>People</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="shadow-lg m-3 card2 text-center p-3" style=" color: rgb(202, 37, 92);">
                    <i class="fa-solid fa-code fa-6x"></i>
                    <h3 class="p-1 mt-4">{{ $project_count }}</h3>
                    <h3>Projects</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="shadow-lg m-3 card2 text-center p-3" style=" color: royalblue;">
                    <i class="fa-solid fa-blog fa-6x"></i>
                    <h3 class="p-1 mt-4">{{ $blog_count }}</h3>
                    <h3>Blogs</h3>
                </div>
            </div>

            <div class="col-md-3 col-sm-12">
                <div class="shadow-lg m-3 card2 text-center p-3" style=" color: rgb(255, 217, 0);">
                    <i class="fa-solid fa-people-roof fa-6x"></i>
                    <h3 class="p-1 mt-4">{{ $community_count }}</h3>
                    <h3>Communities</h3>
                </div>
            </div>

        </div>
    </div>
    <!-- Jumbotron -->

    {{-- <link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}"> --}}
    <style>
        .card3 {
            margin: 20px;
            padding: 20px;
            width: 250px;
            min-height: 200px;
            display: grid;
            grid-template-rows: 20px 50px 1fr 50px;
            border-radius: 10px;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
            transition: all 0.2s;
        }

        .card3:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
            transform: scale(1.01);
        }

        .card__link,
        .card__exit,
        .card__icon {
            position: relative;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.9);
        }

        .card__link::after {
            position: absolute;
            top: 25px;
            left: 0;
            content: "";
            width: 0%;
            height: 3px;
            background-color: rgba(255, 255, 255, 0.6);
            transition: all 0.5s;
        }

        .card__link:hover::after {
            width: 100%;
        }

        .card__exit {
            grid-row: 1/2;
            justify-self: end;
        }

        .card__icon {
            grid-row: 2/3;
            font-size: 30px;
        }

        .card__title {
            grid-row: 3/4;
            font-weight: 400;
            color: #ffffff;
        }

        .card__apply {
            grid-row: 4/5;
            margin-top: 3em;
            align-self: center;
        }

        /* CARD BACKGROUNDS */

        .card-1 {
            background: radial-gradient(#9abbe7, rgb(82, 119, 229));
        }

        .card-2 {
            background: radial-gradient(#fbc1cc, #fa99b2);
        }

        .card-3 {
            background: radial-gradient(#76b2fe, #b69efe);
        }
    </style>

    {{-- post card --}}
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
    <div class="forum-home mt-5" style="background-color: #f1f1f1">
        <!-- communitites-->
        <div class="container p-3">
            <div class="col-md-12">
                <div class="row d-flex align-items-center">
                    <!--post cards-->
                    <div class="col-12 m-4">
                        <h2 class=" mt-3 ">Communities</h2>
                        <div class=" d-flex justify-content-start">
                            <hr style="width: 90%"/>
                        </div>

                        <div class="row">
                            <h4>TOP COMMUNITIES</h4>

                            @foreach ($communities as $community)
                                <div class="card3 card-1">
                                    <div class="card__icon"><i class="fas fa-hashtag"></i>
                                        {{-- <p class="card__exit"><i class="fas fa-times"></i>< --}}
                                        <h2 class="card__title"> {{ $community->name }}</h2>
                                    </div>

                                    <p class="card__apply">

                                        <a class="card__link" href="/community/{{ $community->slug }}">Visit <i
                                                class="fas fa-arrow-right"></i></a>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <div style="padding: 1em;">
                            <a class="btn " href="/forum/explore"
                                style="color: white; margin-bottom: 1em; background: rgb(82, 119, 229)">Explore
                                Communitites</a>
                        </div>

                        <!--posts-->
                        <div class="row">
                            <h4>Recent Posts</h4>
                            @foreach ($posts as $post)
                                <div class="col-12 col-md-6">
                                    <a href="/post/{{ $post->id }}" style="text-decoration: none">
                                        <div class="card m-3 ">
                                            <div class="row">
                                                <div class="col-6"><img
                                                        src="https://source.unsplash.com/collection/1097769?{!! rand(10, 100) !!}&w=600&h=400"
                                                        class="img-fluid rounded-start" alt="... "
                                                        style="height: 200px; width: 300px"></div>
                                                <div class="col-6">

                                                    <div class="card-body">
                                                        <div class="projcard-textbox">
                                                            <div class="projcard-title" style="color: black">
                                                                {{ $post->title }}</div>
                                                            <div class="projcard-subtitle"> Posted on
                                                                {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                                by {{ $post->profile->firstName }}</div>
                                                            <div class="projcard-bar"></div>
                                                            <div class="projcard-tagbox">
                                                                <span
                                                                    class="projcard-tag">{{ $post->community->name }}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach


                        </div>
                        <div style="padding: 1em;">
                            <a class="btn btn-primary" href="/forum"
                                style="color: white; margin-bottom: 1em; background: rgb(82, 119, 229)">View More</a>
                        </div>

                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap");



        /* img {
  max-width: 100%;
  display: block;
  object-fit: cover;
} */

        .card4 {
            display: flex;
            flex-direction: column;
            width: clamp(20rem, calc(20rem + 2vw), 22rem);
            overflow: hidden;
            box-shadow: 0 .1rem 1rem rgba(0, 0, 0, 0.1);
            border-radius: 1em;
            background: #ECE9E6;
            background: linear-gradient(to right, #FFFFFF, #ECE9E6);
            margin: 1em;

        }



        .card4__body {
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: .5rem;
        }


        .tag {
            align-self: flex-start;
            padding: .25em .75em;
            border-radius: 1em;
            font-size: .75rem;
        }

        .tag+.tag {
            margin-left: .5em;
        }

        .tag-blue {
            background: #56CCF2;
            background: linear-gradient(to bottom, #2F80ED, #56CCF2);
            color: #fafafa;
        }

        .tag-brown {
            background: #D1913C;
            background: linear-gradient(to bottom, #FFD194, #D1913C);
            color: #fafafa;
        }

        .tag-red {
            background: #cb2d3e;
            background: linear-gradient(to bottom, #ef473a, #cb2d3e);
            color: #fafafa;
        }

        .card4__body h4 {
            font-size: 1.5rem;
            text-transform: capitalize;
        }

        .card4__footer {
            display: flex;
            padding: 1rem;
            margin-top: auto;
        }

        .user {
            display: flex;
            gap: .5rem;
        }

        .user__image {
            border-radius: 50%;
        }

        .user__info>small {
            color: #666;
        }
    </style>
    <!--blogs -->
    <div class="container p-3">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="row d-flex align-items-center">
                    <!--post cards-->
                    <div class="col-12">
                        <div style="padding: 2em 1em 1em;">
                            <h2>BLOGS</h2>
                            <div class=" d-flex justify-content-start">
                                <hr style="width: 90%"/>
                            </div>
                            <!--posts-->
                            <div class="row">
                                @foreach ($blogs as $blog)
                                    <a class="card4" href="/blog/show/{{ $blog->id }}"
                                        style="text-decoration: none; color: black;">
                                        <div>
                                            <div class="card4__header">
                                                <img src="https://source.unsplash.com/collection/1097769?{!! rand(10, 100) !!}&w=600&h=400"
                                                    alt="card4__image" class="card4__image" width="600"
                                                    height="200"
                                                    style="  max-width: 100%;
                                  display: block;
                                  object-fit: cover;">
                                            </div>
                                            <div class="card4__body">
                                                <span class="tag tag-blue">Blog</span>
                                                <h4>{{ $blog->title }}</h4>
                                                <p>{!! Str::limit(strip_tags($blog->content), 200) !!} </p>
                                            </div>
                                            <div class="card4__footer">
                                                <div class="user">
                                                    <img src="https://avatars.dicebear.com/api/{!! $blog->profile->gender == 'M' ? 'male' : 'female' !!}/:seed.svg"
                                                        alt="user__image" class="user__image"
                                                        style="width: 50px;height:50px">
                                                    <div class="user__info">
                                                        <h5>{{ $blog->profile->firstName }}</h5>
                                                        <small>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                            <div style="padding: 1em;">
                                <a class="btn btn-primary" href="/blog"
                                    style="color: white; margin-bottom: 1em;  background: rgb(82, 119, 229)">View
                                    More</a>
                            </div>

                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--events -->
        <div style="background-color: #f1f1f1">
            <div class="container p-3">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="row d-flex align-items-center">
                            <!--post cards-->
                            <div class="col-12">
                                <div style="padding: 2em 1em 1em;">
                                    <h2>EVENTS</h2>
                                    <a class="btn btn-primary" href="/event"
                                        style="color: white; margin-bottom: 1em; background: royalblue">View Events</a>
                                </div>

                                <!--events-->
                                <div class="row" style="padding: 1em;">
                                    @if ($upcomingEventCount > 0)
                                        <h3>Upcoming Events</h3>
                                        @foreach ($events as $event)
                                            @if ($event->start_date_time >= Carbon\Carbon::today())
                                                <div class="col-12 col-md-6">
                                                    <div class="card shadow-sm text-center">
                                                        <div class="card-body" style="margin: 0px;">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row">
                                                                        <h2 class="card-title col-8">
                                                                            {{ $event->title }}</h2>
                                                                        <h2 class="col-2">
                                                                            <span class="badge bg-danger">
                                                                                {{ $diff = Carbon\Carbon::parse($event->start_date_time)->diffForHumans() }}
                                                                            </span>
                                                                        </h2>
                                                                    </div>
                                                                </div>

                                                                <img style="max-height: 20em;"
                                                                    src="https://picsum.photos/400/400?random={!! rand(10, 100) !!}"
                                                                    class="col-6 img-fluid rounded-start"
                                                                    alt="...">
                                                                <div class="col-6">
                                                                    <div class="row" style="margin-top: 5em;">
                                                                        <h3>Start: {{ $event->start_date_time }}</h3>
                                                                        <h3>Organizer: {{ $event->organizer }}</h3>
                                                                        <h3>Mode:
                                                                            @if ($event->mode == 1)
                                                                                Online
                                                                        </h3>
                                                                        <h3>Link: {{ $event->link }}</h3>
                                                                    @else
                                                                        Offline
                                                                        </h3>
                                                                        <h3>Venue: {{ $event->venue }}</h3>
                                            @endif
                                </div>
                            </div>
                            <a class="col-12 btn btn-primary mt-1" href="/event/show/{{ $event->id }}"
                                style="color: whitesmoke; text-decoration: none;">
                                View Event
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            <!--past events-->
            <div class="row" style="padding: 1em;">
                @if ($pastEventCount > 0)
                    <h3>Past Events</h3>
                    @foreach ($events as $event)
                        @if ($event->start_date_time < Carbon\Carbon::today())
                            <div class="col-12 col-md-6">
                                <div class="card shadow-sm text-center">
                                    <div class="card-body" style="margin: 0px;">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <h2 class="card-title col-8">{{ $event->title }}</h2>
                                                </div>
                                            </div>

                                            <img style="max-height: 20em;"
                                                src="https://picsum.photos/400/400?random={!! rand(10, 100) !!}"
                                                class="col-6 img-fluid rounded-start" alt="...">
                                            <div class="col-6">
                                                <div class="row" style="margin-top: 5em;">
                                                    <h3>Start: {{ $event->start_date_time }}</h3>
                                                    <h3>Organizer: {{ $event->organizer }}</h3>
                                                    <h3>Mode:
                                                        @if ($event->mode == 1)
                                                            Online
                                                    </h3>
                                                    <h3>Link: {{ $event->link }}</h3>
                                                @else
                                                    Offline
                                                    </h3>
                                                    <h3>Venue: {{ $event->venue }}</h3>
                        @endif
            </div>
        </div>
        <a class="col-12 btn btn-primary mt-1" href="/event/show/{{ $event->id }}"
            style="color: whitesmoke; background: royalblue; text-decoration: none;">
            View Event
        </a>

    </div>
    </div>
    </div>
    </div>
    @endif
    @endforeach
    @endif

    <div style="padding: 1em;">
        <a class="btn btn-primary" href="/event"
            style="color: white; margin-bottom: 1em; background: royalblue">View More</a>
    </div>

    </div>
    </a>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>

</x-layouts.app>
