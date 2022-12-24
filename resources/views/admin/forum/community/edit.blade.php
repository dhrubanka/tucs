<x-layouts.admin>
    <div class="container-xl">
        <div class="row">
            <div class="col-sm-12" style="padding: 1rem;">
                <h2>Edit Community</h2>
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
        <form method="POST" action="/community/{{$community->id}}/update">
            @csrf
            <div class="form-group row">
                <label for="parentId" class="col-md-3 col-form-label text-md-right">{{ __('Parent Community') }}</label>
                <div class="col-md-9">
                    <div class="form-group">
                        <select name="parentId" class="form-select" required autofocus>
                            <option selected>Select Parent Community</option>
                            @foreach ($parentCommunities as $parentCommunity)
                                <option value="{{$parentCommunity->id}}">{{$parentCommunity->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <label for="communityTitle" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="communityTitle" id="communityTitle" value="{{$community->name}}" class="form-control" placeholder="TITLE" required autofocus>
                    @error('communityTitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="slug" class="col-md-3 col-form-label text-md-right">{{ __('Slug') }}</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" name="slug" id="slug" value="{{$community->slug}}" class="form-control" placeholder="SLUG" required autofocus>
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="communityDesc" class="col-md-3 col-form-label text-md-right">{{ __('Description') }}</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="communityDesc" id="communityDesc" placeholder="Description" rows="3"> {{$community->description}}</textarea>
                    @error('communityDesc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-warning" href="/community">Back</a>

        </form>

    </div>


</x-layouts.admin>
