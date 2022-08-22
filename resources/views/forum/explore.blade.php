<x-layouts.app>
    <link rel="stylesheet" href="{{ asset('css/forum/forum_show.css') }}">
    <div class="wrapper">
        <!-- side nav community-->
        @if (Auth::check())
            <x-layouts.ForumSide :communities="$communities" />
        @else
            <x-layouts.ForumSide :communities="[]" />
        @endif
        <div class="row" id="content">
            <div class="col-1">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
            </div>
            <!--post cards-->
            <div class="col-10" style="margin-left: 1em;">
                <div class="row">
                    <h4>Trendings</h4>
                    @foreach ($allcommunitites as $community)
                        <div class="col-md-6 col-sm-12 p-1">
                            <div class="card text-center" style=" background: #780206;  /* fallback for old browsers */
                            background: -webkit-linear-gradient(to right, #061161, #780206);  /* Chrome 10-25, Safari 5.1-6 */
                            background: linear-gradient(to right, #061161, #780206); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                            ">
                                <a href="/community/{{ $community->slug }}">
                                    <div class="card-body">
                                        <h4 class="card-text text-white"
                                            style=" height:3em;color: white; text-shadow: -2px 2px 0 #000, 2px 2px 0 #000, 2px -2px 0 #000, -2px -2px 0 #000;">
                                            {{ $community->name }}
                                        </h4>
                                        {{-- <div class="card-footer">
                                            <div class="btn btn-light">View </div>
                                        </div> --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row ">
                    <h4>Explore</h4>
                    @foreach ($allcommunitites as $community)
                        <div class="col-md-6 col-sm-12 p-1">
                            <div class="card text-center" style=" background: #7474BF;  /* fallback for old browsers */
                            background: -webkit-linear-gradient(to right, #348AC7, #7474BF);  /* Chrome 10-25, Safari 5.1-6 */
                            background: linear-gradient(to right, #348AC7, #7474BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                            
                            ">
                                <a href="/community/{{ $community->slug }}">
                                    <div class="card-body text-center">
                                        <h4
                                            style="color: white; text-shadow: -2px 2px 0 #000, 2px 2px 0 #000, 2px -2px 0 #000, -2px -2px 0 #000; height:3em">
                                            {{ $community->name }}
                                        </h4>
                                        {{-- <div class="card-footer">
                                            <div class="btn btn-light">View </div>
                                        </div> --}}
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
            window.location = '{{ url("/post/' + post + '") }}';
        }
        let All = document.getElementsByClassName("card");
        let generateGrad = () => {
            let angle = Math.floor(Math.random() * 360);
            // return `linear-gradient(${0}deg, ${colorOne}, ${colorTwo})`;

            const r1 = Math.round(Math.random() *
            255); // Math.random() outputs a numer between 0(inclusive) & 1(exclusive) with around 17 decimal digits.
            const g1 = Math.round(Math.random() *
            255); // We take this number and multiply it by 255. This number can never go above 255.
            const b1 = Math.round(Math.random() *
            255); // We have a decimal number with we make an integer with Math.round() which rounds off the previous output.
            // to add random transparency to the image;        
            // This output is a whole number between 0 & 255 and can be assigned as values for the rgba() property.
            const a1 = Math.round(Math.random() * 10) /
            10; //  *** for alpha values we need between 0 & 1 so we multiply the random number with 10 so as to get a value X.xxxxx, round it off so as to X and then                                                                divide it by 10 to get a decimal number or 1. ***  //

            const r2 = Math.round(Math.random() * 255);
            const g2 = Math.round(Math.random() * 255);

            const b2 = Math.round(Math.random() * 255);
            // to add random transparency to the image;
            const a2 = Math.round(Math.random() * 10) / 10;

            return `linear-gradient(${angle}deg, rgba(${r1},${g1},${b1},${a1}), rgba(${r2},${g2},${b2},${a2}))`;

        }
        let init = () => {
            for (var i = 0; i < All.length; i++) {
                All[i].style.background = generateGrad();
            }
        }
        // window.onload = init();
    </script>
</x-layouts.app>
