<x-layouts.admin>
    <div class="container-xl">
        <div class="row">
            <div class="col-sm-12" style="padding: 1rem;">
                <h2>Create Event</h2>
            </div>

        </div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form method="POST" action="/event/{{$event->id}}/update">
            @csrf
            {{-- <div class="form-group row">
                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="col-md-9">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}
                {{-- <button type="submit" class="btn btn-primary">Add</button>
        </form> --}}

        {{-- <form method="POST" action="/event/store">
            @csrf --}}
            <div class="form-group row">
                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="col-md-9">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$event->title}}" required autocomplete="title">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="description" id="description" placeholder="Description" rows="3">{{$event->description}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="start_date_time" class="col-md-3 col-form-label text-md-right">{{ __('Start Date') }}</label>
                <div class="col-md-9">
                    <input id="start_date_time" type="datetime-local" class="form-control @error('start_date_time') is-invalid @enderror" name="start_date_time" value="{{$event->start_date_time}}" required autocomplete="start_date_time">
                    @error('start_date_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="end_date_time" class="col-md-3 col-form-label text-md-right">{{ __('End Date') }}</label>
                <div class="col-md-9">
                    <input id="end_date_time" type="datetime-local" class="form-control @error('end_date_time') is-invalid @enderror" name="end_date_time" value="{{$event->end_date_time}}" required autocomplete="end_date_time">
                    @error('end_date_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="organizer" class="col-md-3 col-form-label text-md-right">{{ __('Organizer') }}</label>
                <div class="col-md-9">
                    <input id="organizer" type="text" class="form-control @error('organizer') is-invalid @enderror" name="organizer" value="{{$event->organizer}}" required autocomplete="organizer">
                    @error('organizer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="mode" class="col-md-3 col-form-label text-md-right">{{ __('Mode') }}</label>
                <div class="col-md-6">
                    <div class="form-check form-check-inline">
                        <input id="online" type="radio" class="form-check-input @error('mode') is-invalid @enderror" name="mode" value="1" required autofocus onchange="linkShow()">
                        <label class="form-check-label" for="online">Online</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input id="offline" type="radio" class="form-check-input @error('mode') is-invalid @enderror" name="mode" value="0" required autofocus onchange="venueShow()">
                        <label class="form-check-label" for="offline">Offline</label>
                    </div>

                    @error('mode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="venueLink" id="venueLinkLabel" class="col-md-3 col-form-label text-md-right" style="display: none;">{{ __('Venue') }}</label>
                <div class="col-md-9">
                    <input style="display: none;" id="venueLink" type="text" class="form-control @error('venueLink') is-invalid @enderror" name="venue" value="{{ old('venueLink') }}" required autocomplete="venueLink" value="">
                    @error('venueLink')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-warning" href="/event/list">Back</a>

        </form>

    </div>
    <script>
        function linkShow(){
            document.getElementById('venueLinkLabel').style.display = "block";
            document.getElementById('venueLink').style.display = "block";
            document.getElementById('venueLink').setAttribute('name', 'link');
            document.getElementById('venueLinkLabel').innerHTML= 'Link';
        }

        function venueShow(){
            document.getElementById('venueLinkLabel').style.display = "block";
            document.getElementById('venueLink').style.display = "block";
            document.getElementById('venueLink').setAttribute('name', 'venue');
            document.getElementById('venueLinkLabel').innerHTML= 'Venue';
        }
    </script>


</x-layouts.admin>
