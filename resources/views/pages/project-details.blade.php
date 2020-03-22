@extends("user.n-layouts.master")
@section("content")
    <style>
        .map-responsive{
            overflow:hidden;
            padding-bottom:100%;
            position:relative;
            height:0;
        }
        .map-responsive iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>
    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url({{ asset('front/images/bg-image-9.jpg') }});">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">Project Detail</h3>
            </div>
        </div>
        <div class="breadcrumbs-custom-aside">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li><a href="{{ route('pages.projects') }}">Browse Jobs</a></li>
                    <li class="active">{{ $project->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section section-md">
        <div class="container">
            <div class="row row-50">
                <div class="col-lg-8">
                    <div class="layout-details">
                        <article class="company-light company-light_1">
                            <figure class="company-light-logo"><img class="company-light-logo-image" src="{{ asset('front/images/company-1-52x52.png') }}" alt=" {{ $project->name }}"/>
                            </figure>
                            <div class="company-light-main">
                                <h5 class="company-light-title">{{ $project->name }}</h5>
                                <div class="company-light-info">
                                    <div class="row row-15 row-bordered">
                                        <div class="col-sm-6">
                                            <ul class="list list-xs">
                                                <li>
                                                    <p class="object-inline object-inline_sm"><span class="icon icon-1 text-primary mercury-icon-clock"></span><span>Available Before {{ $project->deadline }}</span></p>
                                                </li>
                                                <li>
                                                    <p class="object-inline object-inline_sm"><span class="icon icon-default text-primary fl-bigmug-line-attach8"></span><span>{{ $project->category->name }}</span></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="list list-xs">
                                                <li>
                                                    <p class="object-inline object-inline_sm"><span class="icon icon-sm text-primary mdi mdi-cash"></span><span>Rs {{ $project->price }}</span></p>
                                                </li>
                                                <li>
                                                    <p class="object-inline object-inline_sm"><span class="icon icon-1 text-primary mdi mdi-web"></span><span><a href="{{ route('user.tasks.take', $project->id) }}">Take a task</a></span></p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <p class="text-style-1">{!! $project->description !!}
                        <br>
                        This task requires user Level {{$project->level->name}}, and the following trainings
                        <br>
                    <ul class="detail-list">
                        @forelse($project->trainings as $training)

                            <li> {{ $training->name }}</li>
                        @empty
                            <h6>No training required.</h6>
                        @endforelse
                    </ul>
                    </p>
                    <div class="row row-30">
                        <div class="col-md-6">
                            <h4>Project Category</h4>
                            <ul class="list-marked-3">
                                <li>{{ $project->category->name }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4>Project Type</h4>
                            <ul class="list-marked-3">
                                <li>{{$project->type->name}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4>Career Level</h4>
                            <ul class="list-marked-3">
                                <li>{{$project->level->name}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h4>Available</h4>
                            <ul class="list-marked-3">
                                <li>{{ $project->available }}/{{ $project->quantity }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="layout-1">
                        <div class="layout-1-inner">
                            <p>Share this project</p>
                            <div>
                                <ul class="list-inline list-inline-xs">
                                    <li><a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-facebook" href="#"></a></li>
                                    <li><a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-google-plus" href="#"></a></li>
                                    <li><a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-twitter" href="#"></a></li>
                                    <li><a class="icon icon-xxs icon-filled icon-filled-brand icon-circle fa fa-pinterest-p" href="#"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block offset-top-2">
                        <h4>Related projects</h4>
                        <table class="table-job-listing table-responsive">
                            @forelse($relatedProjects as $project)
                                <tr>
                                    <td class="table-job-listing-main">
                                        <!-- Company Minimal-->
                                        <article class="company-minimal">
                                            <figure class="company-minimal-figure"><img class="company-minimal-image" src="{{ asset('front/images/company-3-42x42.png') }}" alt="{{ $project->name }}"/>
                                            </figure>
                                            <div class="company-minimal-main">
                                                <h5 class="company-minimal-name"><a href="{{ route('pages.project.details', $project->id) }}">{{ $project->name }}</a></h5>
                                                <p>{{$project->type->name}}</p>
                                            </div>
                                        </article>
                                    </td>
                                    <td class="table-job-listing-badge"><span class="badge badge-secondary">{{ $project->category->name }}</span></td>
                                </tr>
                            @empty
                                <h4>No related projects found.</h4>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row row-30 row-lg-50">
                        <div class="col-md-6 col-lg-12">
                            <!-- RD Mailform-->
                            <form class="rd-mailform form-corporate form-spacing-small form-corporate_sm" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                                <h4>Contact Us</h4>
                                <div class="form-wrap">
                                    <label class="form-label" for="contact-name">Your Name</label>
                                    <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                                </div>
                                <div class="form-wrap">
                                    <label class="form-label" for="contact-email">E-mail</label>
                                    <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                                </div>
                                <div class="form-wrap">
                                    <label class="form-label" for="contact-phone">Phone</label>
                                    <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@PhoneNumber">
                                </div>
                                <div class="form-wrap">
                                    <label class="form-label" for="contact-message">Message</label>
                                    <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                                </div>
                                <div class="form-wrap">
                                    <button class="button button-block button-anorak button-primary" type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3405.6447663772824!2d73.10434521467094!3d31.396357160397628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x392267e6b409e561%3A0x4a6ecaef42f727ef!2sSunztech!5e0!3m2!1sen!2s!4v1584782698379!5m2!1sen!2s" width="100%"  height="440" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                            <article class="message-bubble">
                                <div class="message-bubble-inner">
                                    <div class="icon mdi mdi-map-marker icon-sm text-primary"></div>
                                    <div class="message-bubble-main">
                                        <p>House #958، St-12, Main bazar Muhammadabad, Faisalabad, Punjab</p>
                                        <p>Email:&nbsp;<a href="mailto:info@sunztech.com">info@sunztech.com</a></p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Title Header Start -->
    {{--    --}}
    {{--    <section class="inner-header-title" style="background-image:url({{ asset('assets/img/banner-10.jpg') }});">--}}
    {{--        <div class="container">--}}
    {{--            <h1>Project Detail</h1>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <div class="clearfix"></div>--}}
    {{--    <!-- Title Header End -->--}}

    {{--    <!-- Candidate Detail Start -->--}}
    {{--    <section class="detail-desc">--}}
    {{--        <div class="container">--}}

    {{--            <div class="ur-detail-wrap top-lay">--}}

    {{--                <div class="ur-detail-box">--}}

    {{--                    <div class="ur-thumb">--}}
    {{--                        <img src="{{ asset('assets/img/project.png') }}" class="img-responsive" alt="" />--}}
    {{--                    </div>--}}
    {{--                    <div class="ur-caption">--}}
    {{--                        <h3 class="ur-title">{{ $project->name }}</h3>--}}
    {{--                        <p class="ur-location"><i class="ti-location-pin mrg-r-5"></i>Available Before {{ $project->deadline }}</p>--}}
    {{--                        <span class="ur-designation">{{ $project->category->name }}</span>--}}
    {{--                        <h4 class="ur-designation">Available: {{ $project->available }}/{{ $project->quantity }}</h4>--}}


    {{--                    </div>--}}

    {{--                </div>--}}

    {{--                <div class="ur-detail-btn">--}}
    {{--                    <a href="{{ route('user.tasks.take', $project->id) }}" class="btn btn-info full-width"><i class="ti-thumb-up mrg-r-5"></i>Take a task</a><br>--}}
    {{--                </div>--}}

    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- Candidate Detail End -->--}}

    {{--    <!-- Candidate full detail Start -->--}}
    {{--    <section class="full-detail-description full-detail">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}

    {{--                <div class="col-lg-8 col-md-8">--}}

    {{--                    <div class="row-bottom">--}}
    {{--                        <h2 class="detail-title">Project Description</h2>--}}
    {{--                        {!! $project->description !!}--}}
    {{--                    </div>--}}

    {{--                    <div class="row-bottom">--}}
    {{--                        <h2 class="detail-title">Required Level, and Trainings</h2>--}}
    {{--                        <p>This task requires user Level {{$project->level->name}}, and the following trainings:</p>--}}
    {{--                        <ul class="detail-list">--}}
    {{--                            @forelse($project->trainings as $training)--}}

    {{--                                <li> {{ $training->name }}</li>--}}
    {{--                            @empty--}}
    {{--                            <h3>No training required.</h3>--}}
    {{--                            @endforelse--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}

    {{--                </div>--}}

    {{--                <div class="col-lg-4 col-md-4">--}}
    {{--                    <div class="full-sidebar-wrap">--}}

    {{--                        <!-- Candidate overview -->--}}
    {{--                        <div class="sidebar-widgets">--}}

    {{--                            <div class="ur-detail-wrap">--}}
    {{--                                <div class="ur-detail-wrap-header">--}}
    {{--                                    <h4>Project Overview</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="ur-detail-wrap-body">--}}
    {{--                                    <ul class="ove-detail-list">--}}

    {{--                                        <li>--}}
    {{--                                            <i class="ti-wallet"></i>--}}
    {{--                                            <h5>Offerd Wages</h5>--}}
    {{--                                            <span>Rs{{ $project->price }}</span>--}}
    {{--                                        </li>--}}

    {{--                                        <li>--}}
    {{--                                            <i class="ti-ink-pen"></i>--}}
    {{--                                            <h5>Career Level</h5>--}}
    {{--                                            <span>{{$project->level->name}}</span>--}}
    {{--                                        </li>--}}

    {{--                                        <li>--}}
    {{--                                            <i class="ti-home"></i>--}}
    {{--                                            <h5>Category</h5>--}}
    {{--                                            <span>{{$project->category->name}}</span>--}}
    {{--                                        </li>--}}

    {{--                                        <li>--}}
    {{--                                            <i class="ti-book"></i>--}}
    {{--                                            <h5>Project Type</h5>--}}
    {{--                                            <span>{{$project->type->name}}</span>--}}
    {{--                                        </li>--}}

    {{--                                    </ul>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                        <!-- /Candidate overview -->--}}

    {{--                        <!-- Say Hello -->--}}
    {{--                        <div class="sidebar-widgets">--}}

    {{--                            <div class="ur-detail-wrap">--}}
    {{--                                <div class="ur-detail-wrap-header">--}}
    {{--                                    <h4>Get In Touch</h4>--}}
    {{--                                </div>--}}
    {{--                                <div class="ur-detail-wrap-body">--}}
    {{--                                    <form action="#">--}}
    {{--                                        <div class="form-group">--}}
    {{--                                            <label>Name</label>--}}
    {{--                                            <input type="email" class="form-control">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="form-group">--}}
    {{--                                            <label>Email</label>--}}
    {{--                                            <input type="email" class="form-control">--}}
    {{--                                        </div>--}}
    {{--                                        <div class="form-group">--}}
    {{--                                            <label>Message</label>--}}
    {{--                                            <textarea class="form-control"></textarea>--}}
    {{--                                        </div>--}}
    {{--                                        <button type="submit" class="btn btn-primary">Submit</button>--}}
    {{--                                    </form>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}

    {{--                        </div>--}}
    {{--                        <!-- /Say Hello -->--}}

    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    {{--    <!-- company full detail End -->--}}

    {{--    <!-- More Jobs -->--}}
    {{--    <section class="padd-top-20">--}}
    {{--        <div class="container">--}}

    {{--            <div class="row mrg-0">--}}
    {{--                <div class="col-md-12 col-sm-12">--}}
    {{--                    <h3>Related Projects</h3>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!--Browse Job In Grid-->--}}
    {{--            <div class="row mrg-0">--}}

    {{--                @forelse($relatedProjects as $project)--}}
    {{--                    <a href="{{ route('pages.project.details', $project->id) }}">--}}
    {{--                        <div class="col-md-4 col-sm-4">--}}
    {{--                            <div class="popular-jobs-container">--}}
    {{--                                <div class="popular-jobs-box">--}}
    {{--                                    <div class="popular-jobs-box">--}}
    {{--                                        <div class="brows-job-company-img">--}}
    {{--                                            <img src="{{ asset('assets/img/project.png') }}" class="img-responsive" alt="" />--}}
    {{--                                        </div>--}}
    {{--                                        <div class="popular-jobs-box-detail">--}}
    {{--                                            <h4>{{ $project->name }}</h4><span class="desination">{{ $project->category->name }}</span></div>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="popular-jobs-box-extra">--}}
    {{--                                        <ul>--}}
    {{--                                            <li>Total: {{ $project->quantity }}</li>--}}
    {{--                                            <li>Level: {{ $project->level->name }}</li>--}}
    {{--                                            <li class="more-skill bg-primary">{{ $project->price }}</li>--}}
    {{--                                        </ul>--}}
    {{--                                        --}}{{--                                <p class="giveMeEllipsis">{!! $project->description !!} </p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                                <div class="brows-job-type">--}}
    {{--                                    <span class="full-time">{{ $project->type->name }}</span>--}}
    {{--                                </div>--}}
    {{--                                <ul class="grid-view-caption">--}}
    {{--                                    <li>--}}
    {{--                                        <div class="brows-job-location">--}}
    {{--                                            <p><i class="fa fa-clock-o"></i>{{ $project->deadline }}</p>--}}
    {{--                                        </div>--}}
    {{--                                    </li>--}}
    {{--                                    <li>--}}
    {{--                                        <p><span class="brows-job-sallery"><i class="fa fa-money"></i>{{ $project->price }}</span></p>--}}
    {{--                                    </li>--}}
    {{--                                </ul>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </a>--}}
    {{--                @empty--}}
    {{--                    <h2>No related projects found.</h2>--}}
    {{--                @endforelse--}}

    {{--            </div>--}}
    {{--            <!--/.Browse Job In Grid-->--}}

    {{--        </div>--}}
    {{--    </section>--}}
    <!-- More Jobs End -->
@endsection
