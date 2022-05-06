<x-layouts.app>
    <div class="row">
        <div class="col-12 offset-md-2 col-md-8" style="padding: 2% 3%;">
            <a class="btn btn-primary" href="/message/{{Auth::user()->profile->id}}/create" role="button" style="width: 100%;"><span class="badge" style="padding: 14px 0px; font-size: medium;"><i class="fas fa-pencil-alt"></i> SEND MESSAGE</span></a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($messages->unique('sender') as $message)
            <div class=" col-12" style="padding: 2% 3%;">
                {{-- <a href="/message/{{Auth::user()->profile->id}}/show/{{$message->sender_id}}" style="text-decoration: none;"> --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    @if($message->sender == Auth::user()->name)
                                    <a href="/message/{{$message->receiverId}}/view" style="text-decoration: none; color: black;">
                                        <h6><i>To</i> <b>{{$message->receiver}}</b></h6>
                                    @else
                                    <a href="/message/{{$message->senderId}}/view" style="text-decoration: none; color: black;">
                                        <h6><i>From</i> <b>{{$message->sender}}</b></h6>
                                    @endif
                                        {{-- <hr>
                                        <p>{!! Str::limit( strip_tags( $message->content), 200 ) !!} </p>  --}}
                                    </a>
                                </div>
                            </div>    
                        </div>
                    </div>    
                {{-- </a> --}}
            </div>
            @endforeach
        </div>    
    </div>
        
</x-layouts.app>
