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
                        <h4>Projects</h4>
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
                                <li><a class="dropdown-item" href="#">Newfest</a></li>
                                <li><a class="dropdown-item" href="#">Oldest</a></li>
                                <li><a class="dropdown-item" href="#">Popular- Weekly</a></li>
                                <li><a class="dropdown-item" href="#">Popular- All time</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="btn btn-primary" style="color: whitesmoke;">My Projects</div>
                        <div class="btn btn-primary" style="color: whitesmoke;">Submit</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 1em;">
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                
                              #1  JetPacker &nbsp; &nbsp;<span class="badge rounded-pill bg-secondary">Android Development</span> &nbsp;&nbsp; <i class="fas fa-heart"></i>456 &nbsp;
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-7"> JetPacker is an android application which implements various jetpack libraries created by the android team. 

                                    </div>
                                    <div class="col-md-2"> <span class="badge rounded-pill bg-secondary">Android Development</span></div>

                                    <div class="col-md-2"> <span class="badge bg-primary">Java</span>

                                        <span class="badge bg-primary">Android</span>
                                        <span class="badge bg-primary">Kotlin</span> <span class="badge bg-primary">JetPacker</span>
                                    </div>
                                    <div class="col-md-1">
                                        <strong><img src="https://avatars.dicebear.com/api/male/:seed.svg" style="height:20px; width: 20px; border-radius: 50%;"><b> Dhrubanka </b> <i>wrote this</i>
                                        </strong>
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="https://github.com/ibrajix/JetPacker"><i class="fab fa-github"></i> View Code</a> &nbsp; <i class="fas fa-heart"></i>456 &nbsp;   <i class="fas fa-bookmark"></i>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                
                              #2  JetPacker &nbsp; &nbsp;<span class="badge rounded-pill bg-secondary">Android Development</span> &nbsp;&nbsp; <i class="fas fa-heart"></i>456 &nbsp;
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-7"> JetPacker is an android application which implements various jetpack libraries created by the android team. 

                                    </div>
                                    <div class="col-md-2"> <span class="badge rounded-pill bg-secondary">Android Development</span></div>

                                    <div class="col-md-2"> <span class="badge bg-primary">Java</span>

                                        <span class="badge bg-primary">Android</span>
                                        <span class="badge bg-primary">Kotlin</span> <span class="badge bg-primary">JetPacker</span>
                                    </div>
                                    <div class="col-md-1">
                                        <strong><img src="https://avatars.dicebear.com/api/male/:seed.svg" style="height:20px; width: 20px; border-radius: 50%;"><b> Dhrubanka </b> <i>wrote this</i>
                                        </strong>
                                    </div>

                                </div>
                                <a class="btn btn-dark" href="https://github.com/ibrajix/JetPacker"><i class="fab fa-github"></i> View Code</a> &nbsp; <i class="fas fa-heart"></i>456 &nbsp;   <i class="fas fa-bookmark"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class=" col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
            <a href="{{url('/project/show')}}" style="text-decoration: none;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title col-12 col-md-8">PROJECT TITLE</h5>
                        <div class="row">
                            <h6 class="col-12 col-md-4">PROJECT AUTHOR</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>project description ...Read more</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="#">VIEW CODE</a>
                    </div>
                </div>    
            </a>
        </div>
    </div>
    <div class="row">
        <div class=" col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
            <a href="{{url('/project/show')}}" style="text-decoration: none;">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title col-12 col-md-8">PROJECT TITLE</h5>
                        <div class="row">
                            <h6 class="col-12 col-md-4">PROJECT AUTHOR</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>project description ...Read more</p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="#">VIEW CODE</a>
                    </div>
                </div>    
            </a>
        </div>
    </div> -->

</x-layouts.app>