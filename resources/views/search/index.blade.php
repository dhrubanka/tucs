<x-layouts.app>
 <style>
.card3 {
      margin: 20px;
      padding: 20px;
      width: 250px;
      min-height: 200px;
      display: grid;
      grid-template-rows: 20px 50px 1fr 50px;
      border-radius: 10px;
      box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
      transition: all 0
    }
    
.card3:hover {
      box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
      transform: scale(1.01);
    }
    
.card__link,
.card__exit,
.card__icon {
      position: relative;
      text-decoration: none;
      color: rgba(255, 255, 255, 0.9);
    }
    
.card__link::after {
      position: absolute;
      top: 25px;
      left: 0;
      content: "";
      width: 0%;
      height: 3px;
      background-color: rgba(255, 255, 255, 0.6);
      transition: all 0.5s;
    }
    
.card__link:hover::after {
      width: 100%;
    }
    
.card__exit {
      grid-row: 1/2;
      justify-self: end;
    }
    
.card__icon {
      grid-row: 2/3;
      font-size: 30px;
    }
    
.card__title {
      grid-row: 3/4;
      font-weight: 400;
      color: #ffffff;
    }
    
    .card__apply {
      grid-row: 4/5;
      margin-top: 3em;
      align-self: center;
    }
    
    /* CARD BACKGROUNDS */
    
    .card-1 {
      background: radial-gradient(#9abbe7, rgb(82, 119, 229));
    }
    
     
    </style>
    <div class="container">
        <div class="row">
            <div class="col text-center" style="margin: 2em">
                Search results
            </div>
        </div>
        <div class="row">
            <h5>Communities</h5>
            @foreach ($communities as $item)
            <div class="col-3" style="padding: 10px;">
                {{-- <a href="/community/{{ $item->slug}}" style="text-decoration: none;">
                    <div class="card shadow-sm">
                        <div class="card-body">
                        <h5 class="card-title">{{ $item->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$item->parentCommunity->name}}</h6>
                        <p class="card-text">{{$item->description}}</p>

                        @if ($item->profile_id)
                        <form method="POST" action="/community/unsubscribeS">
                            @csrf
                            <input type="hidden" name="community_id" value="{{$item->id}}">
                            <input type="hidden" name="search" value="{{$search}}">
                            <button type="submit" class="btn btn-primary">Unsubscribe</button>
                        </form>
                        @else
                        <form method="POST" action="/community/subscribeS">
                            @csrf
                            <input type="hidden" name="community_id" value="{{$item->id}}">
                            <input type="hidden" name="search" value="{{$search}}">
                            <button type="submit" class="btn btn-success">Subscribe</button>
                        </form>
                        @endif
                        </div>
                    </div>
                </a> --}}
                <div class="card3 card-1">
                    <div class="card__icon"><i class="fas fa-hashtag"></i> 
                    {{-- <p class="card__exit"><i class="fas fa-times"></i>< --}}
                    <h2 class="card__title"> {{$item->name}}</h2>
                   </div>
                    
                    <p class="card__apply">
                        
                      <a class="card__link" href="/community/{{$item->slug}}">Visit <i class="fas fa-arrow-right"></i></a>
                    </p>
                  </div>
            </div>
            @endforeach
        </div>
</div>
</x-layouts.app>
