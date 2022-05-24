<x-layouts.app>
    <style>
        .nav-project {
            /* background-color: rgb(153, 153, 255); */
            background: royalblue;
            margin-top: -1.5em;
            color: whitesmoke;
            padding: 1em;
        }
    </style>
    <div class="row nav-project">
        <div class="col-md-12 ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-md-2  text-center">
                        <a href="/project" style="text-decoration: none; color: white"><h4>Projects </h4> </a> 
                    </div>
                    <div class="col-sm-12 col-md-3 ">

                    </div>
                    <div class="col-sm-8 col-md-3 ">
                        <div id="search"> 
                            <form id="search-form" action="/search/projects" method="get">
                            <input type="search" id="searchBar" name="search" class="fas form-control text-center" placeholder="&#xf002; Search" style="border-radius: 50px;" onclick="event.preventDefault();
                                    document.getElementById('search-form').addEventListener(" keyup", function(event)).submit();">
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-1 ">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="/project/filter/category/AI">Artificial Intelligence</a></li>
                                <li><a class="dropdown-item" href="/project/filter/category/WEB">Web Development</a></li>
                                <li><a class="dropdown-item" href="/project/filter/category/COMPUTER_NETWORKS">Computer Networks</a></li>
                                <li><a class="dropdown-item" href="/project/filter/category/MOBILE">Mobile Development</a></li>
                                <li><a class="dropdown-item" href="/project/filter/category/OTHERS">Others</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                    <a href="/project/myprojects" class="btn btn-light">My Projects</a>
                        <a href="/project/create" class="btn btn-light">Submit Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 1em;">
        <div class="row">
            <div class="col-12">

                @foreach( $projects as $project)
                <!-- new ui -->
                <div class="card" style="background-color: rgb(171, 189, 241); margin: 1em">
                    <div class=" card-body">
                        <div class="d-flex justify-content-between card-text">
                            <h4 >
                                {{$project->title}}
                             </h4>
                            <!-- <h4 style="background-color: teal; color: aliceblue; padding: 4px; border-radius: 10%;">hey</h4> -->
                            <h4>
                                <span class="badge rounded-pill bg-secondary">{{$project->domain}}</span>
                            </h4>
                            </div>
                        
                        <hr>
                        <p class="card-text">
                            {!! Str::limit( strip_tags( $project->description), 200 ) !!}
                        </p>

                    </div>
                    <div class="card-footer d-flex justify-content-between card-text">
                        <a class="btn btn-dark" href="/project/show/{{$project->id}}">  View Project</a>
                        <strong>
                            <img src="https://avatars.dicebear.com/api/male/:seed.svg" style="height:20px; width: 20px; border-radius: 50%;">
                            <b> {{$project->profile->firstName}} </b> <i>submitted this {{Carbon\Carbon::parse($project->created_at)->diffForHumans()}}</i>
                        </strong>
                    </div>
                </div>
                <!-- old ui --->


{{-- 

                    <div class="accordion" id="{{$project->id}}">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                
                              #{{$project->id}} &nbsp; {{$project->title}} &nbsp; &nbsp;<span class="badge rounded-pill bg-secondary">{{$project->domain}}</span> &nbsp;&nbsp; 
                              <!-- <i class="fas fa-heart"></i>456 &nbsp; -->
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#{{$project->id}}">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-7"> {{$project->description}}

                                    </div>
                                    <div class="col-md-2"> <span class="badge rounded-pill bg-secondary">{{$project->domain}}</span></div>

                                    <!-- <div class="col-md-2"> <span class="badge bg-primary">Java</span>

                                        <span class="badge bg-primary">Android</span>
                                        <span class="badge bg-primary">Kotlin</span> <span class="badge bg-primary">JetPacker</span>
                                    </div> -->
                                    <div class="col-md-3">
                                        <strong><img src="https://avatars.dicebear.com/api/male/:seed.svg" style="height:20px; width: 20px; border-radius: 50%;"><b> {{$project->profile->user->name}} </b> <i>wrote this</i>
                                        </strong>
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="https://github.com/ibrajix/JetPacker"><i class="fab fa-github"></i> View Code</a> &nbsp; 
                                <!-- <i class="fas fa-heart"> </i>456 &nbsp;   <i class="fas fa-bookmark"></i> -->
                            </div>
                        </div>
                    </div>
                </div> --}}
                @endforeach
                     
                
            </div>
            <div class="clearfix">

                {{ $projects->links() }}
            </div>
        </div>
    </div>


</x-layouts.app>