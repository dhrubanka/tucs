<x-layouts.app>

    <link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">


    <div class="forum-home">
        <div class="row" style="padding: 10px;">
            <!-- side nav community-->
            @if(Auth::check())
            <x-layouts.ForumSide :communities="$communities" />
            @else
            <x-layouts.ForumSide :communities="[] " />
            @endif
            <!--post cards-->
            <div class="col-md-9">
                <div class="row">
                    <h4>Trending</h4>
                    @foreach ($allcommunitites as $community)
                    <div class="col-4 p-1">
                         <div class="card" style="min-height: 200px; background-image: url('https://picsum.photos/200/200?random={!!  rand(10,100); !!}')">
                             <a href="/community/{{$community->slug}}">
                                 <div class="card-body text-center">
                                    <h4 style="color: white; text-shadow: -2px 2px 0 #000, 2px 2px 0 #000, 2px -2px 0 #000, -2px -2px 0 #000;">
                                        {{$community->name}}
                                     </h4>
                                 </div>
                             </a>
                         </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <h4>Explore</h4>
                    @foreach ($allcommunitites as $community)
                    <div class="col-3 p-1">
                         <div class="card" style="min-height: 100px; background-image: url('https://picsum.photos/200/200?random={!!  rand(10,100); !!}')">
                             <a href="/community/{{$community->slug}}">
                                 <div class="card-body text-center">
                                     <h4 style="color: white; text-shadow: -2px 2px 0 #000, 2px 2px 0 #000, 2px -2px 0 #000, -2px -2px 0 #000;">
                                         {{$community->name}}
                                     </h4>
                                 </div>
                             </a>
                         </div>
                    </div>
                    @endforeach
                </div>
              </div>
        </div>
    </div>
    <script>
        function postRedirect(post) {
            window.location = '{{ url("/post/' + post + '")}}';
        }
    </script>
</x-layouts.app>