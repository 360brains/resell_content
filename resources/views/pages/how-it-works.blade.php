@extends("user.n-layouts.master")
@section("content")
    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url({{ asset('front/images/bg-image-9.jpg') }});">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">How It Work</h3>
            </div>
        </div>
        <div class="breadcrumbs-custom-aside">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li class="active">How It Work</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section section-md bg-gray-100">
        <div class="container">
            <div class="row row-30">
                <div class="col-lg-6 height-fill">
                    <figure class="figure-responsive"><img src="{{ asset('front/images/about-us-1-573x368.jpg') }}" alt="">
                    </figure>
                </div>
                <div class="col-lg-6 height-fill">
                    <article class="box-info-2">
                        <h3>How Resell Content Work</h3>
                        <p class="text-color-default">We are the leading job search portal on the Web.</p>
                        <ul class="list-marked-2">
                            <li>Register Free Account</li>
                            <li>Give Free Test</li>
                            <li>Get Desired Tasks</li>
                            <li>Start Work</li>
                            <li>Get Paid after Evaluation</li>
                            <li>Browse new Jobs</li>
                        </ul>
                    </article>
                </div>
            </div>
            <div class="row row-30 list-progress">
                <div class="col-sm-6 col-md-12 col-xl-3 height-fill align-items-center">
                    <article class="box-info-3">
                        <h3 class="box-info-3-title"><span class="box-info-3-title-text">How <br class="d-none d-sm-block d-md-none d-xl-block"> It Works</span><span class="box-info-3-title-divider"></span></h3>
                        <p>Get a digital tour of how Resell Content works for you.</p>
                    </article>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="lp-item">
                        <div class="lp-item-header">
                            <div class="icon lp-item-icon lp-item-icon-sm mercury-icon-user"></div>
                            <div class="lp-item-counter"></div>
                        </div>
                        <h6 class="lp-item-title">Register Free Account</h6>
                        <p>Sign Up to register account and start getting new jobs and get paid after evaluation.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="lp-item">
                        <div class="lp-item-header">
                            <div class="icon lp-item-icon lp-item-icon-sm mercury-icon-note"></div>
                            <div class="lp-item-counter"></div>
                        </div>
                        <h6 class="lp-item-title">Give Free Test </h6>
                        <p>After register your account. Give test and find jobs according as you desire</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="lp-item">
                        <div class="lp-item-header">
                            <div class="icon lp-item-icon lp-item-icon-sm thin-icon-email-search"></div>
                            <div class="lp-item-counter"></div>
                        </div>
                        <h6 class="lp-item-title">Browse new Jobs </h6>
                        <p>After pass the test. Browse different jobs and start doing the tasks. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="lp-item">
                        <div class="lp-item-header">
                            <div class="icon lp-item-icon lp-item-icon-sm mercury-icon-target-2"></div>
                            <div class="lp-item-counter"></div>
                        </div>
                        <h6 class="lp-item-title">Get Desired Tasks </h6>
                        <p>After Browse new jobs. Get Task according to your desire and skill level</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="lp-item">
                        <div class="lp-item-header">
                            <div class="icon lp-item-icon lp-item-icon-sm mercury-icon-time-sand"></div>
                            <div class="lp-item-counter"></div>
                        </div>
                        <h6 class="lp-item-title">Start Work</h6>
                        <p>After desired task. Start the work and do as well as you can. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="lp-item">
                        <div class="lp-item-header">
                            <div class="icon lp-item-icon lp-item-icon-sm mercury-icon-money-2"></div>
                            <div class="lp-item-counter"></div>
                        </div>
                        <h6 class="lp-item-title">Get Paid after Evaluation </h6>
                        <p>After start work. Complete tasks and get paid after evaluation. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="lp-item">
                        <div class="lp-item-header">
                            <div class="icon lp-item-icon lp-item-icon-sm mercury-icon-touch"></div>
                            <div class="lp-item-counter"></div>
                        </div>
                        <h6 class="lp-item-title">Click to start job Now</h6>
                            <a class="button button-sm button-primary-outline button-anorak st-btn" href="{{ route('pages.projects') }}">Start Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
