<x-layouts.app>

    <div class="row">
        <div class="col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
            <a class="btn btn-primary" href="{{url('/blog/create')}}" role="button" style="width: 100%;"><span class="badge" style="padding: 14px 0px; font-size: medium;"><i class="fas fa-pencil-alt"></i> CREATE BLOG POST</span></a>
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
                                    <img src="https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5f9cca07d4c42920d4d348c7%2Frainforest%2F960x0.jpg%3Ffit%3Dscale" class="img-fluid">
                                </div>
                                <div class="col-6">
                                    <h5>{{$blog->title}}</h5>
                                    <h5>{{$blog->profile->user->name}}</h5>
                                    <hr>
                                    <p>{{$blog->content}}</p>
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
