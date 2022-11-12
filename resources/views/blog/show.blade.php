<x-layouts.app>

    <div class="row">
        <div class=" col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>{{$blog->title}}</h4>
                                <small>By <a href="/profile/show/{{$blog->profile->user->id}}">{{$blog->profile->firstName}}</a> </small> on {{$blog->created_at}}
                                <hr>
                               
                                <p>{!!$blog->content!!}</p>

                                <hr>
                                @Auth
                                @if ($blog->profile_id == Auth::user()->profile->id)
                                <div class="row">
                                    <div class="col-12 offset-md-3 col-md-3">
                                        <a href="/blog/{{$blog->id}}/edit" class="btn bg-success btn-sm text-white">Edit</a>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDelete">Delete</button>
                                    </div>
                                </div>
                                <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-body" >
                                          <h5 class="text-center">Are you sure you want to delete {{ $blog->title }} ?</h5>
                                        </div>
                                        <div class="modal-footer">
                                          <form action="/blog/{{$blog->id}}/delete" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Yes, Delete </button>
                                          </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                
                                @endif
                                @endAuth
                            </div>
                        </div>
                    </div>
                </div>    
        </div>
    </div>
    
    </x-layouts.app>
    