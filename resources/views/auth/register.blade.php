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
<body class="page-ath">
<div class="page-ath-wrap">
    <div class="page-ath-content">
        <div class="page-ath-form">
            <h2 class="page-ath-heading">Register <small>with TokenWiz</small></h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-item">
                    <label for="name" class=" col-form-label text-md-right">Name:</label>
                    @if(isset($_REQUEST['id']))
                        <input type="hidden" name="referer" value="{{ $_REQUEST['id'] }}">
                    @endif
                    <input id="name" type="text" class="form-control input-bordered @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-item">
                    <label for="email" class=" col-form-label text-md-right">Email Address:</label>
                    <input id="email" type="email" class="form-control input-bordered @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-item">
                    <label for="password" class=" col-form-label text-md-right">Password:</label>
                    <input id="password" type="password" class="form-control input-bordered @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-item">
                    <label for="password-confirm" class=" col-form-label text-md-right">Confirm Password:</label>
                    <input id="password-confirm" type="password" class="form-control input-bordered @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="input-item text-left">
                        <input class="input-checkbox input-checkbox-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary btn-block"> Register </button>

            </form>

            <div class="gaps-2x"></div>
            <div class="gaps-2x"></div>
        </div>
        <div class="page-ath-footer">
            <ul class="footer-links">
                <li><a href="regular-page.html">Privacy Policy</a></li>
                <li><a href="regular-page.html">Terms</a></li>
                <li>&copy; 2018 TokenWiz.</li>
            </ul>
        </div>
    </div>
    <div class="page-ath-gfx">
        <div class="w-100 d-flex justify-content-center">
            <div class="col-md-8 col-xl-5"><img src="{{ asset('user/images/ath-gfx.png') }}" alt="image"></div>
        </div>
    </div>
</div>
<!-- JavaScript (include all script here) -->
<script src="{{ asset('user/assets/js/jquery.bundle49f7.js') }}"></script>
<script src="{{ asset('user/assets/js/script49f7.js') }}"></script>
</body>
</html>





@endsection
