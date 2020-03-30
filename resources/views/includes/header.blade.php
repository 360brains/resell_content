<section>
    <div class="container">
        <div class="row">
            <div class="position-relative w-100">
                <div class="nav-top ">
                    <nav class="navbar  navbar-expand-lg navbar-light p-0 d-flex">
                        <a class="navbar-brand d-flex" href="{{ route('pages.home') }}">
                            <img src="{{ asset('user/images/logo.png') }}" alt="">
{{--                            <h3 class="pt-2 pl-2">Resell Content</h3>--}}
                        </a>
                        <div>
                            @guest
                                <a href="{{ asset('login') }}">
                                    <button class="btn btn-success mr-3 large-scn-btn">Log in</button>
                                </a>
                            @else
                            @endguest
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent1"
                                    aria-controls="navbarSupportedContent1" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link hvrcenter
                        {{strpos((request()->path()),"projects") == 'true' ? 'nav-active' : ''}}"
                                       href="{{ route('pages.projects') }}">Browse Jobs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"howItWorks") == 'true' ? 'nav-active' : ''}}"
                                       href="{{ route('pages.howItWorks') }}">How it works</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"about-us") == 'true' ? 'nav-active' : ''}}"
                                       href="{{ route('pages.about') }}">About Us</a>
                                </li>

                            </ul>
                            @guest
                                <a href="{{ asset('login') }}">
                                    <button class="btn btn-success ml-3 sm-scn-btn">Log in</button>
                                </a>
                            @else
                            @endguest
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
