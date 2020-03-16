@extends("layouts.master")

@section("content")
    <div class="browse-img" style="background-image:url({{ asset('assets/img/browse-projects.jpg') }});">
        <h1>How It Works</h1>
    </div>
    <section class="pt-5 pb-5 how-it-works">
        <div class="container">
            <div class="main-heading">
                <h5>How It Work</h5>
                <h2>Our Work <span>Process</span></h2></div>
            <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-presentation"><img src="{{asset('assets/img/work-1.svg')}}" alt=""></span></div>
                    <div class="work-process-caption">
                        <h4>Sign Up:</h4>
                        <p>Register and join our free online writer's community</p>
                    </div>
                </div>
                <div class="work-process pt-4">
                    <div class="work-process-icon"><span class="icon-search"><img src="{{asset('assets/img/work-2.svg')}}" alt=""></span></div>
                    <div class="work-process-caption">
                        <h4>Pass a free test:</h4>
                        <p>Take an easy test free of cost and start working with great content</p>
                    </div>
                    <div class="work-process pt-4">
                        <div class="work-process-icon"><span class="icon-mobile"><img src="{{asset('assets/img/work-3.svg')}}" alt=""></span></div>
                        <div class="work-process-caption">
                            <h4>Browse Projects:</h4>
                            <p>Browse and claim writing jobs that match your interests, expertise and rate.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 hidden-sm text-center"><a href="{{ route('login') }}"><img src="{{ asset('assets/img/how-it-works.png') }}" class="works-banner" alt="" /></a></div>
            <div class="col-md-4 col-sm-6">
                <div class="work-process">
                    <div class="work-process-icon"><span class="icon-layers"><img src="{{asset('assets/img/work-4.svg')}}" alt=""></span></div>
                    <div class="work-process-caption">
                        <h4>Get tasks:</h4>
                        <p>Get a job with just a single click</p>
                    </div>
                </div>
                <div class="work-process pt-4">
                    <div class="work-process-icon"><span class="icon-wallet"><img src="{{asset('assets/img/work-5.svg')}}" alt=""></span></div>
                    <div class="work-process-caption">
                        <h4>Start work:</h4>
                        <p>Submit original content for editor review, and without waiting for the response, you can start a new task</p>
                    </div>
                </div>
                <div class="work-process pt-4">
                    <div class="work-process-icon"><span class="icon-happy"><img src="{{asset('assets/img/work-6.svg')}}" alt=""></span></div>
                    <div class="work-process-caption">
                        <h4>Get paid:</h4>
                        <p>Timely payments and rewards for your hard work! Improve your writer level and increase your earnings.</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
