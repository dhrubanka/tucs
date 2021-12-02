<x-layouts.app>
    <div class="container">

        <div class="card shadow">
            <div class="card-body">
                <div class="row" style="margin-top: 2%;">
                    <h3 class="col-8 col-md-10">
                        {{ $communites->name }}
                    </h3>
                    <div class="col-4 col-md-2">
                        @if ($communites->profile_id)
                            <form method="POST" action="/community/unsubscribe">
                                @csrf
                                <input type="hidden" name="community_id" value="{{ $communites->id }}">
                                {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>
                                    Unsubscribe</button>
                            </form>
                        @else
                            <form method="POST" action="/community/subscribe">
                                @csrf
                                <input type="hidden" name="community_id" value="{{ $communites->id }}">
                                {{-- <input type="hidden" name="search" value="{{$search}}"> --}}
                                <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i>
                                    Subscribe</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-12">
                        <p>{{ $communites->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FILTER -->

        <div class="row" style="margin-top: 2%;">
            <div class="col-4 col-md-3" style="padding: 10px;">
                <a class="btn btn-lg" role="button"><span class="badge rounded-pill btn-danger"><i
                            class="far fa-star"></i> POPULAR</span></a>
            </div>
            <div class="col-4 col-md-3" style="padding: 10px;">
                <a class="btn btn-lg" role="button"><span class="badge rounded-pill btn-success"><i
                            class="fas fa-level-up-alt"></i> VOTES</span></a>
            </div>
            <div class="col-4 col-md-3" style="padding: 10px;">
                <a class="btn btn-lg" role="button"><span class="badge rounded-pill btn-warning"><i
                            class="far fa-calendar"></i> LATEST</span></a>
            </div>
            <div class="col-12 col-md-3" style="padding: 10px;">
                <a class="btn btn-block btn-primary" href="/post/create" role="button" style="width: 100%;"><i
                        class="fas fa-pencil-alt"></i> CREATE THREAD</a>
            </div>

        </div>

        <!-- THREADS -->

        <div class="row">
            <div class="col-12 col-md-8" style="margin-top: 50px;">


                <div class="row forumPostPrototype">
                    @foreach ($posts as $post)
                        <div class="card threads col-12 col-md-12 shadow">
                            <div class="card-header">
                                <div class="row">
                                    <h5 class="card-title col-12 col-md-8">{{ $post->title }}</h5>
                                    <button class="btn btn-lg col-12 col-md-4"><span
                                            class="badge rounded-pill btn-info">POST TOPIC</span></button>
                                </div>
                                <div class="row">
                                    <h6 class="col-12 col-md-4">{{ $post->user->name }}</h5>
                                        <h6 class=" col-md-4">CREATED</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>semi content ...Read more</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="offset-md-1 col-md-3" style="margin-top: 50px;">
                <!-- COMMUNITIES  -->

                <a class="btn btn-block btn-secondary" role="button" style="width: 100%; margin-bottom: 10%;"><i
                        class="fas fa-warehouse"></i> VIEW COMMUNITIES </a>

                <!-- TRENDING COMMUNITIES -->
                <div class="card">
                    <div class="card-header bg-danger">
                        <h5 class="card-title" style="color: whitesmoke;"><i class="fab fa-hotjar"></i> TREDING
                            TOPIC</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">TOPIC 1</a>
                            <a href="#" class="list-group-item list-group-item-action">TOPIC 2</a>
                            <a href="#" class="list-group-item list-group-item-action">TOPIC 3</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-layouts.app>
