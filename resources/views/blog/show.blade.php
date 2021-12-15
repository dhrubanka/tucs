<x-layouts.app>

    <div class="row">
        <div class=" col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5>{{$blog->title}}</h5>
                                <small>By {{$blog->profile->user->name}}</small>
                                <hr>
                                <img src="https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fspecials-images.forbesimg.com%2Fimageserve%2F5f9cca07d4c42920d4d348c7%2Frainforest%2F960x0.jpg%3Ffit%3Dscale">
                                <p>{{$blog->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>    
        </div>
    </div>
    
    </x-layouts.app>
    