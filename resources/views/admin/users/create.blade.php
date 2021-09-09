<x-layouts.admin>
    <div class="container-xl">
        <div class="row">
            <div class="col-sm-12" style="padding: 1rem;">
                <h2>Create <b>User</b></h2>
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
        <form method="POST" action="{{ route('users-store') }}">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputName4">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputName4"
                        placeholder="Name">

                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control "
                        id="inputEmail4" placeholder="Email">

                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4"
                        placeholder="Password">

                </div>


                <div class="form-group col-md-12">
                    <label for="inputRole">Role</label>
                    <select id="inputRole" name="role" id="role" class="form-control ">
                        <option selected value="">Choose Role of the User</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach

                    </select>

                </div>

            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 1rem">Create</button>
        </form>

    </div>

</x-layouts.admin>
