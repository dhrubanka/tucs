<x-layouts.app>
    {{-- <div class="container">


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
    </div> --}}

    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <h3>{{$profile->firstName}} {{$profile->lastName}}</h3>
                            <p> This is a nice bio <span>

                            <?php $role=$profile->user->getRoleNames();
                            $role= $role[0];
                            //var_dump();
                            ?>
                            <x-badge :role="$role" /></span></p>
                            @if(auth()->user()->id == $profile->user->id)   
                            <a class="btn" style="background: royalblue;
                            color: whitesmoke;" href="/profile/edit">Edit Profile</a>
                            @endIf
                        </div>
                        {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-9egJf45MP1S6DtxeEnSf7UMTSlzMM5xRsw&usqp=CAU" class="card-img-top"
                             alt="..." style="width: 10em;"> --}}
                             @if ($profile->image == NULL)
                             <img src="https://avatars.dicebear.com/api/{!! ($profile->gender == 'M')? 'male' : 'female'; !!}/:seed.svg" style=" width: 10em; border-radius: 50%;">
                             @else
                             <img class="card-img" src="/storage{{ $profile->image }}" alt="Profile image" style=" width: 10em; border-radius: 50%;">
                             @endif
                             
                           
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4" style="margin-top: 1em">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between" style="background: rgb(149, 159, 191);color:white">
                        <h4>Skills</h4>
                        <div class="ms-auto">
                            @if(auth()->user()->id == $profile->user->id) <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newSkill">Add</button> @endif
                        </div>

                        <div class="modal fade" id="newSkill" tabindex="-1" aria-labelledby="newSkillLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="newSkillLabel">Add Skill</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="" class="form2">
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
                                           @Auth 
                                           <a class="btn bg-primary" href="javascript:void(0)" onclick="submitUserSkillAddForm();">Add</a>
                                           {{-- <button type="submit" class="btn btn-primary">Add</button> --}}
                                            @endAuth
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="userSkillCard">
                        @foreach ($profile->userSkills as $userSkill)
                        <form method="POST" action="" class="form">
                            @csrf
                            <div class="badge-green">
                                {{-- <span class="col-8"> --}}
                                    {{$userSkill->skill->name}}
                                {{-- </span> --}}
                                {{-- <span class="badge bg-warning"> --}}
                                    {{-- <span class="bg-primary"> --}}
                                        <a class="btn btn-sm bg-danger text-white" href="javascript:void(0)" onclick="submitForm({{$userSkill->id}});">X</a>
                                    {{-- </span> --}}
                                {{-- </span> --}}
                            </div>&nbsp;
                        </form>

                            {{-- </div></form>&nbsp; --}}
                        @endforeach
                    </div>
                    <div class="card-header d-flex justify-content-between" style="background: rgb(149, 159, 191);;color:white">
                        <h4>Education</h4>
                        <div class="ms-auto">
                            @if(auth()->user()->id == $profile->user->id)<button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newEducation">Add</button>@endif
                        </div>

                        <div class="modal fade" id="newEducation" tabindex="-1" aria-labelledby="newEducationLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="newEducationLabel">Add Education</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="/profile/storeEducation">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="schoolName" id="schoolName" class="form-control" placeholder="School Name" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="courseName" id="courseName" class="form-control" placeholder="Course Name" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="startDate" id="startDate" class="form-control" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="endDate" id="endDate" class="form-control" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3"></textarea>
                                                <input type="hidden" name="profile_id" value="{{Auth::user()->profile->id}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer form-group">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            @Auth<button type="submit" class="btn btn-primary">Add</button>@endAuth
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($educations as $education)
                                <h4>{{$education->schoolName}}</h4>
                                <h5>{{$education->courseName}}</h5>
                                <h6>{{$education->startDate}} - {{$education->endDate}}</h6>
                                <h6>{{$education->description}}</h6>
                                <hr>
                        @endforeach
                    </div>
                    <div class="card-header d-flex justify-content-between" style="background: rgb(149, 159, 191);color:white">
                        <h4>Work</h4>
                        <div class="ms-auto">
                            @if(auth()->user()->id == $profile->user->id) <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newWork">Add</button> @endIf
                        </div>

                        <div class="modal fade" id="newWork" tabindex="-1" aria-labelledby="newWorkLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="newWorkLabel">Add Work</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="/profile/storeWork">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="companyName" id="companyName" class="form-control" placeholder="Company Name" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" name="designation" id="designation" class="form-control" placeholder="Designation" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="startDate" id="startDate" class="form-control" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="date" name="endDate" id="endDate" class="form-control" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3"></textarea>
                                                <input type="hidden" name="profile_id" value="{{Auth::user()->profile->id}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer form-group">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                           @Auth <button type="submit" class="btn btn-primary">Add</button>@endAuth
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        @foreach ($works as $work)
                                <h4>{{$work->companyName}}</h4>
                                <h5>{{$work->designation}}</h5>
                                <h6>{{$work->startDate}} - {{$education->endDate}}</h6>
                                <h6>{{$work->description}}</h6>
                                <hr>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8" style="margin-top: 1em;">
                <div class="card shadow" >
                    <div class="card-header d-flex justify-content-between" style="background: royalblue;color:white">
                       <h2>Projects</h2> @if(auth()->user()->id == $profile->user->id)<a href="/project/create" class="btn btn-light">Add </a> @endif
                    </div>
                    <div class="card-body">

                        <div class=" ">
                            <div class=" ">
                                {{-- @foreach ($projects as $project)
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$project->title}}</h5>
                                        <p class="card-text">{!!$project->description!!}</p>
                                        <a href="{{$project->url}}" class="btn btn-primary">Check it out</a>
                                    </div>
                                </div>
                                @endforeach --}}
                                @foreach( $projects as $project)
                                    <div class="card" style="margin:20px">
                                        <div class="card-header" style="background: rgb(184, 203, 233)">
                                            &nbsp; {{$project->title}} &nbsp; &nbsp;<span class="badge rounded-pill bg-secondary">{{$project->domain}}</span> &nbsp;&nbsp; <span class="badge rounded-pill bg-primary">{{$project->permission}}</span>
                                        </div>
                                        <div class="card-body">
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
                                            <div class="card-footer">
                                            <a class="btn btn-dark" href="/project/show/{{$project->id}}">  View Project</a>&nbsp;  
                                            @if(auth()->user()->id == $profile->user->id) <a class="btn btn-danger text-white" href="/project/delete/ {{$project->id}}">  Delete Project</a> @endIf
                                            {{-- <i class="fas fa-heart"> </i>456 &nbsp;   <i class="fas fa-bookmark"></i>   --}}
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="/project/myprojects"> See All Projects </a>
                    </div>
                </div>
                <div class="card shadow" style="margin-top: 1em;">
                    <div class="card-header d-flex justify-content-between" style="background: royalblue;color:white">
                        <h2>Forum Activity</h2>@if(auth()->user()->id == $profile->user->id) <button class="btn btn-light">Add </button> @endif
                    </div>
              
                    <div class="card-body" style="background: rgb(236, 232, 232)">
                        @foreach ($posts as $post)
                        <div class="card m-2">
                            <div class="card-body">
                            
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <p class="card-text">{{$post->description}}</p>
                                    <a href="{{$post->url}}" class="btn btn-primary text-white">Check it out</a>
                            
                            </div>

                        </div>
                        @endforeach
                        <div class="card-footer d-flex justify-content-center">
                            <a href="/forum"><h5> See All Posts </h5></a>
                        </div>
                    </div>
                </div>

            </div>
    </div>
    <script>
        function submitUserSkillAddForm(){
    $.ajax({
        type: 'POST',
        url: '/profile/storeSkill',
        data: $('.form2').serialize(),
        success: function(response){            
            $("#newSkill").modal('hide');
            $("#newSkill").load(location.href+" #newSkill>*","");
            $("#userSkillCard").load(location.href+" #userSkillCard>*","");
        }
    });
    }
        
        function submitForm(id){
    $.ajax({
        type: 'POST',
        url: '/profile/deleteSkill/'+id,
        data: $('.form').serialize(),
        success: function(response){
            $("#userSkillCard").load(location.href+" #userSkillCard>*","");
            $("#newSkill").load(location.href+" #newSkill>*","");
        }
    });
}


    </script>
</x-layouts.app>
