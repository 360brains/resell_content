<div class="page">
    <!-- Page Header-->
    <header class="section page-header jumbotron-creative context-dark">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-main-outer">
                    <div class="rd-navbar-main">
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel">
                            <!-- RD Navbar Toggle-->
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <!-- RD Navbar Brand-->
                            <div class="rd-navbar-brand"><a class="brand" href="{{ route('pages.home') }}"><img class="brand-logo-dark" src="{{ asset('user/images/logo.png') }}" alt="" srcset="{{ asset('user/images/logo.png') }} 2x"/><img class="brand-logo-light" src="{{ asset('user/images/logo.png') }}" alt="" srcset="{{ asset('user/images/logo.png') }} 2x"/></a>
                            </div>
                        </div>
                        <div class="rd-navbar-main-element">
                            <div class="rd-navbar-nav-wrap">
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item {{strpos((request()->path()),"projects") == 'true' ? 'active' : ''}}">
                                        <a class="rd-nav-link"
                                           href="{{ route('pages.projects') }}">Browse Jobs</a>
                                    </li>
                                    <li class="rd-nav-item {{strpos((request()->path()),"howItWorks") == 'true' ? 'active' : ''}}">
                                        <a class="rd-nav-link "
                                           href="{{ route('pages.howItWorks') }}">How it works</a>
                                    </li>
                                    <li class="rd-nav-item {{strpos((request()->path()),"about-us") == 'true' ? 'active' : ''}}">
                                        <a class="rd-nav-link"
                                           href="{{ route('pages.about') }}">About Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="rd-navbar-aside">
                            <div class="rd-navbar-aside-item">
                                <a class="button button-xs button-primary-outline button-icon button-icon-left button-anorak rd-navbar-popup-toggle" href="{{ route('register') }}">
                                    <span class="icon mdi mdi-account white-icon"></span>Sign Up</a>
                            </div>
                            @guest
                            <div class="rd-navbar-aside-item">
                                <a class="button button-xs button-primary button-icon button-icon-left button-anorak rd-navbar-popup-toggle" href="{{ route('login') }}">
                                    <span class="icon mdi mdi-import white-icon"></span>Login</a>
                            </div>
                            @else
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>
        </div>

