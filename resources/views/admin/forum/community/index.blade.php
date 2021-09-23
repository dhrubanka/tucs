<x-layouts.admin>
    <div class="d-flex" style="padding: 1em;">
        <div><h3> Communites</h3>  </div>
        <div class="ms-auto"> <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#newCommunity">Add New</button> </div>
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
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($communites as $community)
                <tr>
                    <th scope="row">{{$community->id}}</th>
                    <td>{{$community->name}}</td>
                    <td>{{$community->description}}</td>
                    <td>{{$community->parentCommunity->name}}</td>
                    <td>@mdo</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>
    </div>

    </x-layouts.admin>
