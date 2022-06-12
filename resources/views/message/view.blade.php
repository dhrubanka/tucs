<x-layouts.app>
    <div class="container">
        <div class="row">
            <div class=" col-12" style="padding: 2% 3%;">
                {{-- <a href="/message/{{Auth::user()->profile->id}}/show/{{$message->sender_id}}" style="text-decoration: none;"> --}}
                <div class="card" style="font-family: 'Open Sans', sans-serif;">
                    <div class="card-header d-flex flex-row justify-content-between">
                        <h3 class="card-title" style="padding: 1em;"> 
                            @if($messages[0]->suID == Auth::user()->id)
                             {{$messages[0]->receiver}} 
                            @else
                             {{$messages[0]->sender}}
                            @endif
                            <a href="/message/1/view"><i class="fa-solid fa-arrows-rotate"></i></a>
                        </h3>
                        <h4 style="padding: 1em;"><a class="btn btn-info text-white" href="/message">Back to inbox</a></h3>
                    </div>
                    <div class="card-body" style="padding: 2% 3%;">
                       <div class="d-flex justify-content-center" style="margin: 1em">  {{$messages->links()}}</div>
                        @foreach ($messages->reverse() as $message)
                        @if($message->msgSender == Auth::user()->profile->id)
                        <div class="row" style="margin-bottom: 1em;">
                            <div class=" offset-8 col-4" style="background-color: rgb(248, 205, 191); padding-top: 1em;">
                                {{-- <h6><i>To</i> <b>{{$message->receiver}}</b></h6> --}}
                                <p><b>{!! Str::limit( strip_tags( $message->content), 200 ) !!} </b>
                                    <br><small><i>{{$message->created_at}}</i></small>
                                </p>
                            </div>
                        </div>
                        @else
                        <div class="row" style="margin-bottom: 1em;">
                            <div class="col-4" style="background-color: rgb(190, 184, 184); padding-top: 1em;">
                                {{-- <h6><i>From</i> <b>{{$message->sender}}</b></h6> --}}
                                <p><b>{!! Str::limit( strip_tags( $message->content), 200 ) !!} </b>
                                    <br><small><i>{{$message->created_at}}</i></small>
                                </p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="row pt-5">
                            <div class="col-12">
                                <form method="POST" action="/message/{{Auth::user()->profile->id}}/store">
                                    @csrf
                                    @if($message->receiverID == Auth::user()->profile->id)
                                    <input type="hidden" name="receiver_id" value="{{$messages[0]->senderID}}">
                                    @else
                                    <input type="hidden" name="receiver_id" value="{{$messages[0]->receiverID}}">
                                    @endif
                                    <div class="form-group" style="padding: 10px;">
                                        <textarea class="form-control" name="content" id="content" placeholder="Write Your Text Here" rows="3" required></textarea>
                                    </div>
                                    <div class="form-group d-flex flex-row-reverse" style="padding: 10px;">
                                        <button type="submit" class="btn btn-dark">SEND</button> &nbsp;
                                        <h3><a href="/message/1/view"><i class="fa-solid fa-arrows-rotate"></i></a></h3>
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