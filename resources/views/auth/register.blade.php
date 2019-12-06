@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fully featured and complete ICO Dashboard template for ICO backend management.">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('user/images/favicon.png') }}">
    <!-- Site Title  -->
    <title>TokenWiz - ICO User Dashboard Admin Template</title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/vendor.bundle49f7.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/style49f7.css') }}" id="layoutstyle">
</head>

<body>
<div class="login-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 pt-5 offset-md-8">
                <h2 class="page-ath-heading">Signup</h2>
                <p>Enter your information below to create a free account.</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-item">
                        <input type="text" placeholder="Enter Name" class="form-control input-bordered @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="input-item pt-2">
                        <input type="email" placeholder="Email Address" class="form-control input-bordered @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="input-item  pt-2">
                        <input type="password" placeholder="Password" class="form-control input-bordered @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="input-item  pt-2">
                        <input  type="password" placeholder="Confirm Password" class="form-control input-bordered @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-2 ">
                        <div class="input-item text-left">
                            <input class="input-checkbox input-checkbox-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-success btn-block mt-2 mb-2"> Signup </button>
                </form>
                <div class="form-note text-center">Already Have an Account?
                    <a href="{{ route('login') }}"> <strong class="text-success">Login Here </strong></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript (include all script here) -->
<script src="{{ asset('user/assets/js/jquery.bundle49f7.js') }}"></script>
<script src="{{ asset('user/assets/js/script49f7.js') }}"></script>
</body>
</html>
@endsection
