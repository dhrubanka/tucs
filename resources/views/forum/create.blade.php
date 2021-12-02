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
                     <form class="col-md-4" method="POST" action="/post/store">
                        @csrf
                         <select class="form-select col-md-12" name="community_id">
                             <option selected>CHOOSE A COMMUNITY</option>
                             @foreach ($communities as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                             @endforeach
                         </select>

                 </div>
                 <div class="card-body" style="marginn: 20px;">

                         <div class="form-group">
                           <input class="form-control" type="text" name="title" id="title" class="form-control" placeholder="TITLE">
                         </div>
                         <div class="form-group">
                             <textarea class="form-control" name="content" id="content" placeholder="CONTENT" rows="3"></textarea>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-primary">POST</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>


</x-layouts.forum-nav>
