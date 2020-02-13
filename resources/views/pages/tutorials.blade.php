@extends("layouts.master")

@section("content")
    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url({{ asset('assets/img/banner-10.jpg') }});">
        <div class="container">
            <h1>Free Tutorials</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->
    <!-- Tab Section Start -->
    <section class="tab-sec">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="tab tool-tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" role="tab" data-toggle="tab"><i class="fa fa-file-video-o"></i> Video Making</a></li>
                        <li role="presentation"><a href="#Section2" role="tab" data-toggle="tab"><i class="fa fa-edit"></i>Content Writing</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs" id="home">

                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <h3>Learn How to write content.</h3>
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/H-Ru9dRpbnc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            <h3>Learn how to make a video.</h3>
                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/j685NaMDVYE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tab section End -->
    <div class="clearfix"></div>
    <!-- ========= start Call To Action section =========== -->
    <section class="call-to-act">
        <div class="container-fluid">
            <div class="col-md-12 col-sm-12 no-padd gr-dark">
                <div class="call-to-act-caption">
                    <h2>Not Good enough?</h2>
                    <h3>We have experts that can train you in your desired skill.</h3>
                    <a href="{{ route('pages.trainings') }}" class="btn bat-call-to-act">Hire Us</a>
                </div>
            </div>

        </div>
    </section>
    <!-- =========== Call To Action section End ============= -->


@endsection
