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
            <div class="container">
                <div class="d-flex justify-content-md-between flex-column flex-sm-row">
                    <div class="" >
                       <a href="/project" style="text-decoration: none; color: white"><h4>Projects </h4> </a> 
                    </div> 
                    <div class="" >
                        <div id="search"> 
                            <form id="search-form" action="/search/projects" method="get">
                            <input type="search" id="searchBar" name="search" class="fas form-control text-center" placeholder="&#xf002; Search" style="border-radius: 50px;" onclick="event.preventDefault();
                                    document.getElementById('search-form').addEventListener(" keyup", function(event)).submit();">
                            </form>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="/project/myprojects" class="btn btn-light" style="">My Projects</a>
                        <a href="/project/create" class="btn btn-light" style="">Submit Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class=" col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
        
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>{{$project->title}} <span class="badge rounded-pill bg-success">{{$project->domain}}</span></h5>
                    <h6>
                        <strong>
                            <img src="https://avatars.dicebear.com/api/male/:seed.svg" style="height:20px; width: 20px; border-radius: 50%;">
                            <b> {{$project->profile->firstName}} </b> <i>submitted this {{Carbon\Carbon::parse($project->created_at)->diffForHumans()}}</i>
                        </strong>
                    </h5>
                     
                </div>
                <div class="card-body">
                    <p>{!!   $project->description  !!}</p>
                </div>
                <div class="card-footer">
                    @if($project->url)
                    <a class="btn btn-secondary" href="{{$project->url}}" target="_blank">Visit link</a>
                    @endif
                    @if($project->project_file)
                    <a class="btn btn-dark" href="/project/download/{{$project->project_file}}">Download Project</a>
                    @endif
                </div>
            </div>    
         
    </div>
</div>

</x-layouts.app>
