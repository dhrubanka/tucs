<x-layouts.app>

    <div class="row">
        @foreach ($events as $event)
        <div class=" col-12 col-md-4" style="padding: 2% 3%;">
            <a href="/event/show/{{$event->id}}" style="text-decoration: none;">
                <div class="card shadow-sm text-center">
                    <div class="card-header row">
                        <img class="col-12" src="https://img.freepik.com/free-vector/elegant-event-poster-with-black-splash_1361-2193.jpg?size=338&ext=jpg">
                        <h5 class="card-title">{{$event->title}}</h5>
                    </div>
                    <div class="card-body">
                        <h6>Organizer: {{$event->organizer}}</h6>
                        <h6>Start: {{$event->start_date_time}}</h6>
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

                    </div>
                </div>           
             </a>
        </div>
        @endforeach
    </div>        
</x-layouts.app>
