<x-layouts.app>
    <style>
        .nav-project {
            background-color: rgb(153, 153, 255);
            margin-top: -1.5em;
            color: whitesmoke;
            padding: 1em;
        }
    </style>
    <div class="row nav-project">
        <div class="col-md-12 ">
            <div class="container ">
                <div class="row">
                    <div class="col-md-2 text-center">
                        <h4> My Projects</h4>
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
                        <a href="/project" class="btn btn-primary" style="color: whitesmoke;">All Projects</a>
                        <a href="/project/create" class="btn btn-primary" style="color: whitesmoke;">Submit a Project</a>
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
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                #{{$project->id}} &nbsp; {{$project->title}} &nbsp; &nbsp;<span class="badge rounded-pill bg-secondary">{{$project->domain}}</span> &nbsp;&nbsp;
                                <!-- <i class="fas fa-heart"></i>456 &nbsp; -->
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6"> {{$project->description}}

                                    </div>
                                    <div class="col-md-2"> <span class="badge rounded-pill bg-secondary">{{$project->domain}}</span></div>

                                    <div class="col-md-2">
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
                                    <div class="col-md-1">
                                        <strong><img src="https://avatars.dicebear.com/api/male/:seed.svg" style="height:20px; width: 20px; border-radius: 50%;"><b> {{$project->profile->user->name}} </b> <i>wrote this</i>
                                        </strong>
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="https://github.com/ibrajix/JetPacker"><i class="fab fa-github"></i> View Code</a> &nbsp;
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