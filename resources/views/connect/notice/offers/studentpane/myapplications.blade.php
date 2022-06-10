<x-layouts.app>
    <style>
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
                <a type="button" class="btn btn-outline-primary" style="margin: 3px"
                    href="/connect/professor">Professor</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect/student">Student</a>
                <a type="button" class="btn btn-outline-primary" style="margin: 3px" href="/connect">Posts</a>
            </div>
        </div>

    
    <div class="row" id="professor">
        <div class="col-md-3 col-sm-12" style="padding:10px">
            <div class="card" style="padding: 2em" id="filter">
                Filter
                <form action=""
                    style="border-style: solid; border-radius: 5px; border-width: 1px; margin:8px; padding:10px">
                    <div class="form-check">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>By Creation</option>
                            <option value="1">New</option>
                            <option value="2">Old</option>
                        </select>
                    </div>
                    <div class="d-flex flex-row-reverse" style="margin: 5px;"> <button
                            class="btn btn-primary text-white">Apply</button></div>
                </form>
            </div>

        </div>
        <div class="col-md-9 col-sm-12" style="padding-right:40px;padding-left:30px; ">
            <div style="margin:10px" id="filter-mobile">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Filter
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <form action="">
                                    <div class="form-check">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>By Creation</option>
                                            <option value="1">New</option>
                                            <option value="2">Old</option>
                                        </select>
                                    </div>
                                    <div class="d-flex flex-row-reverse" style="margin: 5px;"> <button
                                            class="btn btn-primary text-white">Apply</button></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
           <h3 style="margin-left: 1em;">My Applications</h3>
            {{-- cards --}}
            @if ($message = Session::get('success'))
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                  </symbol>
                  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                  </symbol>
                  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                  </symbol>
                </svg>

                <div class="alert alert-success d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    {{$message}}
                  </div>
                </div>
            @endif
            @foreach($jobs as $job)
            <div class="card" style="margin:10px">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title" style="padding: 5px">{{ $job->offer->title }}</h5>
                                </div>
                                <div class="card-text">
                                    <div style=" color: green ;
                                border-style: solid;
                                border-radius: 10px;
                                padding: 5px 15px 5px 15px;
                                border-width: 2px;
                                display: inline;"> {{ $job->offer->category }}
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p>{!! $job->offer->description !!} </p>
                            </div>
                            <div><a href="/connect/job/revoke/{{$job->id}}" class="btn btn-danger text-white">Revoke Application</a>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{$jobs->links()}}
        </div>

    </div>
    </div>
</div>
    
</x-layouts.app>
