<nav class="navbar navbar-default navbar-fixed navbar-light white bootsnav">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i class="fa fa-bars"></i></button>
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" class="logo logo-scrolled" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-left" data-in="fadeInDown" data-out="fadeOutUp">
                <li class="active">
                    <input type="text" class="form-control" placeholder="Find Freelancer">
                </li>
                <li class="dropdown megamenu-fw"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Brows</a>
                    <ul class="dropdown-menu megamenu-content" role="menu">
                        <li>
                            <div class="row">
                                <div class="col-menu col-md-3">
                                    <h6 class="title">Main Pages</h6>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('pages.home') }}">Home</a></li>
                                            <li><a href="freelancing.html">How it Works</a></li>
                                            <li><a href="search-job.html">About Us</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end col-3 -->
                                <div class="col-menu col-md-3">
                                    <h6 class="title">For Working</h6>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('pages.projects') }}">Browse Projects</a></li>
                                            <li><a href="new-job-detail.html">New Job Detail</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end col-3 -->
                                <div class="col-menu col-md-3">
                                    <h6 class="title">For Learning</h6>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('pages.trainings') }}">Get Training</a></li>
                                            <li><a href="{{ route('pages.tutorials') }}">Free Tutorials</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-menu col-md-3">
                                    <h6 class="title">Extra Pages <span class="new-offer">New</span></h6>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="payment-methode.html">Payment Method</a></li>
                                            <li><a href="new-login-signup.html">New LogIn / SignUp</a></li>
                                            <li><a href="new-login-signup.html">FAQs</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end col-3 -->
                            </div><!-- end row -->
                        </li>
                    </ul>
                </li>
{{--                <li><a href="blog.html">Blog</a></li>--}}
            </ul>
            @guest
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="{{ route('register') }}"><i class="fa fa-pencil" aria-hidden="true"></i>Register</a></li>
                    <li><a href="pricing.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Pricing</a></li>
                    <li class="left-br"><a href="{{ route('login') }}"class="signin">Sign In Now</a></li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="{{ route('pages.pricing') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Pricing</a></li>
                    <li class="left-br dropdown my-megamenu"><a href="{{ route('user.profile') }}"class="signin dropdown-toggle" data-toggle="dropdown"> {{ auth()->user()->name }} </a>
                        <ul class="dropdown-menu megamenu-user" role="menu">
                            <li>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('user.dashboard') }}"><i class="ti ti-id-badge"></i> Dashboard</a></li>
                                            <li><a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    <i class="ti ti-power-off"></i> {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
