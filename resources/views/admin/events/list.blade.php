<x-layouts.admin>
    <div class="d-flex" style="padding: 1em;">
        <div><h3>Events </h3>  </div>
        <div class="ms-auto"> 
            <a type="button" href="/event/create" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
        </div>

    </div>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="row">
                                <th class="col-1">#</th>
                                <th class="col-3">Title</th>
                                <th class="col-3">Date</th>
                                <th class="col-3">Mode</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                            <tr class="row">
                                <td class="col-1">{{$event->id}}</td>
                                <td class="col-3">{{$event->title}}</td>
                                <td class="col-3">{{$event->start_date_time}}</td>
                                @if (($event->mode) == 1)
                                    <td class="col-2">Online</td>
                                @else
                                    <td class="col-2">Offline</td>
                                @endif
                                <td class="col-1"><a href="/event/list/{{$event->id}}" class="btn btn-primary">View</a></td>
                                <td class="col-1"><a href="/event/{{$event->id}}/edit" class="btn btn-warning">Edit</a></td>
                                <td class="col-1"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">Delete</button></td>
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

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </x-layouts.admin>
