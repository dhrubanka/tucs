<x-layouts.admin>
    <div class="row" style="margin:5em 0;">
        <div class="col-md-6 offset-md-3">

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
                        <hr>
                        <a href="/event/{{$event->id}}/edit" class="btn btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">Delete</button>
                        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-body" >
                                  <h5 class="text-center">Are you sure you want to delete {{ $event->title }} ?</h5>
                                </div>
                                <div class="modal-footer">
                                  <form action="/event/{{$event->id}}/delete" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Yes, Delete </button>
                                  </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </div>
                              </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    </x-layouts.admin>
