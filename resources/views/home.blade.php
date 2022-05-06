<x-layouts.app>

    <link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">


    <div class="forum-home mt-5">
        <!-- communitites-->
        <div class="row">
            <div class="col-md-10 offset-1">
                <div class="row d-flex align-items-center" style="background-color: #f1f1f1">
                    <!--post cards-->
                    <div class="col-12">
                        <div style="padding: 2em 1em 1em;">
                            <h2>COMMUNITIES</h2>
                        </div>

                        <div class="row" style="padding: 1em;">
                            <h4>TRENDING COMMUNITIES</h4>
                            @foreach ($communities as $community)
                            <div class="col-4 p-1">
                                 <div class="card" style="min-height: 200px; background-image: url('https://picsum.photos/300/300?random={!!  rand(10,100); !!}')">
                                     <a href="/community/{{$community->slug}}" style="text-decoration: none;">
                                         <div class="card-body text-center">
                                            <h4 style="color: white; text-shadow: -2px 2px 0 #000, 2px 2px 0 #000, 2px -2px 0 #000, -2px -2px 0 #000;">
                                                {{$community->name}}
                                             </h4>
                                         </div>
                                     </a>
                                 </div>
                            </div>
                            @endforeach
                        </div>
                        <div style="padding: 1em;">
                            <a class="btn btn-primary" href="/forum/explore" style="color: white; margin-bottom: 1em;">Explore Communitites</a>
                        </div>

                        <!--posts-->
                        <div class="row" style="padding: 1em;">
                            @foreach($posts as $post)
                            <div class="col-12 col-md-6">
                                <div class="card" style="margin: 10px 0px 10px 0px;">
                                    <a href="/post/{{$post->id}}" style="color: black; text-decoration: none;">
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
                                                        <p class="card-text">
                                                            <small class="text-muted">
                                                                created {{Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>    
                            </div>
                            @endforeach                                
                        </div>
                        <div style="padding: 1em;">
                            <a class="btn btn-primary" href="/forum" style="color: white; margin-bottom: 1em;">View More</a>
                        </div>

                    </div>
                    </a>
                </div>
            </div>
        </div>


        <!--blogs -->
        <div class="row mt-5">
            <div class="col-md-10 offset-1">
                <div class="row d-flex align-items-center" style="background-color: #f1f1f1">
                    <!--post cards-->
                    <div class="col-12">
                        <div style="padding: 2em 1em 1em;">
                            <h2>BLOGS</h2>
                            <a class="btn btn-primary" href="/blog" style="color: white; margin-bottom: 1em;">View Blogs</a>
                        </div>
                        <!--posts-->
                        <div class="row" style="padding: 1em;">
                            @foreach($blogs as $blog)
                            <div class=" col-12 col-md-6">
                                <div class="card">
                                    <a href="/blog/show/{{$blog->id}}" style="text-decoration: none; color: black;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="https://picsum.photos/200/270?random={!!  rand(10,100); !!}" class="img-fluid">
                                                </div>
                                                <div class="col-6 post">
                                                    <h4>{{$blog->title}}</h4>
                                                    <h6>Author~ {{$blog->profile->user->name}}</h6>
                                                    <hr>
                                                    <p>{!! Str::limit( strip_tags( $blog->content), 200 ) !!} </p> 
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>    
                            </div>
                            @endforeach
    
                        </div>                        
                        <div style="padding: 1em;">
                            <a class="btn btn-primary" href="/blog" style="color: white; margin-bottom: 1em;">View More</a>
                        </div>

                    </div>
                    </a>
                </div>
            </div>
        </div>
        
        <!--events -->
        <div class="row mt-5">
            <div class="col-md-10 offset-1">
                <div class="row d-flex align-items-center" style="background-color: #f1f1f1">
                    <!--post cards-->
                    <div class="col-12">
                        <div style="padding: 2em 1em 1em;">
                            <h2>EVENTS</h2>
                            <a class="btn btn-primary" href="/event" style="color: white; margin-bottom: 1em;">View Events</a>
                        </div>

                        <!--events-->
                        <div class="row" style="padding: 1em;">
                        @if( $upcomingEventCount > 0 )
                            <h3>Upcoming Events</h3>
                            @foreach ($events as $event)
                                @if($event->start_date_time >=  Carbon\Carbon::today())
                                <div class="col-12 col-md-6">
                                        <div class="card shadow-sm text-center">
                                            <div class="card-body" style="margin: 0px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <h2 class="card-title col-8">{{$event->title}}</h2>
                                                            <h2 class="col-2">
                                                                <span class="badge bg-danger">
                                                                    {{$diff = Carbon\Carbon::parse($event->start_date_time)->diffForHumans() }}
                                                                </span>
                                                            </h2>        
                                                        </div>
                                                    </div>
                    
                                                    <img style="max-height: 20em;" src="https://picsum.photos/400/400?random={!!  rand(10,100); !!}" class="col-6 img-fluid rounded-start" alt="...">
                                                    <div class="col-6">
                                                        <div class="row" style="margin-top: 5em;">
                                                            <h3>Start: {{$event->start_date_time}}</h3>
                                                            <h3>Organizer: {{$event->organizer}}</h3>
                                                            <h3>Mode: 
                                                            @if (($event->mode) == 1)
                                                                Online
                                                            </h3>
                                                            <h3>Link: {{$event->link}}</h3>
                                                            @else
                                                                Offline
                                                            </h3>
                                                            <h3>Venue: {{$event->venue}}</h3>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    <a class="col-12 btn btn-primary mt-1" href="/event/show/{{$event->id}}" style="color: whitesmoke; text-decoration: none;">
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
                        @if( $pastEventCount > 0 )
                            <h3>Past Events</h3>
                            @foreach ($events as $event)
                                @if($event->start_date_time <  Carbon\Carbon::today())
                                <div class="col-12 col-md-6">
                                        <div class="card shadow-sm text-center">
                                            <div class="card-body" style="margin: 0px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <h2 class="card-title col-8">{{$event->title}}</h2>
                                                        </div>
                                                    </div>
                    
                                                    <img style="max-height: 20em;" src="https://picsum.photos/400/400?random={!!  rand(10,100); !!}" class="col-6 img-fluid rounded-start" alt="...">
                                                    <div class="col-6">
                                                        <div class="row" style="margin-top: 5em;">
                                                            <h3>Start: {{$event->start_date_time}}</h3>
                                                            <h3>Organizer: {{$event->organizer}}</h3>
                                                            <h3>Mode: 
                                                            @if (($event->mode) == 1)
                                                                Online
                                                            </h3>
                                                            <h3>Link: {{$event->link}}</h3>
                                                            @else
                                                                Offline
                                                            </h3>
                                                            <h3>Venue: {{$event->venue}}</h3>
                                                            @endif 
                                                        </div>
                                                    </div>
                                                    <a class="col-12 btn btn-primary mt-1" href="/event/show/{{$event->id}}" style="color: whitesmoke; text-decoration: none;">
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
                            <a class="btn btn-primary" href="/event" style="color: white; margin-bottom: 1em;">View More</a>
                        </div>

                    </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>