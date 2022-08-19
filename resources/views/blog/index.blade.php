<x-layouts.app>
<style>
.post{
    color: black;
}
</style>
    <div class="container">
        <div class="row">
        <div class="col-12  col-md-3" style="padding: 2% 3%;">
            <a class="btn btn-primary" href="{{url('/blog/create')}}" role="button" style="width: 100%;"><span class="badge" style="padding: 14px 0px; font-size: medium;"><i class="fas fa-pencil-alt"></i> CREATE BLOG POST</span></a>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
            <div class=" col-12 col-md-6" style="padding: 2% 3%;">
                <a href="/blog/show/{{$blog->id}}" style="text-decoration: none;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <img src="https://picsum.photos/200/270?random={!!  rand(10,100); !!}" class="img-fluid">
                                </div>
                                <div class="col-6 post">
                                    <h4>{{$blog->title}}</h4>
                                    <h6>Author~  <a href="/profile/show/{{$blog->profile->id}}">{{$blog->profile->firstName}}</a></h6>
                                    <hr>
                                    <p>{!! Str::limit( strip_tags( $blog->content), 200 ) !!} </p> 
                                </div>
                            </div>
                        </div>
                    </div>    
                </a>
            </div>
            @endforeach
        </div>    
    </div>
        
</x-layouts.app>
