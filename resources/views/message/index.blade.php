<x-layouts.app>
     
    <div class="container">
        <div class="row"  style="">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between" style="background: royalblue;margin-left:-12px;margin-right:-12px">
                    <h1 class="text-white">Messages</h1>
                    <a class="btn btn-light" href="/message/{{Auth::user()->profile->id}}/create" role="button"   
                       style="margin-top: 5px" ><i class="fas fa-pencil-alt"></i> SEND MESSAGE
                    </a>
                </div>
                <div class="card-body">
                    @foreach ($messages->unique('sender') as $message)
                    <div class=" col-12" style="padding: 2% 3%;">
                        {{-- <a href="/message/{{Auth::user()->profile->id}}/show/{{$message->sender_id}}" style="text-decoration: none;"> --}}
                        <div class="card" style="background: rgb(227, 241, 241)">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/message/{{$message->convoID}}/view" style="text-decoration: none; color: black;">
                                            @if($message->suID == Auth::user()->id)
                                            <h6><b>{{$message->receiver}}</b></h6>  
                                            @else
                                            <h6><b>{{$message->sender}}</b></h6>
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

            
        </div>
    </div>

</x-layouts.app>