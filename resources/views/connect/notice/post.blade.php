<x-layouts.app>
    <div class="container">
       <div class="row" style="margin-left: 4em; margin-right: 4em;">
           <div class="d-flex flex-row-reverse" style="padding: 1em; "> 
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/alumni">Alumni</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/professor">Professor</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/student">Student</a>
                <a type="button" class="btn btn-primary text-white" style="margin: 3px" href="/connect">Posts</a>
           </div>
       </div>
         
       <div class="row" id="post">
         
        <div class="col-md-12 col-sm-12" style="padding-right:40px;padding-left:30px; ">
              
        @if($message = Session::get('success'))
            <x-successbadge/>
           <div class="alert alert-success d-flex align-items-center" role="alert" style="margin:10px">
             <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
             <div>
               {{$message}}
             </div>
           </div>
        @endif
        
        <div class="card" style="margin:10px">
             <div class="row g-0">
                 <div class="col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-11 d-flex justify-content-center" ><h5 class="card-title " style="padding: 5px">{{$offer->title}}</h5></div>
                            <div class="col-sm-1 card-text d-flex justify-content-center">
                                <div style=" color: green ;
                                    border-style: solid; 
                                    border-radius: 10px;
                                    padding: 5px 15px 5px 15px; 
                                    border-width: 2px;
                                    display: inline;"> {{$offer->category}} 
                                </div>  
                            </div>
                            
                        </div>
                        <hr>
                     <p>
                        {!! $offer->description !!}
                    </p>
                     
                 </div>
                 <div class="d-flex justify-content-center card-footer"> 
                    @hasanyrole('student')
                    {{-- <button class="btn btn-danger text-white" onclick="event.preventDefault(); document.getElementById('apply').submit();">
                        Apply {{$offer->id}}
                    </button> --}}
                    <form id="apply" action="/connect/job/apply" method="POST" class="">
                        @csrf
                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
                        <button type="submit" class="btn btn-danger text-white" style="margin-left:1em;">
                        Apply
                      </button>
                    </form>
                  @endhasanyrole

                 </div>
                 </div>
                 </div>
                 </div>
             </div>
             
            </div>
        </div>
       
         
    </div>
     
    </x-layouts.app>