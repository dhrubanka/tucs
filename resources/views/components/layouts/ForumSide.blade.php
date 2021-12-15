<link rel="stylesheet" href="{{ asset('css/forum/side.css') }}">
<div class="col-md-3 " id="left_nav">
                <ul class="side-list1">
                    @if(Auth::check())
                    <li><a href="forum"><i class="fas fa-home "></i> &nbsp Home</a></li>
                    <li><a href=""><i class="fas fa-level-up-alt"></i>  &nbsp Popular</a></li>
                    @endif
                    <li><a href=""><i class="fas fa-globe-asia"></i> &nbsp All</a></li>

                </ul>
                <ul class="side-list2">
                    <li> <a style="border-style: solid; border-radius: 10px; 
                    padding: 5px 15px 5px 15px;  border-width: 2px; display: inline;
                    color:beige; background-color:cornflowerblue;
                    " href=""> Explore Communities</a></li>
                    @if(Auth::check())
                    <li>
                        <button class=" btn collapsed" data-bs-toggle="collapse" data-bs-target="#users-collapse" aria-expanded="true" style="padding-left: 0px; color:rgb(6, 84, 252);">
                            <span data-feather="users"></span>
                            MY COMMUNITIES <i class="fas fa-caret-down"></i>
                        </button>

                        <div class="collapse show" id="users-collapse">
                            <ul style="list-style: none; padding:0%">
                            @foreach($communities as $community)    
                            <li><a href="/community/{{$community->slug}}" class="nav-link  rounded">
                                        <img src="https://picsum.photos/20/20?random={!!  rand(10,100); !!}" class="rounded" style="max-height: 30px;" alt="..."> <small> <i> </small> {{$community->name}}</i>
                                    </a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>

            </div>