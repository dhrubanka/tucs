<x-layouts.admin>
    <div class="d-flex" style="padding: 1em;">
        <div><h3> Parent Communites</h3>  </div>
        <div class="ms-auto"> <a class="btn btn-primary text-white" href="/parent-community/create">Add New</a> </div>
    </div>

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
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($ParentCommunites as $ParentCommunity)
                <tr>
                    <th scope="row">{{$ParentCommunity->id}}</th>
                    <td>{{$ParentCommunity->name}}</td>
                    <td>{{$ParentCommunity->description}}</td>
                    <td class="col-1"><a class="btn btn-warning" href="parent-community/{{$ParentCommunity->id}}/edit">Edit</a></td>
                    <td class="col-1"><a class="btn btn-danger deleteButton" onclick="deleteParentCommunity({{$ParentCommunity->id}})">Delete</a></td>
                    {{-- <td class="col-1"><button type="button" class="btn btn-danger deleteButton" data-bs-toggle="modal" data-id="{{$ParentCommunity->id}}" data-bs-target="#confirmDelete">Delete {{ $ParentCommunity->id }} </button></td> --}}
                    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-body" >
                              <h5 class="text-center">Are you sure you want to delete ?</h5>
                            </div>
                            <div class="modal-footer">
                              <form method="post" id="deleteForm" action="">
                                @csrf
                                <button type="button" class="btn btn-danger" onclick="confirmDeleteParentCommunity()">Yes, Delete </button>
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

    <script>
      var ID;

      function deleteParentCommunity($id) {
        console.log($id);
        ID = $id;
        $("#confirmDelete").modal("show");
      }

      function confirmDeleteParentCommunity() {
        $("#deleteForm").attr('action', "/parent-community/"+ID+"/delete");
        $("#deleteForm").submit();
        // document.getElementById("#deleteForm").action="/parent-community/"+ID+"/delete";
        // console.log(document.getElementById("#deleteForm").action);
        // document.getElementById("#deleteForm").submit();
      }

  </script>

    </x-layouts.admin>
