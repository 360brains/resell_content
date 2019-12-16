@extends("layouts.master")

@section("content")
    <div class="browse-img" style="background-image:url({{ asset('assets/img/browse-projects.jpg') }});">
        <h1>How It Works</h1>
    </div>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="main-heading">
                <h5>How It Work</h5>
                <h2>Our Work <span>Process</span></h2></div>
            <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-presentation"></span></div>
                    <div class="work-process-caption">
                        <h4>Take Free Test</h4>
                        <p>Pass An Easy Test Of Type You Would Like To Take For Free And Gain Level 1</p>
                    </div>
                </div>
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-search"></span></div>
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
            <div class="col-md-4 hidden-sm text-center"><a href="{{ route('login') }}"><img src="{{ asset('assets/img/how-it-works.png') }}" class="img-responsive" alt="" /></a></div>
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
        </div>
    </section>
@endsection
