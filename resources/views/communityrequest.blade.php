<x-layouts.app>
    <div class="container card" style="padding: 1em; width: 70%">

        <div class="row">
            <div class="text-center">
                <h2>Request a <b>Community</b></h2>
            </div>

        </div>
<hr>
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
    <form method="POST" action="/community-request/store">
        @csrf

        <div class="form-row">
            <div class="mb-3">
                <label for="inputName4">Community Name</label>
                <input type="text" name="name" class="form-control"  value="{{ old('name') }}" id="inputName4" placeholder="Name">

            </div>
        </div>
              <div class="mb-3">
                <label for="description" class="col-form-label">Community Description</label>
                 
                <textarea name="description" class="form-control " id="description" rows="5">
                </textarea>
               
            </div>

        <div class="row">
            <div class="text-center">
                <button type="submit" class="btn btn-primary text-white">Request</button>
            </div>
        </div>

    </form>

</div>
</div>
</div>
</x-layouts.app>