@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 90vh">
        <div class="col-md-8 col-lg-5">
            <div class="card py-4" style="border-radius:10px;">
                <div class="text-center fw-bold fs-2 my-2">{{ __('SIGN UP') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-12 mb-4">
                            <span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus style="height: 50px;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                        </div>

                        <div class="col-12 mb-4">
                            <span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email" style="height: 50px;">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                        </div>

                        <div class="col-12 mb-4">
                            <span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"placeholder="{{ __('Password') }}" value="{{ old('name') }}" required autocomplete="new-password" style="height: 50px;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </span>
                        </div>

                        <div class="col-12 mb-4">
                            <span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" style="height: 50px;">
                                </span>
                        </div>

                        <div class="col-12 mb-0">
                            <div class="col-12 d-flex flex-row justify-content-center align-items-center">
                                <button type="submit" class="col-11 col-md-8 btn btn-primary text-center">
                                    {{ __('SIGN UP') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
