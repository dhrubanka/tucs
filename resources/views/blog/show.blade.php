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
                            </div>
                        </div>
                    </div>
                </div>    
        </div>
    </div>
    
    </x-layouts.app>
    