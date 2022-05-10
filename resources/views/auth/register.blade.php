<x-layouts.app>
    <div class="container">
    <div class="row card shadow" style="margin: 2em; ">
        <h2 class="card-header"> Register</h2>
        <form class="row g-3 card-body" method="POST" action="{{ route('register') }}">
        @csrf
            <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                @error('firstName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                @error('lastName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-md-6">
                <label class="form-label" for="username">Username</label>
                <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input id="username" placeholder="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autofocus>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                    <div class="col-md-8">
                        <div class="form-check form-check-inline">
                            <input id="male" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="M" required autofocus>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input id="female" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="F" required autofocus>
                            <label class="form-check-label" for="female">Female</label>
                        </div>

                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-md-6">
                <label class="form-label" for="role">Choose Your Role</label>
                <select class="form-select" id="role"name="role" class="form-select @error('role') is-invalid @enderror" required autofocus>
                    <option value="1">Student</option>
                    <option value="2">Alumni</option>
                    <option value="3">Professor</option>
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


            </div>
            <div class="col-12">
                <label for="currentAddress" class="form-label">Current Address</label>
                <input id="currentAddress"  placeholder="1234 Main St" type="text" class="form-control @error('currentAddress') is-invalid @enderror" name="currentAddress" value="{{ old('currentAddress') }}" required autocomplete="currentAddress" autofocus>
                @error('currentAddress')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-12">
                <label for="permanentAddress" class="form-label">Permanent Address</label>
                <input id="permanentAddress"  placeholder="1234 Main St" type="text" class="form-control @error('permanentAddress') is-invalid @enderror" name="permanentAddress" value="{{ old('permanentAddress') }}" required autocomplete="permanentAddress" autofocus>
                @error('permanentAddress')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>
                @error('state')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>

            <div class="col-md-2">
                <label for="zip" class="form-label">Zip</label>
                <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" required autocomplete="zip" autofocus>
                @error('zip')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
    </div>
    </div>
</x-layouts.app>
