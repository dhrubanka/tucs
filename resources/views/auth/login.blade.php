<x-layouts.app>
    <div class="container">
         
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center" style="background: royalblue;
                    color: whitesmoke;">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    id="exampleInputEmail1" value="{{ old('email') }}" aria-describedby="emailHelp"
                                    required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                    else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"  name="password"
                                required autocomplete="current-password">
                            </div>
                            {{-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div> --}}

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            <div class="mb-3">
                                <button type="submit" class="btn" style="background: royalblue;
                                color: whitesmoke;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
