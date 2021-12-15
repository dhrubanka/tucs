<x-layouts.app>

    <div class="row mt-5">
        <h3 style="padding-left:6em; padding-bottom: 3em;">Upcoming Events</h3>
        @foreach ($events as $event)
            @if($event->start_date_time >=  Carbon\Carbon::today())
            <div class=" col-8 offset-2 mb-5">
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
    </div>

    <div class="row mt-5">
        <h3 style="padding-left:6em; padding-bottom: 3em;">Past Events</h3>
        @foreach ($events as $event)
            @if($event->start_date_time <  Carbon\Carbon::today())
            <div class=" col-8 offset-2 mb-5">
                    <div class="card shadow-sm text-center">
                        <div class="card-body" style="margin: 0px;">
                            <div class="row">
                                <h2 class="card-title col-12">{{$event->title}}</h2>
                                <img src="https://picsum.photos/1000/1000?random={!!  rand(100,100); !!}" style="max-height: 10em;" class="col-6 img-fluid rounded-start" alt="...">
                                <div class="col-6">
                                    <div class="row">
                                        <h6>Start: {{$event->start_date_time}}</h6>
                                        <h6>Organizer: {{$event->organizer}}</h6>
                                        <h6>Mode: 
                                        @if (($event->mode) == 1)
                                            Online
                                        </h6>
                                        <h6>Link: {{$event->link}}</h6>
                                        @else
                                            Offline
                                        </h6>
                                        <h6>Venue: {{$event->venue}}</h6>
                                        @endif 
                                        <a class="btn btn-primary" href="/event/show/{{$event->id}}" style="text-decoration: none;">
                                            View Event
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>           
            </div>
            @endif       
        @endforeach
    </div>
</x-layouts.app>
