<x-layouts.app>
    <style>
        .nav-project {
            /* background-color: rgb(153, 153, 255); */
            background: royalblue;
            color: whitesmoke;
            margin-top: -1.5em;
            padding: 1em;
        }
    </style>
    <div class="row nav-project">
        <div class="col-md-12 ">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-md-2  text-center">
                        <a href="/project" style="text-decoration: none; color: white"><h4>All Projects </h4> </a> 
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
                
                <!-- brand new ui --->
                <div class="card" style="margin:20px">
                    <div class="card-header" style="background: rgb(184, 203, 233)">
                        &nbsp; {{$project->title}} &nbsp; &nbsp;<span class="badge rounded-pill bg-secondary">{{$project->domain}}</span> &nbsp;&nbsp; <span class="badge rounded-pill bg-primary">{{$project->permission}}</span>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin: 1em">
                            <div class="col-md-9"> 
                                {!! Str::limit( strip_tags( $project->description), 200 ) !!}
                            </div>
                            

                            <div class="col-md-3">
                                {{-- <b>Status: </b>
                                @if($project->approval == "Y")
                                <i style="color: green;"> Approved</i>
                                @elseif($project->approval == "N")
                                <i style="color:blue"> Waiting for Approval </i><!--  -->
                                @elseif($project->approval == "R")
                                <i style="color: red;">Rejected</i>
                                @endif
                                <br>
                                @if($project->remark)
                                <b> Remarks: </b>{{$project->remark}}
                                @endif --}}
                                <i class="fas fa-heart"> </i>456 &nbsp;   <i class="fas fa-bookmark"></i>  
                            </div>

                        </div>
                        <div class=" card-footer d-flex justify-content-between card-text" style="background: white">
                            <a class="btn btn-dark" href="/project/show/{{$project->id}}">  View Project</a>
                            <div>
                                <img src="https://avatars.dicebear.com/api/male/:seed.svg" style="height:20px; width: 20px; border-radius: 50%;">
                                 {{$project->profile->firstName}}   <i>submitted this {{Carbon\Carbon::parse($project->created_at)->diffForHumans()}}</i>
                            </div>
                        </div>
                    </div>
                </div>
 
                @endforeach
                     
                
            </div>
            <div class="clearfix">

                {{ $projects->links() }}
            </div>
        </div>
    </div>


</x-layouts.app>