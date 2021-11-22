<x-layouts.app>
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

                <div class="card shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->name}}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{$item->parentCommunity->name}}</h6>
                      <p class="card-text">{{$item->description}}</p>

                      @if ($item->profile_id)
                      <form method="POST" action="/community/unsubscribe">
                        @csrf
                        <input type="hidden" name="community_id" value="{{$item->id}}">
                        <input type="hidden" name="search" value="{{$search}}">
                        <button type="submit" class="btn btn-primary">Unsubscribe</button>
                      </form>
                      @else
                      <form method="POST" action="/community/subscribe">
                        @csrf
                        <input type="hidden" name="community_id" value="{{$item->id}}">
                        <input type="hidden" name="search" value="{{$search}}">
                        <button type="submit" class="btn btn-success">Subscribe</button>
                      </form>
                      @endif


                    </div>
                  </div>

            </div>
            @endforeach
        </div>


    </div>

</x-layouts.app>
