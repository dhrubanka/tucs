<x-layouts.app>
    <div class="p-4"  style="  background: rgb(192,174,238);
    background: linear-gradient(90deg, rgba(192,174,238,1) 26%, rgba(148,187,233,1) 100%);">
    <!------------------------------------------ posts ---------------------------------------->
        <div class="row">
           @if ($message = Session::get('success'))
           <div class="alert alert-success alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
           </div>
         @endif
            <div class="card col-12 offset-md-3 col-md-6" style=" background-color: rgba(255,255,255, 0.2) !important;" >
                <div class="card-header row p-2"  style="background: royalblue; color:white">
                    <h5 class="card-title col-12 col-md-8">SEND A NEW MESSAGE</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="/message/{{Auth::user()->profile->id}}/store">
                        @csrf 
                        <div class="form-group" style="padding: 10px;">
                            <select name="receiver_id" class="form-select" autofocus required>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->firstName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <textarea class="form-control" name="content" id="content" placeholder="CONTENT" rows="3" required></textarea>
                        </div>
                        <div class="form-group" style="padding: 10px;">
                            <button type="submit" class="btn" style="background: royalblue; color:white">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.forum-nav>
