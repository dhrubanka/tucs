<x-layouts.app>

<div class="row">
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
                            <h5>{{$event->description}}</h5>
                            <h3>Start by: {{$event->start_date_time}}</h3>
                            <h3>End by: {{$event->start_date_time}}</h3>
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
                </div>
            </div>
        </div>           
    </div>

</div>

</x-layouts.app>
