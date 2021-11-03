<x-layouts.app>
    <div class="container">


        <div class="row" style="margin:1em; ">
            <div class="col-12 ">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <img src="panda.png" style="height:150px; width: 150px; border-radius: 50%;">
                        <h5 class="card-title">
                            NAME
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-forum-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-forum" type="button" role="tab" aria-controls="pills-forum"
                                    aria-selected="true">Forum Details</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-basic-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-basic" type="button" role="tab" aria-controls="pills-basic"
                                    aria-selected="false">Basic Details</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-forum" role="tabpanel"
                                aria-labelledby="pills-forum-tab">
                                <div class="row text-center">
                                    <div class="col-6 col-md-6">
                                        <h6 class="">Total Threads</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Threads</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Total likes</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Likes</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Total Communities</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Communities</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Most liked thread</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>thread</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Most commented thread</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>thread</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-basic" role="tabpanel"
                                aria-labelledby="pills-basic-tab">
                                <div class="row text-center">
                                    <div class="col-6 col-md-6">
                                        <h6 class="">Date of Birth</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Date of Birth</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Gender</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Gender</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Email</h6>
                                    </div>
                                    <hr style="margin-top: 5px; width: 50%; margin-left:25%; margin-bottom: 5px;">
                                    <div class="col-12 col-md-12">
                                        <h6>Education :</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Institute</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Name</h6>
                                        <p>Course
                                            <br>From - To
                                        </p>
                                    </div>
                                    <hr style=" width: 50%; margin-left:25%; margin-bottom: 5px;">
                                    <div class="col-12 col-md-12">
                                        <h6>Work :</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Organization</h6>
                                    </div>
                                    <div class="col-6 col-md-6">
                                        <h6>Name</h6>
                                        <p>Role
                                            <br>From - To
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- THREAD -->

        <div class="row" style="margin: 1em ;">

            <div class="card col-12 ">
                <div class="card-body">
                    <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-bio-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-bio" type="button" role="tab" aria-controls="pills-bio"
                                aria-selected="true">BIO</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-forumThread-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-forumThreads" type="button" role="tab"
                                aria-controls="pills-forumThreads" aria-selected="false">FORUM THREADS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-blogs-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-blogs" type="button" role="tab" aria-controls="pills-blogs"
                                aria-selected="false">BLOGS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-comments-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments"
                                aria-selected="false">COMMENTS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-projects-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-projects" type="button" role="tab" aria-controls="pills-projects"
                                aria-selected="false">PROJECTS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-events-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-events" type="button" role="tab" aria-controls="pills-events"
                                aria-selected="false">EVENTS</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-bio" role="tabpanel"
                            aria-labelledby="pills-bio-tab">
                            <div class="card">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-forumThreads" role="tabpanel"
                            aria-labelledby="pills-forumThreads-tab">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-12 col-md-9">
                                        <div class="row">
                                            <h5 class="col-12 col-md-1">Sl</h6>
                                                <h5 class="col-12 col-md-6">TITLE</h6>
                                                    <h5 class="col-12 col-md-3">CREATED</h6>
                                                        <h5 class="col-12 col-md-1"><i class="fas fa-thumbs-up"></i>
                                                            </h6>
                                                            <h5 class="col-12 col-md-1"><i
                                                                    class="fas fa-thumbs-down"></i></h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="col-12 col-md-1">1</h6>
                                            <h6 class="col-12 col-md-6">Why this kolaveri di</h6>
                                            <h6 class="col-12 col-md-3">now</h6>
                                            <h6 class="col-12 col-md-1">2</h6>
                                            <h6 class="col-12 col-md-1">200</h6>
                                        </div>

                                    </div>
                                    <div class="col-12 offset-md-1 col-md-2">
                                        <div class="row">
                                            <h6 class="col-8 col-md-8">TOTAL THREADS</h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                            <h6 class="col-8 col-md-8">TOTAL <i class="fas fa-thumbs-up"></i></h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                            <h6 class="col-8 col-md-8">TOTAL <i class="fas fa-thumbs-down"></i></h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-blogs" role="tabpanel" aria-labelledby="pills-blogs-tab">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-12 col-md-9">
                                        <div class="row">
                                            <h5 class="col-12 col-md-1">Sl</h6>
                                                <h5 class="col-12 col-md-6">TITLE</h6>
                                                    <h5 class="col-12 col-md-3">CREATED</h6>
                                                        <h5 class="col-12 col-md-1"><i class="fas fa-thumbs-up"></i>
                                                            </h6>
                                                            <h5 class="col-12 col-md-1"><i
                                                                    class="fas fa-thumbs-down"></i></h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="col-12 col-md-1">1</h6>
                                            <h6 class="col-12 col-md-6">Why this kolaveri di</h6>
                                            <h6 class="col-12 col-md-3">now</h6>
                                            <h6 class="col-12 col-md-1">2</h6>
                                            <h6 class="col-12 col-md-1">200</h6>
                                        </div>

                                    </div>
                                    <div class="col-12 offset-md-1 col-md-2">
                                        <div class="row">
                                            <h6 class="col-8 col-md-8">TOTAL BLOGS</h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                            <h6 class="col-8 col-md-8">TOTAL <i class="fas fa-thumbs-up"></i></h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                            <h6 class="col-8 col-md-8">TOTAL <i class="fas fa-thumbs-down"></i></h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-comments" role="tabpanel"
                            aria-labelledby="pills-comments-tab">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-12 col-md-9">
                                        <div class="row">
                                            <h5 class="col-12 col-md-1">Sl</h6>
                                                <h5 class="col-12 col-md-5">COMMENT</h6>
                                                    <h5 class="col-12 col-md-2">CREATED</h6>
                                                        <h5 class="col-12 col-md-4">POST</h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="col-12 col-md-1">1</h6>
                                            <h6 class="col-12 col-md-5">I really dont know</h6>
                                            <h6 class="col-12 col-md-2">now</h6>
                                            <h6 class="col-12 col-md-4">Why this kolaveri di</h6>
                                        </div>

                                    </div>
                                    <div class="col-12 offset-md-1 col-md-2">
                                        <div class="row">
                                            <h6 class="col-8 col-md-8">TOTAL COMMENTS</h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-projects" role="tabpanel"
                            aria-labelledby="pills-projects-tab">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-12 col-md-9">
                                        <div class="row">
                                            <h5 class="col-12 col-md-1">Sl</h6>
                                                <h5 class="col-12 col-md-5">TITLE</h6>
                                                    <h5 class="col-12 col-md-4">DESCRIPTION</h6>
                                                        <h5 class="col-12 col-md-2">CREATED</h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="col-12 col-md-1">1</h6>
                                            <h6 class="col-12 col-md-5">TUSC WEB PROJECT</h6>
                                            <h6 class="col-12 col-md-4">A PLATFORM FOR GEEKS TO INTERACT</h6>
                                            <h6 class="col-12 col-md-2">NOW</h6>
                                        </div>

                                    </div>
                                    <div class="col-12 offset-md-1 col-md-2">
                                        <div class="row">
                                            <h6 class="col-8 col-md-8">TOTAL PROJECTS</h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-events" role="tabpanel" aria-labelledby="pills-events-tab">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-12 col-md-9">
                                        <div class="row">
                                            <h5 class="col-12 col-md-1">Sl</h6>
                                                <h5 class="col-12 col-md-5">TITLE</h6>
                                                    <h5 class="col-12 col-md-4">DESCRIPTION</h6>
                                                        <h5 class="col-12 col-md-2">DATE</h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="col-12 col-md-1">1</h6>
                                            <h6 class="col-12 col-md-5">WEBINAR ON COVID NEGLIGENCE</h6>
                                            <h6 class="col-12 col-md-4">DISCUSSION ON THE IMPACT OF COVID PROTOCOL
                                                NEGLIGENCE</h6>
                                            <h6 class="col-12 col-md-2">22-09-2021</h6>
                                        </div>

                                    </div>
                                    <div class="col-12 offset-md-1 col-md-2">
                                        <div class="row">
                                            <h6 class="col-8 col-md-8">TOTAL EVENTS</h6>
                                            <h6 class="col-4 col-md-4">10</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</x-layouts.app>
