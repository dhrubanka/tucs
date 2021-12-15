<x-layouts.admin>
    <div class="d-flex" style="padding: 1em;">
        <div><h3>Events </h3>  </div>
        <div class="ms-auto"> 
            <a type="button" href="/event/create" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
        </div>

    </div>

    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="row">
                                <th class="col-1">#</th>
                                <th class="col-4">Title</th>
                                <th class="col-4">Date</th>
                                <th class="col-2">Mode</th>
                                <th class="col-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr class="row">
                                <td class="col-1">{{$event->id}}</td>
                                <td class="col-4">{{$event->title}}</td>
                                <td class="col-4">{{$event->start_date_time}}</td>
                                @if (($event->mode) == 1)
                                    <td class="col-2">Online</td>
                                @else
                                    <td class="col-2">Offline</td>
                                @endif
                                <td class="col-1"><a href="/event/list/{{$event->id}}" class="btn btn-primary">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </x-layouts.admin>
