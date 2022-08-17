<x-layouts.app>
    {{-- {{$user}}
    {{$user->profile}} --}}
    {{$user->getRoleNames()[0] == "student"}}
    <div class="container">
        <div class="row card shadow" style="margin: 2em; ">
            <h2 class="card-header" style="background: royalblue;
            color: whitesmoke;"> Profile Update</h2>
            <form class="row g-3 card-body" method="POST" action="/profile/update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
                <label for="formFile" class="form-label">Update Profile Pic</label>
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
           
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $user->profile->firstName }}" required autocomplete="firstName" autofocus>
                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $user->profile->lastName }}" required autocomplete="lastName" autofocus>
                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
                {{-- <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email  }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div> --}}
                <div class="col-md-6">
                    <label class="form-label" for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input id="username" placeholder="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Update Password</label>
                    <input id="password" placeholder="To update password enter new password here" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value=""  autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
         
    
                <div class="col-md-6">
                    <div class="row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                        <div class="col-md-8">
                            <div class="form-check form-check-inline">
                                <input id="male" type="radio" class="form-check-input @error('gender') is-invalid @enderror" @if($user->profile->gender=="M")checked @endif name="gender" value="M" required autofocus>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="female" type="radio" class="form-check-input @error('gender') is-invalid @enderror" @if($user->profile->gender=="F")checked @endif name="gender" value="F" required autofocus>
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
                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ $user->profile->dob }}" required autocomplete="dob" autofocus>
    
                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
    
    
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->profile->phone  }}" required autocomplete="phone" autofocus>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="role">Choose Your Role</label>
                    <select class="form-select" id="role"name="role" class="form-select @error('role') is-invalid @enderror" required autofocus>
                        <option selected value="" >Select</option>
                        <option value="5" @if($user->getRoleNames()[0] == "student")selected @endIf>Student</option>
                        <option value="3" @if($user->getRoleNames()[0] == "alumni")selected @endIf>Alumni</option>
                        <option value="4" @if($user->getRoleNames()[0] == "professor") selected @endIf>Professor</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
    
    
                </div>
                <div class="col-12">
                    <label for="currentAddress" class="form-label">Current Address</label>
                    <input id="currentAddress"  placeholder="1234 Main St" type="text" class="form-control @error('currentAddress') is-invalid @enderror" name="currentAddress" value="{{ $user->profile->currentAddress }}" required autocomplete="currentAddress" autofocus>
                    @error('currentAddress')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
                <div class="col-12">
                    <label for="permanentAddress" class="form-label">Permanent Address</label>
                    <input id="permanentAddress"  placeholder="1234 Main St" type="text" class="form-control @error('permanentAddress') is-invalid @enderror" name="permanentAddress" value="{{ $user->profile->permanentAddress }}" required autocomplete="permanentAddress" autofocus>
                    @error('permanentAddress')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
                <div class="col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->profile->city }}" required autocomplete="city" autofocus>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
                <div class="col-md-4">
                    <label for="state" class="form-label">State</label>
                    <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{$user->profile->state }}" required autocomplete="state" autofocus>
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
    
                <div class="col-md-2">
                    <label for="zip" class="form-label">Zip</label>
                    <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{$user->profile->zip }}" required autocomplete="zip" autofocus>
                    @error('zip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
    
                </div>
                
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn btn-success text-white">Update</button>
                </div>
            </form>
        </div>
        </div>
    {{-- <div class="container">
        <div class="card m-5">
            <div class="card-header text-center"><h2>1. User details </h2></div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" value="{{$user->username}}">
                      </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" value="">
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-success ">Update User Details</button>
                  </form>
            </div>
        </div>
        <div class="card m-5">
            <div class="card-header text-center"><h2>2. Profile details </h2></div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" value="{{$user->profile->firstName}}">
                      </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" value="{{$user->profile->lastName}}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}">
                      
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" value="">
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-success ">Update User Details</button>
                  </form>
            </div>
        </div>
    </div> --}}
</x-layouts.app>