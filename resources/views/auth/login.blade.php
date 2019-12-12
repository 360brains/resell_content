@extends('layouts.app')

@section('content')

<div class="login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5 offset-md-8">
                <h2 class="page-ath-heading">Login</h2>
                <p>Enter your information below to create a free account.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-item">
                        <input type="email"
                               class="form-control input-bordered @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="Enter Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="input-item pt-2">
                        <input type="password"
                               class="form-control input-bordered @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password" placeholder="Enter Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2">
                        <div class="input-item text-left">
                            <input class="input-checkbox input-checkbox-md" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <div>
                            @if (Route::has('password.request'))
                                <a class="text-success" href="{{ route('password.request') }}">Forgot password?</a>
                            @endif
                        </div>

                    </div>
                    <button type="submit" class="btn btn-success btn-block mt-2 mb-2"> Login</button>
                </form>
                <div class="form-note text-center">Don’t Have an Account Yet?
                    <a href="{{ route('register') }}"> <strong class="text-success">Signup</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
