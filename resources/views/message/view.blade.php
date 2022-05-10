<x-layouts.app>
    <div class="container">
        <div class="row">
            <div class=" col-12" style="padding: 2% 3%;">
                {{-- <a href="/message/{{Auth::user()->profile->id}}/show/{{$message->sender_id}}" style="text-decoration: none;"> --}}
                    <div class="card"  style="font-family: 'Open Sans', sans-serif;">
                        <div class="card-header">
                            <h3 class="card-title" style="padding: 1em;">{{$person->name}}</h3>
                        </div>
                        <div class="card-body" style="padding: 2% 3%;">
                            @foreach ($messages as $message)
                                @if($message->sender == Auth::user()->name)
                                <div class="row">
                                    <div class="offset-8 col-4" style="background-color: rgb(248, 205, 191); padding-top: 1em;">
                                        {{-- <h6><i>To</i> <b>{{$message->receiver}}</b></h6> --}}
                                        <p><b>{!! Str::limit( strip_tags( $message->content), 200 ) !!} </b></p> 
                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-4" style="background-color: rgb(190, 184, 184); padding-top: 1em;">
                                        {{-- <h6><i>From</i> <b>{{$message->sender}}</b></h6> --}}
                                        <p><b>{!! Str::limit( strip_tags( $message->content), 200 ) !!} </b></p> 
                                    </div>
                                </div>                            
                                @endif
                            @endforeach
                            <div class="row pt-5">
                                <div class="col-12">
                                    <form method="POST" action="/message/{{Auth::user()->profile->id}}/store">
                                        @csrf 
                                        <input type="hidden" name="receiver_id" value="{{$person->id}}">
                                        <div class="form-group" style="padding: 10px;">
                                            <textarea class="form-control" name="content" id="content" placeholder="CONTENT" rows="3" required></textarea>
                                        </div>
                                        <div class="form-group" style="padding: 10px;">
                                            <button type="submit" class="btn btn-primary">SEND</button>
                                        </div>
                                    </form>
                                    {{-- <a class="btn btn-primary" href="/message/{{Auth::user()->profile->id}}/create" role="button" style="width: 100%;"><span class="badge" style="padding: 14px 0px; font-size: medium;"><i class="fas fa-pencil-alt"></i> SEND MESSAGE</span></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>    
                {{-- </a> --}}
            </div>
        </div>    
    </div>
        
</x-layouts.app>