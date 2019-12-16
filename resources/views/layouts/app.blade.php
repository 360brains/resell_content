<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}" id="layoutstyle">
    <link rel="stylesheet" href="{{ asset('user/assets/css/style49f7.css') }}" id="layoutstyle">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-fixed-top navbar-expand-md navbar-light bg-white shadow-sm p-0">
            <div class="container">
                <a class="navbar-brand" href="{{ route('pages.home') }}">
                    great<span style="color: #07b107; font-weight: 700;">Content</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link hvrcenter
                        {{strpos((request()->path()),"projects") == 'true' ? 'nav-active' : ''}}"
                               href="{{ route('pages.projects') }}">Browser Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"#") == 'true' ? 'nav-active' : ''}}"
                               href="#">How it works</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"#") == 'true' ? 'nav-active' : ''}}"
                               href="#">About Us</a>
                        </li>

                    </ul>
                    @guest
                        <a href="{{ asset('login') }}">
                            <button class="btn btn-success ml-3">Log in</button>
                        </a>
                    @else
                    @endguest
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    @include("includes.footer")
    @include('includes.notifications')
    @include('includes.script')
</body>
</html>
