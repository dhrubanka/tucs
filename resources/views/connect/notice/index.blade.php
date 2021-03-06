<x-layouts.app>
    <style>
        @media only screen and (max-width: 768px) {

            /* For mobile phones: */
            #filter {
                display: none;
            }
        }

        @media only screen and (min-width: 768px) {

            /* For mobile phones: */
            #filter-mobile {
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
                <a type="button" class="btn btn-primary text-white" style="margin: 3px" href="/connect">Posts</a>
            </div>
        </div>

        <div class="row" id="professor">
            <div class="col-md-2 col-sm-12" style="padding:10px">
                <div class="card" style="padding: 2em" id="filter">
                    Filter
                    <form action="/connect/offersfilter" method="post"
                        style="  padding:10px">
                        @csrf

                        <div class=" ">
                            <select class="form-select" name="order" aria-label="Default select example">
                                <option selected>By Time</option>
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
            <div class="col-md-10 col-sm-12" style="padding-right:40px;padding-left:30px; ">
                <div class="card" style="margin:10px">
                    <div class="card-body" style="background: royalblue;
                    color: whitesmoke;">
                        <h1>Offers</h1>
                    </div>
                </div>
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

                                    <form action="/connect/offersfilter" method="post"
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
                
                @hasanyrole('alumni')
                    {{-- alumni header --}}
                    <div class="card" style="margin:10px">
                        <div class="card-body">
                            <a href="/connect/job/create" class="btn btn-outline-secondary"> Create Offer</a>
                            <a href="/connect/job/myoffers" class="btn btn-outline-secondary"> My Offers</a>
                        </div>
                    </div>
                @endhasanyrole
                @hasanyrole('student')
                    {{-- alumni header --}}
                    <div class="card" style="margin:10px">
                        <div class="card-body">
                             
                            <a href="/connect/job/myapplications" class="btn btn-outline-secondary"> My Job Applications</a>
                        </div>
                    </div>
                @endhasanyrole
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                 <x-successbadge/>

                <div class="alert alert-success d-flex align-items-center" role="alert" style="margin:10px">
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
                                        <h5 class="card-title" style="padding: 5px">{{$offer->title }} </h5>
                                    </div>
                                    <div class="card-text">
                                        <div style=" color: green ;
                                    border-style: solid;
                                    border-radius: 10px;
                                    padding: 5px 15px 5px 15px;
                                    border-width: 2px;
                                    display: inline;"> {{ $offer->category }}
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                  <p>{!! $offer->description !!} </p>
                                </div>
                                <div class="card-footer d-flex justify-content-between " style="background: white">
                                    <div class="d-flex flex-row ">
                                    <a href="/connect/job/{{$offer->id}}" class="btn  text-white" style="background: rgb(75, 75, 181)">See Details</a>
                                    @hasanyrole('student')
                                      {{-- <button class="btn btn-danger text-white" onclick="event.preventDefault(); document.getElementById('apply').submit();">
                                          Apply {{$offer->id}}
                                      </button> --}}
                                      <form id="apply" action="/connect/job/apply" method="POST" class="">
                                          @csrf
                                          <input type="hidden" name="offer_id" value="{{$offer->id}}">
                                          <button type="submit" class="btn text-white" style="margin-left:1em;background: rgb(23, 33, 36)">
                                          Apply
                                        </button>
                                      </form>
                                    @endhasanyrole
                                    </div>
                                    <div>
                                     Posted on {{$offer->created_at}}
                                    </div>
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
