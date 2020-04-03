@extends("user.n-layouts.master")
@section("content")
    <style>
        .form-wrap + * {
            margin-top: 10px;
        }
    </style>
<div class="login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5 offset-md-8">
                <h3 class="page-ath-heading text-uppercase">Login</h3>
                <p>Enter your information Below.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-wrap">
                        <input type="email" class="form-input form-control-has-validation form-control-last-child @error('email') is-invalid @enderror" name="email"
                               value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="Enter Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-wrap">
                        <input type="password" class="form-input form-control-has-validation form-control-last-child @error('password') is-invalid @enderror" name="password"
                               required autocomplete="current-password" placeholder="Enter Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center pt-2">
                            <label class="checkbox-inline checkbox_info">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="checkbox-custom"><span class="checkbox-custom-dummy"></span>{{ __('Remember Me') }}
                            </label>
                            @if (Route::has('password.request'))
                                <a class="text-success" href="{{ route('password.request') }}">Forgot password?</a>
                            @endif
                    </div>
                    <button type="submit" class="button button-lg button-primary-outline button-anorak mb-2" style="width: 100%;margin-top: 10px"> Login</button>
                </form>
                <div class="form-note text-center">Don’t Have an Account Yet?
                    <a href="{{ route('register') }}"> <strong class="text-success">Signup</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
