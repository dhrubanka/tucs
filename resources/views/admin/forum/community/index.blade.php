<x-layouts.admin>
    <div class="d-flex" style="padding: 1em;">
        <div><h3> Communites</h3>  </div>
        <div class="ms-auto"> <a class="btn btn-info text-white" href="/community/create">Add New</a> </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    <div class="modal fade" id="newCommunity" tabindex="-1" aria-labelledby="newCommunityLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newCommunityLabel">Add Community</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/community/store">
            @csrf

            <div class="modal-body">
                <div class="form-group">
                    <select name="parentId" class="form-select" required autofocus>
                        <option selected>Select Parent Community</option>
                        @foreach ($parentCommunities as $parentCommunity)
                            <option value="{{$parentCommunity->id}}">{{$parentCommunity->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" name="communityTitle" id="communityTitle" class="form-control" placeholder="TITLE"  required autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="slug" class="form-control" placeholder="SLUG" required autofocus>
                  </div>
                <div class="form-group">
                    <textarea class="form-control" name="communityDesc" id="communityDesc" placeholder="DESCRIPTION" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input class="form-control" type="file" name="communityPhoto" id="communityPhoto" class="form-control">
                  </div>
              </div>
            <div class="modal-footer form-group">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">POST</button>
            </div>
        </form>
      </div>
    </div>
  </div>

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
                <th scope="col">Parent Community</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($communites as $community)
                <tr>
                    <th scope="row">{{$community->id}}</th>
                    <td>{{$community->name}}</td>
                    <td>{{$community->description}}</td>
                    <td>{{$community->parentCommunity->name}}</td>
                    <td class="col-1"><a class="btn btn-warning" href="community/{{$community->id}}/edit">Edit</a></td>
                    <td class="col-1"><a class="btn btn-danger deleteButton" onclick="deleteCommunity({{$community->id}})">Delete</a></td>
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
                                <button type="button" class="btn btn-danger" onclick="confirmDeleteCommunity()">Yes, Delete </button>
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

      function deleteCommunity($id) {
        console.log($id);
        ID = $id;
        $("#confirmDelete").modal("show");
      }

      function confirmDeleteCommunity() {
        $("#deleteForm").attr('action', "/community/"+ID+"/delete");
        $("#deleteForm").submit();
        // document.getElementById("#deleteForm").action="/parent-community/"+ID+"/delete";
        // console.log(document.getElementById("#deleteForm").action);
        // document.getElementById("#deleteForm").submit();
      }

  </script>

    </x-layouts.admin>
