<x-layouts.app>
   

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
                            @if(auth()->user()->id == $profile->user->id) 
                            <button  class="btn btn-primary rounded text-white" id="activateSkillsDelete"> Edit </button>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newSkill" id="addSkill">Add</button> @endif
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
                                            @endAuth
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="userSkillCard">
                        @foreach ($profile->userSkills as $userSkill)
                        <form method="POST" action="" class="form" style="float: left; white-space: nowrap;">
                            @csrf
                            <span class="badge rounded-pill bg-secondary" >
                                {{$userSkill->skill->name}}
                                    <span style="display:inline-block; ">
                                        <a class="SkillsDelete btn btn-sm bg-danger text-white m-1 " style="display: none;" href="javascript:void(0)"  onclick="submitForm({{$userSkill->id}});">X</a>
                                    </span>
                            </span>&nbsp;
                        </form>
                        @endforeach
                    </div>
                    <div class="card-header d-flex justify-content-between" style="background: rgb(149, 159, 191);;color:white">
                        <h4>Education</h4>
                        <div class="ms-auto">
                            @if(auth()->user()->id == $profile->user->id) 
                            <button  class="btn btn-primary rounded text-white" id="activateEducationDelete"> Edit </button>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newEducation" id="addEducation">Add</button>@endif
                        </div>

                        <div class="modal fade" id="newEducation" tabindex="-1" aria-labelledby="newEducationLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="newEducationLabel">Add Education</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="" class="form2">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="schoolName" id="schoolName" class="form-control" placeholder="School Name" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="courseName" id="courseName" class="form-control" placeholder="Course Name" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" type="date" name="startDate" id="startDate" class="form-control" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" type="date" name="endDate" id="endDate" class="form-control" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3"></textarea>
                                                <input type="hidden" name="profile_id" value="{{Auth::user()->profile->id}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer form-group">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            @Auth 
                                            <a class="btn bg-primary text-white" href="javascript:void(0)" onclick="submitEducationAddForm();">Add</a>
                                             @endAuth
                                         </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="educationCard">
                        @foreach ($educations as $education)
                        <form method="POST" action="" class="form">
                            {{-- <form method="POST" action="" class="form" style="float: left; white-space: nowrap;"> --}}
                                @csrf
                            <h4>{{$education->schoolName}}
                                <span style="display:inline-block; float:right;">
                                    <a class="EducationDelete btn btn-sm bg-danger text-white m-1 " style="display: none;" href="javascript:void(0)"  onclick="submitForm2({{$education->id}});">X</a>
                                </span>
                            </h4>
                            <h5>{{$education->courseName}}</h5>
                            <h6>{{$education->startDate}} - {{$education->endDate}}</h6>
                            <h6>{{$education->description}}</h6>
                            <hr>
                        </form>
                        @endforeach
                    </div>
                    <div class="card-header d-flex justify-content-between" style="background: rgb(149, 159, 191);color:white">
                        <h4>Work</h4>
                        <div class="ms-auto">
                            @if(auth()->user()->id == $profile->user->id)
                            <button  class="btn btn-primary rounded text-white" id="activateWorkDelete"> Edit </button>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newWork" id="addWork">Add</button> @endIf
                        </div>

                        <div class="modal fade" id="newWork" tabindex="-1" aria-labelledby="newWorkLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="newWorkLabel" style="color: black">Add Work</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="" class="form2">
                                        @csrf
                                        <div class="modal-body">
                                           
                                            <div class="alert alert-danger print-error-msg" style="display:none">

                                                <ul></ul>
                                        
                                            </div>
                                             
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="companyName" id="companyName" class="form-control" placeholder="Company Name" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" type="text" name="designation" id="designation" class="form-control" placeholder="Designation" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" type="date" name="startDate" id="startDate" class="form-control" required autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <label for="current" class="text-md-right text-dark"">&nbsp Still Working</label>
                                                <input id="current" type="checkbox"  class="form-check-input" name="current" onclick='workEndDateToggle()' checked autofocus>
                                            </div>
                                            <div class="mb-3" id="workEndDate" style="display:none">
                                                <input class="form-control" type="date" name="endDate" id="endDate" class="form-control" autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3"></textarea>
                                                <input type="hidden" name="profile_id" value="{{Auth::user()->profile->id}}">
                                            </div>
                                        </div>
                                        <div class="modal-footer form-group">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            @Auth 
                                            <a class="btn bg-primary text-white" href="javascript:void(0)" onclick="submitWorkAddForm();">Add</a>
                                             @endAuth
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body" id="workCard">
                        @foreach ($works as $work)
                                <h4>{{$work->companyName}}
                                    <span style="display:inline-block; float:right;">
                                        <a class="WorkDelete btn btn-sm bg-danger text-white m-1 " style="display: none;" href="javascript:void(0)"  onclick="submitForm3({{$work->id}});">X</a>
                                    </span>    
                                </h4>
                                <h5>{{$work->designation}}</h5>
                                <h6>{{$work->startDate}} - @if($work->current == 0) {{$work->endDate}} @endIf @if($work->current == 1) Current @endIf  </h6>
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
        $( document ).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json'
            });
        });

        const btn = document.getElementById('activateSkillsDelete');
        const btn2 = document.getElementById('activateEducationDelete');
        const btn3 = document.getElementById('activateWorkDelete');

        const current = document.getElementById('current');
        const workEndDate = document.getElementById('workEndDate');
    
        function workEndDateToggle() {
            if (current.checked == true){
                workEndDate.style.display = "none";
                // current.value=off;
                console.log(current.value);
            } else {
                workEndDate.style.display = "block";
                console.log(current.value);
            }
        }

        btn.addEventListener('click', () => {
        const btns = document.getElementsByClassName('SkillsDelete');
        for (const bn of btns) {
            if (bn.style.display === 'none') {
                // 👇️ this SHOWS the form
                bn.style.display = 'block';
                btn.style.background = "green";
                btn.innerHTML = "Done";
                document.getElementById('addSkill').disabled = true; 
            } else {
                // 👇️ this HIDES the form
                bn.style.display = 'none';
                btn.style.background = "#0d6efd";
                btn.innerHTML = "Edit";
                document.getElementById('addSkill').disabled = false; 
            }
        }
        });

        btn2.addEventListener('click', () => {
        const btns = document.getElementsByClassName('EducationDelete');
        for (const bn of btns) {
            if (bn.style.display === 'none') {
                // 👇️ this SHOWS the form
                bn.style.display = 'block';
                btn2.style.background = "green";
                btn2.innerHTML = "Done";
                document.getElementById('addEducation').disabled = true; 
            } else {
                // 👇️ this HIDES the form
                bn.style.display = 'none';
                btn2.style.background = "#0d6efd";
                btn2.innerHTML = "Edit";
                document.getElementById('addEducation').disabled = false; 
            }
        }
        });

        btn3.addEventListener('click', () => {
        const btns = document.getElementsByClassName('WorkDelete');
        for (const bn of btns) {
            if (bn.style.display === 'none') {
                // 👇️ this SHOWS the form
                bn.style.display = 'block';
                btn3.style.background = "green";
                btn3.innerHTML = "Done";
                document.getElementById('addWork').disabled = true; 
            } else {
                // 👇️ this HIDES the form
                bn.style.display = 'none';
                btn3.style.background = "#0d6efd";
                btn3.innerHTML = "Edit";
                document.getElementById('addWork').disabled = false; 
            }
        }
    });



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
                btn.style.background = "#0d6efd";
                btn.innerHTML = "Edit";
                document.getElementById('addSkill').disabled = false; 
            }
        });
    }

    function submitEducationAddForm(){
        $.ajax({
            type: 'POST',
            url: '/profile/storeEducation',
            data: $('.form2').serialize(),
            success: function(response){            
                $("#newEducation").modal('hide');
                $("#newEducation").load(location.href+" #newEducation>*","");
                $("#educationCard").load(location.href+" #educationCard>*","");
            }
        });
    }
        
    function submitForm2(id){
        $.ajax({
            type: 'POST',
            url: '/profile/deleteEducation/'+id,
            data: $('.form').serialize(),
            success: function(response){
                $("#educationCard").load(location.href+" #educationCard>*","");
                $("#newEducation").load(location.href+" #newEducation>*","");
                btn2.style.background = "#0d6efd";
                btn2.innerHTML = "Edit";
                document.getElementById('addEducation').disabled = false; 
            }
    });
}

function submitWorkAddForm(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/profile/storeWork',
        data: $('.form2').serialize(),
        success: function(response){            
            $("#newWork").modal('hide');
            $("#newWork").load(location.href+" #newWork>*","");
            $("#workCard").load(location.href+" #workCard>*","");
        }
    });
    }
        
function submitForm3(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/profile/deleteWork/'+id,
        data: $('.form').serialize(),
        success: function(response){
            $("#workCard").load(location.href+" #workCard>*","");
            $("#newWork").load(location.href+" #newWork>*","");
            btn3.style.background = "#0d6efd";
            btn3.innerHTML = "Edit";
            document.getElementById('addWork').disabled = false; 
            console.log(response.message);
            
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 422) {
               console.log('Not connect.\n Verify Network.');
            } 
        }



        
    });
}

function printErrorMsg (msg) {

        $(".print-error-msg").find("ul").html('');

        $(".print-error-msg").css('display','block');

        $.each( msg, function( key, value ) {

            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

        });

}


    </script>
</x-layouts.app>
