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
            <div class="col-3">

                <div class="card" >
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->name}}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{$item->parentCommunity->name}}</h6>
                      <p class="card-text">{{$item->description}}</p>

                      @if ($item->profile_id)
                      <a href="#" class="card-link">Unsubscribe</a>
                      @else
                      <a href="#" class="card-link">Subscribe</a>
                      @endif


                    </div>
                  </div>

            </div>
            @endforeach
        </div>


    </div>

</x-layouts.app>
