@extends("layouts.master")

@section("content")

    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <h1>How It Works</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->
    <section class="wp-process home-three">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>How It Work</p>
                    <h2>Our Work <span>Process</span></h2></div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-presentation"></span></div>
                    <div class="work-process-caption">
                        <h4>Take Free Test</h4>
                        <p>Pass An Easy Test Of Type You Would Like To Take For Free And Gain Level 1</p>
                    </div>
                </div>
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-search"></span></span></div>
                    <div class="work-process-caption">
                        <h4>Browse Projects</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                    <div class="work-process">
                        <div class="work-process-icon"><span class="icon-mobile"></span></div>
                        <div class="work-process-caption">
                            <h4>Get Task</h4>
                            <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm"><a href="{{ route('login') }}"><img src="assets/img/wp-iphone.png" class="img-responsive" alt="" /></a></div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-layers"></span></div>
                    <div class="work-process-caption">
                        <h4>Start Work</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-wallet"></span></div>
                    <div class="work-process-caption">
                        <h4>Get Paid</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-happy"></span></div>
                    <div class="work-process-caption">
                        <h4>Happy</h4>
                        <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
