<x-layouts.app>

<div class="row">
    <div class=" col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
        <div class="card shadow-sm text-center">
            <div class="card-header row">
                <img class="col-12" src="https://img.freepik.com/free-vector/elegant-event-poster-with-black-splash_1361-2193.jpg?size=338&ext=jpg">
                <h5 class="card-title">{{$event->title}}</h5>
            </div>
            <div class="card-body">
                <p>{{$event->description}}</p>
            </div>
            <div class="card-footer">
                <h6>Organizer: {{$event->organizer}}</h6>
                <h6>Start: {{$event->start_date_time}}</h6>
                <h6>End: {{$event->end_date_time}}</h6>
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
</div>
</div>

</x-layouts.app>
