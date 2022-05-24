<x-layouts.app>
    <style>
        .nav-project {
            background-color: royalblue;
            margin-top: -1.5em;
            color: whitesmoke;
            padding: 1em;
        }
    </style>
    <div class="row nav-project">
        <div class="col-md-12 ">
            <div class="container ">
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-2 text-center">
                        <a href="/project" style="text-decoration: none; color: white"><h4>Projects </h4> </a> 
                    </div>
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-3">
                        <div id="search">
                            <form id="search-form" action="/search/projects" method="get">
                                <input type="search" id="searchBar" name="search" class="fas form-control text-center" placeholder="&#xf002; Search" style="border-radius: 50px;" onclick="event.preventDefault();
                                document.getElementById('search-form').addEventListener(" keyup", function(event)).submit();">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Approved</a></li>
                                <li><a class="dropdown-item" href="#">Rejected</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <a href="/project" class="btn btn-light" >All Projects</a>
                        <a href="/project/create" class="btn btn-light" >Submit a Project</a>''
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 1em;">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    @foreach( $projects as $project)
                    <div class="accordion-item" style="margin: 1em">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                &nbsp; {{$project->title}} &nbsp; &nbsp;<span class="badge rounded-pill bg-secondary">{{$project->domain}}</span> &nbsp;&nbsp; <span class="badge rounded-pill bg-primary">{{$project->permission}}</span>
                                <!-- <i class="fas fa-heart"></i>456 &nbsp; -->
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-9"> 
                                        {!! Str::limit( strip_tags( $project->description), 200 ) !!}
                                    </div>
                                    

                                    <div class="col-md-3">
                                        <b>Status: </b>
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
                                        @endif
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="/project/show/{{$project->id}}">  View Project</a>&nbsp;  <a class="btn btn-danger" href="/project/delete/ {{$project->id}}">  Delete Project</a>
                                <!-- <i class="fas fa-heart"> </i>456 &nbsp;   <i class="fas fa-bookmark"></i> -->
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


</x-layouts.app>