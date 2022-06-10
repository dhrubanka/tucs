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
                <form action="/connect/applicantfilter" method="post"
                        style="border-style: solid; border-radius: 5px; border-width: 1px; margin:8px; padding:10px">
                        @csrf

                        <div class="form-check">
                            <select class="form-select" name="order" aria-label="Default select example">
                                <option selected>By Creation</option>
                                <option value="DESC">Recent</option>
                                <option value="ASC">Old</option>
                            </select>
                        </div>
                        <input type="text" hidden name="offer_id" value="{{$offer_id}}">
                        <div class="d-flex flex-row-reverse" style="margin: 5px;">
                             <button type="submit" class="btn btn-primary text-white">Apply</button>
                         </div>
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

                                <form action="/connect/applicantfilter" method="post"
                                    style="border-style: solid; border-radius: 5px; border-width: 1px; margin:8px; padding:10px">
                                    @csrf

                                    <div class="form-check">
                                        <select class="form-select" name="order" aria-label="Default select example">
                                            <option selected>By Creation</option>
                                            <option value="DESC">Recent</option>
                                            <option value="ASC">Old</option>
                                        </select>
                                        <input type="hidden" name="offer_id" value="{{$offer_id}}">
                                    </div>
                                    <div class="d-flex flex-row-reverse" style="margin: 5px;">
                                        <button type="submit" class="btn btn-primary text-white">Apply</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
           
            <h2 style="margin:10px">Applicants</h2>
            {{-- cards --}}
            @if($applicants != [])
            @foreach($applicants as $applicant)
            <div class="card" style="margin:10px">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title" style="padding: 5px"> <b>NAME: </b>{{ $applicant->profile->firstName }} {{ $applicant->profile->lastName }}</h5>
                                </div>
                                <div class="card-text">
                                    <div style=" color: green ;
                                border-style: solid;
                                border-radius: 10px;
                                padding: 5px 15px 5px 15px;
                                border-width: 2px;
                                display: inline;">  STUDENT
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p><h6>PHONE: {{ $applicant->profile->phone }}</h6> <h6>EMAIL:  {{ $applicant->profile->user->email }}</h6></p>
                            </div>
                            <div>
                                
                            </div>
                            <div class="d-flex flex-row">
                                <a class="btn btn-primary white-text" style="margin:5px"> Call</a>
                                <a class="btn btn-primary white-text" style="margin:5px"> Visit Profile</a>
                                <a class="btn btn-primary white-text" style="margin:5px"> Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
    </div>
</div>
    
</x-layouts.app>
