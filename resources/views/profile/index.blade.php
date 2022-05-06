<x-layouts.app>
    <div class="container">


        <div class="row" style="margin:1em; ">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header row text-center">
                        <div class="col-12 col-md-6">
                            <img src="https://avatars.dicebear.com/api/{!! ($profile->gender == 'M')? 'male' : 'female'; !!}/:seed.svg" style="height:150px; width: 200px; border-radius: 50%;">

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="row" style="margin-top: 50px;">

                            <div class="col-6 col-md-6">
                                    <h6 class="">Name</h6>
                                </div>
                                <div class="col-6 col-md-6">
                                    <h6> {{$profile->user->name}}</h6>
                                </div>
                                <div class="col-6 col-md-6">
                                    <h6>Account Type</h6>
                                </div>
                                <?php $role=$profile->user->getRoleNames();
                                $role= $role[0];
                                //var_dump();
                                ?>
                                <div class="col-6 col-md-6">
                                    <x-badge :role="$role" />
                                </div>
                                <div class="col-6 col-md-6">
                                    <h6 class="">Date of Birth</h6>
                                </div>
                                <div class="col-6 col-md-6">
                                    <h6>{{$profile->dob}}</h6>
                                </div>
                                <div class="col-6 col-md-6">
                                    <h6>Gender</h6>
                                </div>
                                <div class="col-6 col-md-6">
                                @if($profile->gender == 'M')
                                <h6>MALE</h6>
                                @else
                                <h6>FEMALE</h6>
                                @endif
                                </div>
                                <div class="col-6 col-md-6">
                                    <h6>Email</h6>
                                </div>
                                <div class="col-6 col-md-6">
                                    <h6>{{$profile->user->email}}</h6>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-bio-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bio" type="button" role="tab" aria-controls="pills-bio"
                                    aria-selected="true">BIO</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-projects-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-projects" type="button" role="tab" aria-controls="pills-projects"
                                    aria-selected="false">PROJECTS</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-forumThread-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-forumThreads" type="button" role="tab"
                                    aria-controls="pills-forumThreads" aria-selected="false">FORUM POSTS</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-blogs-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-blogs" type="button" role="tab" aria-controls="pills-blogs"
                                    aria-selected="false">BLOGS</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-skills-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-skills" type="button" role="tab" aria-controls="pills-skills"
                                    aria-selected="false">SKILLS</button>
                            </li>




                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-bio" role="tabpanel"
                                aria-labelledby="pills-bio-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center">
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
                            <div class="tab-pane fade" id="pills-skills" role="tabpanel"
                            aria-labelledby="pills-bio-tab">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="ms-auto">
                                            <button class="btn btn-primary text-white mb-5" data-bs-toggle="modal" data-bs-target="#newSkill">Add skill</button>
                                        </div>

                                        <div class="modal fade" id="newSkill" tabindex="-1" aria-labelledby="newSkillLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="newSkillLabel">Add Skill</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="/profile/store">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <select name="skillId" class="form-select" required autofocus>
                                                                <option selected>Select Skill</option>
                                                                @foreach ($skillsets as $skillset)
                                                                    <option value="{{$skillset->id}}">{{$skillset->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer form-group">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            @foreach ($profile->userSkills as $userSkill)
                                            <div class="col-12 col-md-4">
                                                {{-- {{$userSkill->skillsets->name}} --}}
                                                {{$userSkill->skill->name}}
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-forumThreads" role="tabpanel"
                                aria-labelledby="pills-forumThreads-tab">
                                @foreach($posts as $post)
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-12 col-md-9">
                                            <div class="row">
                                                <!--  threads -->
                                                <div class="card threads col-12 col-md-12">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <h5 class="card-title col-12 col-md-4">{{$post->title}}</h5>
                                                            <h6 class="col-md-2">{{$post->created_at}}</h5>
                                                            <button class="btn btn-lg col-12 col-md-4"><span class="badge rounded-pill btn-info">{{$post->community->name}}</span></button>
                                                            <a class="btn btn-success col-md-2" style="height:40px" href="/post/{{$post->id}}">View</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="pills-blogs" role="tabpanel" aria-labelledby="pills-blogs-tab">
                                <div class="card">
                                    <div class="card-body row">
                                        <div class="col-12 col-md-9">
                                            <div class="row">
                                                <!--  blogs -->
                                                <div class="card threads col-12 col-md-12">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <h5 class="card-title col-12 col-md-9">BLOG TITLE</h5>
                                                            <h6 class="col-md-3">CREATED</h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>semi content ...Read more</p>
                                                    </div>
                                                </div>
                                                <div class="card threads col-12 col-md-12">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <h5 class="card-title col-12 col-md-9">BLOG TITLE</h5>
                                                            <h6 class="col-md-3">CREATED</h5>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>semi content ...Read more</p>
                                                    </div>
                                                </div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h3>{{$profile->user->name}}</h3>
                            <div>Fear the man who kicks 1 kick 10000 times</div><p> <span>

                            <?php $role=$profile->user->getRoleNames();
                            $role= $role[0];
                            //var_dump();
                            ?>
                            <x-badge :role="$role" /></span></p>
                        </div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-9egJf45MP1S6DtxeEnSf7UMTSlzMM5xRsw&usqp=CAU" class="card-img-top"
                             alt="..." style="width: 10em;">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Skills</h4> <button class="btn btn-secondary">Add</button>
                    </div>
                    <div class="card-body">
                        <div class="badge-green">
                            Kotlin
                        </div>
                        <div class="badge-red">
                            Kotlin
                        </div>
                        <div class="badge-blue">
                            Kotlin
                        </div>
                    </div>
                    <div class="card-header d-flex justify-content-between">
                        <h4>Education</h4>  <button class="btn btn-secondary">Add </button>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <h4>Tezpur University</h4><h5>Mtech</h5> <h6>2009-2012</h6>
                            <hr>
                        </div>
                        <div class="card-body">
                            <h4>Cotton University</h4><h5>Phd</h5> <h6>2009-2012</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="card-header d-flex justify-content-between">
                        <h4>Work</h4> <button class="btn btn-secondary">Add </button>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                            <h4>Tezpur University</h4><h5>Mtech</h5> <h6>2009-2012</h6>
                            <hr>
                        </div>
                        <div class="card-body">
                            <h4>Cotton University</h4><h5>Phd</h5> <h6>2009-2012</h6>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8" style="margin-top: 1em;">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Projects</h2> <button class="btn btn-secondary">Add </button>
                    </div>
                    <div class="card-body">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href=""> See All Projects </a>
                    </div>
                </div>
                <div class="card shadow" style="margin-top: 1em;">
                    <div class="card-header d-flex justify-content-between">
                        <h2>Forum</h2> <button class="btn btn-secondary">Add </button>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href=""> See All Projects </a>
                        </div>
                    </div>
                    <div class="card shadow" style="margin-top: 1em;">
                        <div class="card-header">
                            <h2>Projects</h2>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</x-layouts.app>
