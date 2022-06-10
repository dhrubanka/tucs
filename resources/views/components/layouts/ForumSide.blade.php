<link rel="stylesheet" href="{{ asset('css/forum/side.css') }}">

<div>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Forum Map</h3>
            </div>

            <ul class="list-unstyled components">
                @if(Auth::check())
                <p>Home</p>
                <p>Popular</p>
                @endif
                <a href="/forum">
                    <p>All</p>
                </a>
                @if(Auth::check())
                <li class="active">
                    <a href="#homeSubmenu" data-bs-toggle="collapse" data-bs-target="#homeSubmenu" aria-expanded="false" class="collapsed">My Communities</a>
                    <div class="collapse show" id="homeSubmenu">
                        <ul class="  list-unstyled">
                            @foreach($communities as $community)
                            <li>
                                <a href="/community/{{$community->slug}}">{{$community->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @else
                <li></li>
                @endif


                </li>
            </ul>

            <ul class="list-unstyled CTAs" id="botList">
                <li>
                    <a href="/forum/explore" class="download">Explore Communities</a>
                </li>
                <li>
                    <a href="" class="article">Request Communities</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->

    </div>
</div>

<script>
    $(document).ready(function() {

        function myFunction(x) {
            if (x.matches) { // If media query matches
                $('#sidebar').addClass('active');
            }
        }
        var x = window.matchMedia("(max-width: 768px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });

    });
</script>