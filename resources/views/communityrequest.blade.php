<x-layouts.app>
    <div class="container card" style="padding: 1em">

        <div class="row">
            <div class="col-sm-12">
                <h2>Request a<b>Community</b></h2>
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
    <form method="POST" action="">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputName4">Category Name</label>
                <input type="text" name="name" class="form-control"  value="{{ old('name') }}" id="inputName4" placeholder="Name">

            </div>
        </div>
            <div class="form-group row">
                <label for="description" class="col-md-2 col-form-label">Category Description</label>
                <div class="col-md-10">
                <textarea name="description" class="form-control " id="description" rows="5">
                </textarea>
                </div>
            </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>

    </form>

</div>
</div>
</div>
</x-layouts.app>