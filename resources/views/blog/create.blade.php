<x-layouts.app>
    <!------------------------------------------ posts ---------------------------------------->
        <div class="row">
           @if ($message = Session::get('success'))
           <div class="alert alert-success alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
           </div>
       @endif
            <div class="card col-12 offset-md-2 col-md-8">
                <div class="card-header row" style="padding-top: 25px;">
                    <h5 class="card-title col-12 col-md-8">CREATE A POST</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/blog/store">
                        @csrf 
                        <div class="form-group" style="padding: 10px;">
                          <input class="form-control" type="text" name="title" id="title" class="form-control" placeholder="TITLE">
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <textarea class="form-control" name="content" id="content" placeholder="CONTENT" rows="3"></textarea>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <button type="submit" class="btn btn-primary">POST</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


</x-layouts.forum-nav>
