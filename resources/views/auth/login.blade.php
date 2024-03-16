@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 90vh">
        <div class="col-md-8 col-lg-5">
            <div class="card py-4" style="border-radius:10px;">
                <div class="text-center fw-bold fs-2 my-2">{{ __('LOGIN') }}</div>
                @if(session('error'))
                    <div class="d-flex justify-content-center align-items-center mb-2" >
                        <div id ="alert-message" class="col-10 alert alert-danger mt-4 mb-0 alert-dismissible">
                            {{ session('error') }}
                            <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
                        </div>
                    </div>
                @endif
                <div class="card-body col-12 m-0">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-12 mb-4">
                            <span>
                                <input id="loginemail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus style="height: 50px;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                        </div>

                        <div class="col-12 mb-4">
                            <span>
                                <input id="loginpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password" style="height: 50px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                        </div>

                        <div class="d-flex justify-content-evenly align-items-center mb-4">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                              <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                            @endif
                        </div>

                        <div class="col-12 mb-0">
                            <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                <button type="submit" class="col-11 col-md-8 btn btn-primary text-center">
                                    {{ __('LOGIN') }}
                                </button>
                            </div>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>

                        <div class="col-12 d-flex flex-column justify-content-center align-items-center gap-2">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <a href="{{route('githublogin')}}" class="col-11 col-md-8 btn btn-dark">
                                    <i style="font-size:24px" class="fa">&#xf09b;</i> Login with GitHub
                                </a>
                            </div>
                            <div class="col-12 col-12 d-flex justify-content-center align-items-center">
                                <a href="{{route('googlelogin')}}" class="col-11 col-md-8 btn btn-outline-danger">
                                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Google_%22G%22_logo.svg/1024px-Google_%22G%22_logo.svg.png" />
                                    Login with Google
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
