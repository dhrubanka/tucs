<x-layouts.admin>
 <h1 style="margin-top: 1em;">Project Submissions</h1>
 <hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Project Title</th>
      <th scope="col">Domain </th>
      <th scope="col">Submitted by</th>
      <th scope="col">link</th>
      <th scope="col">Description</th>
      <th scope="col">Received On</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($projects as $project)
    <tr>
      <th scope="row">{{$project->id}}</th>
      <td>{{$project->title}}</td>
      <td>{{$project->domain}}</td>
      <td>{{$project->profile->user->name}}</td>
      <td>{{$project->url}}</td>
      <td>{{$project->description}}</td>
      <td>{{$project->created_at}}</td>
      <td>{{$project->approval}}</td>
      <td><a href="/auth/projects/approve/{{$project->id}}" class="btn btn-primary" style="margin: 5px;">Approve</a>
      <a href="/auth/projects/reject/{{$project->id}}" class="btn btn-danger" style="margin: 5px;">Reject</a>
    </td>
    </tr>
     @endforeach
  </tbody>
</table>

</x-layouts.admin>