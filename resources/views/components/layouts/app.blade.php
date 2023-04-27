<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TUCS Home Page</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Open+Sans:wght@600&family=Poppins:wght@300&display=swap" rel="stylesheet"> --}}

    <link href="https://fonts.googleapis.com/css2?family=Cabin&family=Open+Sans:wght@600&family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow-lg">
        <div class="container" id="navigation">

            <!-- TOGGLER -->
            <!-- <div class="col-2 d-md-none"> -->
                <button class="navbar-toggler" type="button" id="togBtn" data-bs-toggle="collapse" data-bs-target="#dropMenu" aria-controls="dropMenu" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
            <!-- </div> -->

            <!-- BRAND -->
            <!-- <div class="col-2 offset-md-1 col-md-1 d-none d-md-block"> -->
                <a class="navbar-brand" id="logo" href="/" style="margin-left: 10px;">
                    <img src="https://upload.wikimedia.org/wikipedia/en/4/48/The_approved_logo_of_Tezpur_University%2C_TU_Logo-Approved.png%2C_official_logo_of_Tezpur_University.png%2C_approved_insignia_of_Tezpur_University.png" style=" height:80px; width: 80px"></a>
            <!-- </div> -->

            <div id="search" >
                <form  id="search-form" action="/search" method="get">
                    
                    <input type="search" id="searchBar" name="search" class="fas form-control text-center" 
                    placeholder="  Search" style="border-radius: 50px;"
                    onclick="event.preventDefault();
                    document.getElementById('search-form').addEventListener("keyup", function(event)).submit();">
                </form>
            </div>
            <!-- MENU -->
            <!-- <div class="col-2 col-md-3" style="padding-top: 1%;"> -->
                <div class="collapse navbar-collapse" id="dropMenu" style="width: 30% !important;">
                    <ul class="nav navbar-nav nav-justified" style="width: 100% !important;">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/forum">COMMUNITIES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/connect">CONNECT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/project">PROJECT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/blog">BLOG</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/event">EVENT</a>
                        </li>
                        @Auth
                        <li class="nav-item d-flex flex-row" style="  background: rgb(185, 193, 215); border-radius: 25px;" id="profile-nav" >
                            <a class="nav-link" href="/profile/show/{{Auth::user()->id}}" id="profile-nav-pic">
                                @if ($profile->image == NULL)
                                    <img src="https://avatars.dicebear.com/api/{!! (Auth::user()->profile->gender == 'M')? 'male' : 'female'; !!}/:seed.svg" 
                                style="height:40px; width: 40px; border-radius: 50%;">
                                @else
                             <img class="card-img" src="{{ asset(str_replace('public/', 'storage/', $profile->image)) }}" alt="Profile image" 
                             style="height:40px; width: 40px; border-radius: 50%;">
                             @endif
                            </a>
                                <!-- <img id="user_img" src="/storage/logo.png" style="height:40px; width: 40px; border-radius: 50%;"> -->
                            <div class="" >
                                <a class="nav-link text-center" style="padding-right:2em;padding-top:1em; color:whitesmoke"  href="/profile/show/{{Auth::user()->id}}">
                                     {{Auth::user()->profile->firstName}} 
                                </a>
                            </div> 
                            
                        </li>
                        <li class="nav-item" style="  background: rgb(105, 123, 174); border-radius: 25px; margin-left: 5px ;margin-right: 5px; padding-left: 5px;padding-right:5px">
                            <a class="nav-link" style="padding: 1em;color:whitesmoke" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Log out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endAuth
                    </ul>
                </div>
            <!-- </div> -->

            <!-- SEARCH BAR -->
            <!-- <div class="col-2 col-md-3" style="padding-top: 1%;"> -->
                
            <!-- </div> -->

            <!-- PROFILE -->
            <!-- <div class="col-4 col-md-3" style="padding-top: 1%;"> -->
                <ul class="nav navbar-nav nav-justified" id="user">

                    @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                <li class="nav-item" style="padding-top: 4%; padding-right: 5px;">
                    <a class="nav-link" href="/message/"><i class="fas fa-comments"></i></a>
                </li>
                <li class="nav-item" style="padding-top: 4%; padding-right: 5px;">
                    <a class="nav-link" href="#"><i class="fas fa-bell"></i></a>
                </li>
                
                
                @endguest
                </ul>
            <!-- </div> -->
        </div>
    </nav>
    <!--
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                  TUCS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    -- Left Side Of Navbar --
                    <ul class="navbar-nav mr-auto">

                    </ul>


                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item ">
                            <a id="navbarDropdown" class="nav-link " href="/"  >
                                Home n
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a id="navbarDropdown" class="nav-link " href="/forum"  >
                                Forump
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a id="navbarDropdown" class="nav-link " href="/blog"  >
                               Blogs
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a id="navbarDropdown" class="nav-link " href="#"  >
                                Events
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item ">
                                <a id="navbarDropdown" class="nav-link " href="/profile"  >
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item ">
                                    <a class="nav-link " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <main >
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <div class="container">
        <footer class="row row-cols-5 py-5 my-5 border-top">
       
      
          
         
          <div class="col">
            <h5>Browse</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="/home" class="nav-link p-0 text-muted">Home</a></li>
              <li class="nav-item mb-2"><a href="/forum" class="nav-link p-0 text-muted">Communities</a></li>
              <li class="nav-item mb-2"><a href="/forum/explore" class="nav-link p-0 text-muted">Explore Communities</a></li>
              <li class="nav-item mb-2"><a href="/connect" class="nav-link p-0 text-muted">Connect</a></li>
              <li class="nav-item mb-2"><a href="/blogs" class="nav-link p-0 text-muted">Blogs</a></li>
            </ul>
          </div>
          <div class="col">
      
        </div>
          <div class="col">
            <h5>More Information</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2"><a href="/about" class="nav-link p-0 text-muted">About</a></li>
              <li class="nav-item mb-2"><a href="/developers" class="nav-link p-0 text-muted">Developers</a></li>
              <li class="nav-item mb-2"><a href="/report-bug" class="nav-link p-0 text-muted">Report a Bug</a></li>
              <li class="nav-item mb-2"><a href="/community-request" class="nav-link p-0 text-muted">Request a Community</a></li>
              <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Contact</a></li>
            </ul>
          </div>
          <div class="col">
      
        </div>
          <div class="col">
            <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <p class="text-muted">Tezpur University Computer Society © 2022</p>
          </div>
        </footer>
      </div>
</body>
</html>
