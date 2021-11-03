<x-layouts.app>

    <div class="container">

        <!-- TRENDING -->
        <!-- <h3">Treding Today</h3> -->
        <div class="row">
            <div class="col-6 col-md-3" style="padding: 10px;">
                <div class="card trends shadow">
                    <div class="card-header">
                        <h6 class="card-title">TITLE</h6>
                    </div>
                    <div class="card-body">
                        <h6>posted by</h6>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3" style="padding: 10px;">
                <div class="card trends shadow">
                    <div class="card-header">
                        <h6 class="card-title">TITLE</h6>
                    </div>
                    <div class="card-body">
                        <h6>posted by</h6>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3" style="padding: 10px;">
                <div class="card trends shadow">
                    <div class="card-header">
                        <h6 class="card-title">TITLE</h6>
                    </div>
                    <div class="card-body">
                        <h6>posted by</h6>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3" style="padding: 10px;">
                <div class="card trends shadow">
                    <div class="card-header">
                        <h6 class="card-title">TITLE</h6>
                    </div>
                    <div class="card-body">
                        <h6>posted by</h6>
                    </div>
                </div>
            </div>
        </div>

        <!-- FILTER -->

        <div class="row" style="margin-top: 2%;">
            <div class="col-4 col-md-3" style="padding: 10px;">
                <a class="btn btn-lg" role="button"><span class="badge rounded-pill btn-danger" style="padding: 14px;" ><i class="far fa-star"></i> POPULAR</span></a>
            </div>
            <div class="col-4 col-md-3" style="padding: 10px;">
                <a class="btn btn-lg" role="button"><span class="badge rounded-pill btn-success" style="padding: 14px;"><i class="fas fa-level-up-alt"></i> VOTES</span></a>
            </div>
            <div class="col-4 col-md-3" style="padding: 10px;">
                <a class="btn btn-lg" role="button"><span class="badge rounded-pill btn-warning" style="padding: 14px;"><i class="far fa-calendar"></i> LATEST</span></a>
            </div>
            <div class="col-12 col-md-3" style="padding: 10px;">
                <a class="btn btn-primary" role="button" style="width: 100%;"><span class="badge" style="padding: 14px 0px; font-size: medium;"><i class="fas fa-pencil-alt"></i> CREATE THREAD</span></a>
            </div>

        </div>

        <!-- THREADS -->

        <div class="row">
            <div class="col-12 col-md-8" style="margin-top: 50px;">
                <div class="row forumPostPrototype shadow">
                    <div class="card threads col-12 col-md-12">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="card-title col-12 col-md-8">POST TITLE</h5>
                                <button class="btn btn-lg col-12 col-md-4"><span class="badge rounded-pill btn-info">POST TOPIC</span></button>
                            </div>
                            <div class="row">
                                <h6 class="col-12 col-md-4">POST AUTHOR</h5>
                                <h6 class=" col-md-4">CREATED</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>semi content ...Read more</p>
                        </div>
                    </div>
                </div>

                <div class="row forumPostPrototype">
                    <div class="card threads col-12 col-md-12 shadow">
                        <div class="card-header">
                            <div class="row">
                                <h5 class="card-title col-12 col-md-8">POST TITLE</h5>
                                <button class="btn btn-lg col-12 col-md-4"><span class="badge rounded-pill btn-info">POST TOPIC</span></button>
                            </div>
                            <div class="row">
                                <h6 class="col-12 col-md-4">POST AUTHOR</h5>
                                <h6 class=" col-md-4">CREATED</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>semi content ...Read more</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="offset-md-1 col-md-3" style="margin-top: 50px;">
                <!-- COMMUNITIES  -->

                <a class="btn btn-block btn-secondary" role="button" style="width: 100%; margin-bottom: 10%;"><i class="fas fa-warehouse"></i> VIEW COMMUNITIES </a>

                <!-- TRENDING COMMUNITIES -->
                <div class="card">
                    <div class="card-header bg-danger">
                        <h5 class="card-title" style="color: whitesmoke;"><i class="fab fa-hotjar"></i> TREDING TOPIC</h5>
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
