@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-key font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ ucfirst(config('multiauth.prefix')) }} Change Your Password</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="POST" action="{{ route('admin.password.change') }}" aria-label="{{ __('Admin Change Password') }}">
                        @csrf
                        <div class="form-body">
                        <div class="form-group">
                            <label >{{ __('Old Password') }}</label>
                                <input id="oldPassword" type="password" class="form-control spinner{{ $errors->has('oldPassword') ? ' is-invalid' : '' }}" name="oldPassword" value="{{ $oldPassword ?? old('oldPassword') }}"
                                    required autofocus> @if ($errors->has('oldPassword'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('oldPassword') }}</strong>
                                    </span> @endif
                            </div>
                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control spinner{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required> @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        <div class="form-group">
                            <label>{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control spinner" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-actions text-center">
                                <button type="submit" class="btn green">
                                    {{ __('Change Password') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
