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
                                            <li><a href="search-job.html">Search Job</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end col-3 -->
                                <div class="col-menu col-md-3">
                                    <h6 class="title">For Candidate</h6>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="{{ route('pages.projects') }}">Browse Projects</a></li>
                                            <li><a href="{{ route('pages.tasks') }}">Browse single tasks</a></li>
                                            <li><a href="new-job-detail.html">New Job Detail</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end col-3 -->
                                <div class="col-menu col-md-3">
                                    <h6 class="title">For Employer</h6>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="create-job.html">Create Job</a></li>
                                            <li><a href="manage-candidate.html">Browse Candidate</a></li>
                                            <li><a href="candidate-profile.html">Candidate Profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-menu col-md-3">
                                    <h6 class="title">Extra Pages <span class="new-offer">New</span></h6>
                                    <div class="content">
                                        <ul class="menu-col">
                                            <li><a href="payment-methode.html">Payment Methode</a></li>
                                            <li><a href="new-login-signup.html">New LogIn / SignUp</a></li>
                                            <li><a href="popular-jobs.html">Popular Jobs</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end col-3 -->
                            </div><!-- end row -->
                        </li>
                    </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="login.html"><i class="fa fa-pencil" aria-hidden="true"></i>SignUp</a></li>
                <li><a href="pricing.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Pricing</a></li>
                <li class="left-br"><a href="javascript:void(0)" data-toggle="modal" data-target="#signup" class="signin">Sign In Now</a></li>
            </ul>
        </div>
    </div>
</nav>
