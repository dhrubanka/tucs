<x-layouts.app>
  <div class="container-fluid h-custom p-4">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
              class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form3Example3"  value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                    placeholder="Enter a valid email address" />
                    <label class="form-label" for="form3Example3">Email address</label>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
    
              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg @error('password') is-invalid @enderror"
                  placeholder="Enter password" name="password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>
    
              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
                </div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
              </div>
    
              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn" style="background: royalblue;
                color: whitesmoke;">
                    {{ __('Login') }}
                </button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                    class="link-danger">Register</a></p>
              </div>
    
            </form>
          </div>
        </div>
     
</x-layouts.app>
