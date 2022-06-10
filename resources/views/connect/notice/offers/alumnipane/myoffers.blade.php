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
                <form action="/connect/myofferfilter" method="post"
                        style="border-style: solid; border-radius: 5px; border-width: 1px; margin:8px; padding:10px">
                        @csrf

                        <div class="form-check">
                            <select class="form-select" name="order" aria-label="Default select example">
                                <option selected>By Creation</option>
                                <option value="DESC">Recent</option>
                                <option value="ASC">Old</option>
                            </select>
                        </div>
                        <div class="d-flex flex-row-reverse" style="margin: 5px;">
                             <button type="submit" class="btn btn-primary text-white">Apply</button>
                         </div>
                    </form>
            </div>

        </div>
        <div class="col-md-9 col-sm-12" style="padding-right:40px;padding-left:30px; ">
            <div class="card" style="margin:10px">
                <div class="card-body">
                    <h1>My Offers</h1>
                </div>
            </div>
            @hasanyrole('alumni')
            {{-- alumni header --}}
            <div class="card" style="margin:10px">
                <div class="card-body">
                    <a href="/connect/job/create" class="btn btn-outline-secondary"> Create Offer</a>
                    <a href="/connect/job/myoffers" class="btn btn-secondary"> My Offers</a>
                </div>
            </div>
        @endhasanyrole
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

                                <form action="/connect/myofferfilter" method="post"
                        style="border-style: solid; border-radius: 5px; border-width: 1px; margin:8px; padding:10px">
                        @csrf

                        <div class="form-check">
                            <select class="form-select" name="order" aria-label="Default select example">
                                <option selected>By Creation</option>
                                <option value="DESC">Recent</option>
                                <option value="ASC">Old</option>
                            </select>
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
            @if ($message = Session::get('success'))
                 <x-successbadge/>

                <div class="alert alert-success d-flex align-items-center" role="alert" style="margin: 10px">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <div>
                    {{$message}}
                  </div>
                </div>
            @endif
           
            {{-- cards --}}
            @foreach($offers as $offer)
            <div class="card" style="margin:10px">
                <div class="row g-0">
                    <div class="col-md-12">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title" style="padding: 5px">{{ $offer->title }}</h5>
                                </div>
                                <div class="card-text">
                                    <div style=" color: green ;
                                border-style: solid;
                                border-radius: 10px;
                                padding: 5px 15px 5px 15px;
                                border-width: 2px;
                                display: inline;"> {{ $offer->category }}
                                    </div>
                                    <div style=" color: rgb(228, 180, 34) ;
                                    border-style: solid;
                                    border-radius: 10px;
                                    padding: 5px 15px 5px 15px;
                                    border-width: 2px;
                                    display: inline;">  
                                    @if($offer->status == 'Y')
                                        ACTIVE
                                    @else
                                        INACTIVE
                                    @endif
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <p>{!! $offer->description !!} </p>
                            </div>
                            <div><a href="/connect/job" class="btn btn-danger text-white">See Details</a>
                                <a href="/connect/job/applicants/{{$offer->id}}" class="btn btn-secondary text-white">Applicants</a>
                                <a href="/connect/job/mark-inactive/{{$offer->id}}" class="btn btn-success text-white">Mark as Inactive</a>
                                @hasanyrole('student')
                                    <a href="" class="btn btn-danger text-white">Apply</a>
                                @endhasanyrole
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    </div>
</div>
    
</x-layouts.app>
