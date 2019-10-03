@extends('multiauth::layouts.app')
@section('content')
    <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <div class="form-title">
            <span class="form-title">Welcome.</span>
            <span class="form-subtitle">Please login.</span>
        </div>
        <div class="form-group">
            <label for="email" class="control-label visible-ie8 visible-ie9">{{ __('E-Mail Address') }}</label>
            <input class="form-control form-control-solid placeholder-no-fix {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="off" placeholder="Enter your Email Address" required autofocus />
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="password" class="control-label visible-ie8 visible-ie9">{{ __('Password') }}</label>
            <input class="form-control form-control-solid placeholder-no-fix {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" autocomplete="off" placeholder="Password" name="password" required />
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn red btn-block uppercase">Login</button>
        </div>
        <div class="form-actions">
            <div class="pull-left">
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1" />Remember me </label>
            </div>
        </div>
    </form>

@endsection
