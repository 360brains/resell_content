@extends("user.n-layouts.master")
@section("content")
    <style>.form-wrap + * {
            margin-top: 10px;
        }
    </style>
<div class="login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5 offset-md-8">
                <h3 class="page-ath-heading text-uppercase">Signup</h3>
                <p>Enter your information below to create a free account.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="referer" value="{{ app('request')->input('id') }}">

                    <div class="form-wrap">
                        <input type="text" placeholder="Enter Name" class="form-input form-control-has-validation form-control-last-child @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-wrap">
                        <input type="email" placeholder="Email Address" class="form-input form-control-has-validation form-control-last-child @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-wrap ">
                        <input type="password" placeholder="Password" class="form-input form-control-has-validation form-control-last-child @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-wrap ">
                        <input  type="password" placeholder="Confirm Password" class="form-input form-control-has-validation form-control-last-child @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center ">
                        <div class="input-item text-left">
                            <label class="checkbox-inline checkbox_info">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="checkbox-custom"><span class="checkbox-custom-dummy"></span>{{ __('Remember Me') }}
                            </label>
                        </div>

                    </div>
                    <button type="submit" class="button button-lg button-primary-outline button-anorak mb-2" style="width: 100%;margin-top: 10px"> Signup </button>
                </form>
                <div class="form-note text-center">Already Have an Account?
                    <a href="{{ route('login') }}"> <strong class="text-success">Login Here </strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
