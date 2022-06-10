<x-layouts.app>
  <style>
    @media only screen and (max-width: 768px) {
    /* For mobile phones: */
        #filter{
            display: none;
        }
    }
    @media only screen and (min-width: 768px) {
    /* For mobile phones: */
    #filter-mobile{
        display: none;
    }
    }
   
</style>
    <div class="container">
       <div class="row" style="margin-left: 4em; margin-right: 4em;">
           <div class="d-flex flex-row-reverse" style="padding: 1em; "> 
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/alumni">Alumni</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/professor">Professor</a>
                <a type="button" class="btn btn-primary text-white" style="margin: 3px" href="/connect/student">Student</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect">Posts</a>
           </div>
       </div>
        
       <div class="row" id="students">
           <div class="col-md-3 col-sm-12"  style="padding:10px">

               <div class="card" style="padding: 2em" id="filter">
                   Filter
                   <form action="" style="border-style: solid; border-radius: 5px; border-width: 1px; margin:8px; padding:10px">
                   <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Projects
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                      Work Experience
                    </label>
                  </div>
                  Skills
                  <div class="">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      java
                    </label>
                  </div>
                  <div class="">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                      c++
                    </label>
                  </div>
                  <div class="d-flex flex-row-reverse" style="margin: 5px;"> <button class="btn btn-primary text-white">Apply</button></div> 
                </form>
               </div>
                
           </div>
           <div class="col-md-9 col-sm-12" style="padding-right:40px;padding-left:30px; ">
            <div class="card" style="margin:10px">
              <div class="card-body">
                  <h1>Students</h1>
              </div>
          </div>
            <div style="margin:10px" id="filter-mobile">
              <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Filter 
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                          
                        <form action="">
                          <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                           <label class="form-check-label" for="flexCheckDefault">
                             Projects
                           </label>
                         </div>
                         <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                           <label class="form-check-label" for="flexCheckChecked">
                             Work Experience
                           </label>
                         </div>
                         Skills
                         <div class="">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                           <label class="form-check-label" for="flexCheckDefault">
                             java
                           </label>
                         </div>
                         <div class="">
                           <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                           <label class="form-check-label" for="flexCheckChecked">
                             c++
                           </label>
                         </div>
                        <div class="d-flex flex-row-reverse" style="margin: 5px;"> <button class="btn btn-primary text-white">Apply</button></div> 
                      </form>
                      </div>
                    </div>
                  </div>
                  
                  
                </div>
          </div> 
            @foreach($students as $student)
                <div class="card" style="margin:10px">
                <div class="row g-0">
                    <div class="col-md-2">
                    <img src="https://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cHJvZmlsZXxlbnwwfHwwfHw%3D&w=1000&q=80" 
                    class="img-fluid rounded-circle" style="width: 10em; height: 10em; padding: 1em" alt="...">
                    </div>
                    <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title" style="padding: 5px">{{$student->profile->firstName}} {{$student->profile->lastName}}</h5>
                        <div class="card-text">
                            
                            <div style=" color: green ;
                            border-style: solid; 
                            border-radius: 10px;
                            padding: 5px 15px 5px 15px; 
                             border-width: 2px;
                             display: inline;"> STUDENT </div>
                         
                         <div class="  " style="margin-top: 10px; margin-bottom: 10px ;word-wrap: break-word;" >
                            @foreach($student->profile->userSkills as $studentskill)
                               <div class="text-white " style=" background: rgb(1, 99, 132) ;
                                border-radius: 30px;
                                padding: 3px 15px 3px 15px; 
                                 display: inline; margin :1px;" >{{$studentskill->skill->name}} </div>  
                            @endforeach
                        </div>
                        <div class="rounded" style="background: rgb(65, 52, 52); color:white; padding: 5px 15px 5px 15px; display: inline; margin:3px"><i class="fa-solid fa-code" style="color: white"> </i>  {{count($student->profile->projects)}} Projects  </div>
                        <div class="rounded" style="background: rgb(69, 90, 55); color:white; padding: 5px 15px 5px 15px; display: inline; margin:3px"><i class="fa-solid fa-briefcase" style="color: white"> </i>  {{count($student->profile->works)}} Work Experience </i> </div>
                    </div>
                    </div>
                    </div>
                </div>
                </div>
           
            @endforeach
            {{ $students->links() }}
        </div>
        </div>
        
    </div> 
    </x-layouts.app>