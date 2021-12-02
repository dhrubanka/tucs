<x-layouts.admin>
    <div class="d-flex" style="padding: 1em;">
        <div><h3> Skills </h3>  </div>
        <div class="ms-auto"> <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#newSkill">Add New</button> </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    <div class="modal fade" id="newSkill" tabindex="-1" aria-labelledby="newSkillLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newSkillLabel">Add Skill</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="/skillset/store">
            @csrf

            <div class="modal-body">
                <div class="form-group">
                  <input class="form-control" type="text" name="skillName" id="skillName" class="form-control" placeholder="Name" required autofocus>
                </div>
              </div>
            <div class="modal-footer form-group">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
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
                <th scope="col">Name</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($SkillSets as $SkillSet)
                <tr>
                    <th scope="row">{{$SkillSet->id}}</th>
                    <td>{{$SkillSet->name}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>

    </div>
</div>
    </div>

    </x-layouts.admin>
