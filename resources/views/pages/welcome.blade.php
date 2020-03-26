@extends("user.n-layouts.master")
@section("content")
    <!-- Slick Carousel-->
    <div class="jumbotron-creative-slider slick-slider carousel-parent" id="parent-carousel-jumbotron" data-arrows="false" data-loop="true" data-dots="true" data-swipe="false" data-autoplay="true" data-autoplay-speed="3500" data-items="1" data-fade="true" data-child="#child-carousel-jumbotron" data-for="#child-carousel-jumbotron">
        <div>
            <div class="slick-slide-inner" style="background-image: url( {{ asset('front/images/vector.png') }});"></div>
        </div>
        <div>
            <div class="slick-slide-inner" style="background-image: url( {{ asset('front/images/home-3-slider-slide-3.png') }});"></div>
        </div>
    </div>
    <div class="jumbotron-creative-inner">
        <div class="jumbotron-creative-main-outer">
            <div class="container">
                <div class="jumbotron-creative-main">
                    <div class="slick-slider carousel-child jumbotron-creative-main-carousel" id="child-carousel-jumbotron" data-for="#parent-carousel-jumbotron" data-autoplay="true" data-arrows="false" data-loop="true" data-dots="false" data-swipe="false" data-fade="true" data-items="1" data-slide-to-scroll="1">
                        <h2 class="font-weight-light banner-h2">Earn more for your skills </h2>
                        <h2 class="font-weight-light banner-h2">The Place Where New Talents are Found</h2>
                        <h2 class="font-weight-light banner-h2">Perfect Employment Opportunities</h2>
                    </div>
                    <p class="big banner-p">Are you an Elite Author Skilled at Writing?
                        or Build Quality Video and Multiply Your Earnings
                        as a Freelancer</p>
                </div>
            </div>
        </div>
    </div>
    </header>
    <!-- Welcome to WorkPlace-->
    <section class="section section-md text-center">
        <div class="container">
            <h3>Welcome to Resell Content</h3>
            <p>Get Work Done Faster On Resell Content, With Confidence</p>
            <div class="row row-50 justify-content-center align-items-center text-left">
                <div class="col-md-10 col-lg-6">
                    <figure class="figure-responsive block-5"><img src="{{ asset('front/images/ic-min.png') }}" alt=""/>
                    </figure>
                </div>
                <div class="col-md-10 col-lg-6">
                    <div class="row-bordered-1-outer">
                        <div class="row row-bordered-1">
                            <div class="col-sm-6">
                                <!-- Box Line-->
                                <article class="box-line box-line_sm">
                                    <div class="box-line-inner">
                                        <div class="box-line-icon icon mercury-icon-money"> </div>
                                        <h5 class="box-line-title"> Payment Protection, Guaranteed</h5>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6">
                                <!-- Box Line-->
                                <article class="box-line box-line_sm">
                                    <div class="box-line-inner">
                                        <div class="box-line-icon icon mercury-icon-partners"></div>
                                        <h5 class="box-line-title">Know The Price Upfront</h5>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6">
                                <!-- Box Line  -->
                                <article class="box-line box-line_sm">
                                    <div class="box-line-inner">
                                        <div class="box-line-icon icon mercury-icon-chat"></div>
                                        <h5 class="box-line-title">Helpful feedback</h5>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6">
                                <!-- Box Line-->
                                <article class="box-line box-line_sm">
                                    <div class="box-line-inner">
                                        <div class="box-line-icon icon mercury-icon-clock"></div>
                                        <h5 class="box-line-title">24\7 Dedicated and Free Support</h5>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-md text-center bg-gray-100">
        <div class="container">
            <h3>Just 6 Easy Steps to New Capabilities</h3>
            <ul class="list-linked">
                <li class="ll-item">
                    <div class="icon ll-item-icon mercury-icon-user">
                        <svg class="ll-item-icon-inner" version="1.2" baseProfile="tiny" viewbox="-1 -1 102 102">
                            <circle cx="50" cy="50" r="50" fill="none" vector-effect="non-scaling-stroke"></circle>
                        </svg>
                    </div>
                    <div class="ll-item-main">
                        <h5 class="ll-item-title">SIGN UP</h5>
                    </div>
                </li>
                <li class="ll-item">
                    <div class="icon ll-item-icon mercury-icon-note">
                        <svg class="ll-item-icon-inner" version="1.2" baseProfile="tiny" viewbox="-1 -1 102 102">
                            <circle cx="50" cy="50" r="50" fill="none" vector-effect="non-scaling-stroke"></circle>
                        </svg>
                    </div>
                    <div class="ll-item-main">
                        <h5 class="ll-item-title">PASS A FREE TEST</h5>
                    </div>
                </li>
                <li class="ll-item">
                    <div class="icon ll-item-icon mercury-icon-folder">
                        <svg class="ll-item-icon-inner" version="1.2" baseProfile="tiny" viewbox="-1 -1 102 102">
                            <circle cx="50" cy="50" r="50" fill="none" vector-effect="non-scaling-stroke"></circle>
                        </svg>
                    </div>
                    <div class="ll-item-main">
                        <h5 class="ll-item-title">BROWSE PROJECTS</h5>
                    </div>
                </li>
                <li class="ll-item">
                    <div class="icon ll-item-icon mercury-icon-target-2">
                        <svg class="ll-item-icon-inner" version="1.2" baseProfile="tiny" viewbox="-1 -1 102 102">
                            <circle cx="50" cy="50" r="50" fill="none" vector-effect="non-scaling-stroke"></circle>
                        </svg>
                    </div>
                    <div class="ll-item-main">
                        <h5 class="ll-item-title">GET TASKS</h5>
                    </div>
                </li>
                <li class="ll-item">
                    <div class="icon ll-item-icon mercury-icon-clock">
                        <svg class="ll-item-icon-inner" version="1.2" baseProfile="tiny" viewbox="-1 -1 102 102">
                            <circle cx="50" cy="50" r="50" fill="none" vector-effect="non-scaling-stroke"></circle>
                        </svg>
                    </div>
                    <div class="ll-item-main">
                        <h5 class="ll-item-title">START WORK</h5>
                    </div>
                </li>
                <li class="ll-item">
                    <div class="icon ll-item-icon mercury-icon-money-2">
                        <svg class="ll-item-icon-inner" version="1.2" baseProfile="tiny" viewbox="-1 -1 102 102">
                            <circle cx="50" cy="50" r="50" fill="none" vector-effect="non-scaling-stroke"></circle>
                        </svg>
                    </div>
                    <div class="ll-item-main">
                        <h5 class="ll-item-title">GET PAID</h5>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Popular Categories-->
    <section class="section section-md text-center">
        <div class="container container-fullwidth">
            <h3>Popular Categories</h3>
            <!-- Owl Carousel-->
            <div class="owl-carousel owl-carousel-stretch" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="3" data-xl-items="5" data-xxl-items="6" data-dots="true" data-nav="false" data-stage-padding="1" data-loop="true" data-margin="26" data-md-margin="20" data-lg-margin="26" data-autoplay="true" data-autoplay-timeout="3500" data-mouse-drag="false">
                @foreach($categories as $category)
                <div class="box-creative">
                    <div class="box-creative-inner">
                        <div class="category-avatar">
                            <img src="{{ asset($category->avatar) }}" alt="{{ $category->name }}" />
                        </div>
                        <p class="box-creative-title">{{ $category->name }}</p>
                    </div>
                    <div class="box-creative-dummy"></div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- Recent Jobs-->
    <section class="section section-md bg-gray-100">
        <div class="container">
            <div class="row row-40">
                <div class="col-12 text-center">
                    <h3>Recent projects</h3>
                </div>
                <div class="col-12">
                    <div class="table-job-offers-outer">
                        <table class="table-job-offers table-responsive">
                            @forelse($projects as $project)
                                <tr>
                                    <td class="table-job-offers-date">
                                        <span>{{ $project->deadline }} Hour</span></td>
                                    <td class="table-job-offers-main">
                                        <!-- Company Light-->
                                        <article class="company-light">
                                            <figure class="company-light-figure">
                                            </figure>
                                            <div class="company-light-main">
                                                <h5 class="company-light-title"><a href=" {{ route('pages.project.details' , $project->id) }}">{{ $project->name }}</a></h5>
                                                <p>{{ $project->type->name }}</p>
                                            </div>
                                        </article>
                                    </td>
                                    <td class="table-job-offers-meta">
                                        <div class="object-inline">
                                            <span class="icon icon-sm text-primary mercury-icon-money"></span><span>Rs.{{ floor($project->price) }}</span></div>
                                    </td>
                                    <td class="table-job-offers-meta">
                                        <div class="object-inline">
                                            <span class="icon icon-1 text-primary mercury-icon-jobs"></span><span>{{ $project->available }}</span></div>
                                    </td>
                                    <td class="table-job-offers-badge"><span class="badge">{{ $project->category->name }}</span></td>
                                </tr>
                            @empty
                                <h1>No projects found.</h1>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="button button-lg button-primary-outline button-anorak" href="{{ route('pages.projects') }}">Show More Jobs</a></div>
            </div>
        </div>
    </section>
    <section class="section section-sm">
        <div class="container">
            <h3 class="text-center">New Candidates</h3>
            <div class="owl-carousel owl-carousel-profile" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="false" data-fade="true" data-margin="30" data-mouse-drag="false">
                <!-- Profile Classic--><a class="profile-classic" href="#">
                    <figure class="profile-classic-figure"><img class="profile-classic-image" src="{{ asset('front/images/candidates-grid-1-266x219.jpg') }}" alt=""/>
                    </figure>
                    <div class="profile-classic-main">
                        <h5 class="profile-classic-name">Amanda Cook</h5>
                        <ul class="profile-classic-list">
                            <li><span class="icon mdi mdi-checkbox-multiple-blank"></span><span>Level 1</span></li>
                            <li><span class="icon mdi mdi-account"></span><span>Sports</span></li>
                        </ul>
                    </div></a>
                <!-- Profile Classic--><a class="profile-classic" href="#">
                    <figure class="profile-classic-figure"><img class="profile-classic-image" src="{{ asset('front/images/candidates-grid-2-266x219.jpg') }}" alt=""/>
                    </figure>
                    <div class="profile-classic-main">
                        <h5 class="profile-classic-name">Kevin Parker</h5>
                        <ul class="profile-classic-list">
                            <li><span class="icon mdi mdi-checkbox-multiple-blank"></span><span>Level 3</span></li>
                            <li><span class="icon mdi mdi-account"></span><span>Finance</span></li>
                        </ul>
                    </div></a>
                <!-- Profile Classic--><a class="profile-classic" href="#">
                    <figure class="profile-classic-figure"><img class="profile-classic-image" src="{{ asset('front/images/candidates-grid-3-266x219.jpg') }}" alt=""/>
                    </figure>
                    <div class="profile-classic-main">
                        <h5 class="profile-classic-name">Sandy Williams</h5>
                        <ul class="profile-classic-list">
                            <li><span class="icon mdi mdi-checkbox-multiple-blank"></span><span>Level 2</span></li>
                            <li><span class="icon mdi mdi-account"></span><span>Travel</span></li>
                        </ul>
                    </div></a>
                <!-- Profile Classic--><a class="profile-classic" href="#">
                    <figure class="profile-classic-figure"><img class="profile-classic-image" src="{{ asset('front/images/candidates-grid-4-266x219.jpg') }}" alt=""/>
                    </figure>
                    <div class="profile-classic-main">
                        <h5 class="profile-classic-name">James Johnson</h5>
                        <ul class="profile-classic-list">
                            <li><span class="icon mdi mdi-checkbox-multiple-blank"></span><span>Level 4</span></li>
                            <li><span class="icon mdi mdi-account"></span><span>Digital Marketing</span></li>
                        </ul>
                    </div></a>
            </div>
        </div>
    </section>
    <!-- Success Stories-->
    <section class="section jumbotron-modern bg-blue-15" style="background-image: url({{ asset('front/images/success-bg.png') }}); background-repeat: repeat;">
        <div class="jumbotron-modern-inner">
{{--            <div class="jumbotron-modern-image-left"><img class="wow slideInLeft" src="{{ asset('front/images/custom-slide-left-423x576.png') }}" alt=""/>--}}
{{--            </div>--}}
{{--            <div class="jumbotron-modern-image-right"><img class="wow slideInRight" src="{{ asset('front/images/custom-slide-right-423x576.png') }}" alt=""/>--}}
{{--            </div>--}}
            <div class="container">
                <h3>Success Stories </h3>
                <div class="slick-slider-3">
                    <!-- Slick Carousel-->
                    <div class="slick-slider carousel-parent" id="carousel-parent-1" data-autoplay="true" data-autoplay-speed="4000" data-arrows="false" data-dots="false" data-loop="true" data-fade="true" data-swipe="true" data-items="1" data-child="#child-carousel-1" data-for="#child-carousel-1">
                        <div class="item">
                            <!-- Quote Mary-->
                            <blockquote class="quote-mary">
                                <svg class="quote-mary-mark" version="1.1" x="0px" y="0px" viewbox="0 0 36 28" width="38" height="28">
                                    <path d="M13,0l-2.4,13.3H15V28H0V13.1L4,0H13z M34,0l-2.4,13.3H36V28H20.9V13.1L25,0H34z"></path>
                                </svg>
                                <div class="quote-mary-text">
                                    <p>Compared to other online article writing portal it's more educative, encouraging, open, flexible and more importantly reliable.</p>
                                </div>
                                <h5 class="quote-mary-cite">John Salley</h5>
                                <p class="quote-mary-position">Content Writter</p>
                            </blockquote>
                        </div>
                        <div class="item">
                            <!-- Quote Mary-->
                            <blockquote class="quote-mary">
                                <svg class="quote-mary-mark" version="1.1" x="0px" y="0px" viewbox="0 0 36 28" width="38" height="28">
                                    <path d="M13,0l-2.4,13.3H15V28H0V13.1L4,0H13z M34,0l-2.4,13.3H36V28H20.9V13.1L25,0H34z"></path>
                                </svg>
                                <div class="quote-mary-text">
                                    <p>After only 3 weeks of becoming a member at WorkPlace, I received 4 job offers, I am now utilizing my skills at a job in the Antelope Valley which is where I live.</p>
                                </div>
                                <h5 class="quote-mary-cite">Sam Smith</h5>
                                <p class="quote-mary-position">Web Designer</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="slick-slider carousel-child" id="child-carousel-1" data-for="#carousel-parent-1" data-autoplay="true" data-autoplay-speed="4000" data-arrows="true" data-loop="false" data-dots="false" data-swipe="true" data-items="3" data-sm-items="3" data-md-items="4" data-lg-items="5" data-xl-items="4" data-slide-to-scroll="1">
                        <div class="item">
                            <div class="item-inner">
                                <div class="slick-slide-inner">
                                    <div class="slick-slide-figure"><img src="{{ asset('front/images/slick-2-testimonials-1-73x73.jpg') }}" alt=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-inner">
                                <div class="slick-slide-inner">
                                    <div class="slick-slide-figure"><img src="{{ asset('front/images/slick-2-testimonials-3-73x73.jpg') }}" alt=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing-->
    {{--    <section class="section section-md">--}}
    {{--        <div class="container">--}}
    {{--            <h3 class="text-center">Pricing</h3>--}}
    {{--            <div class="row row-50 justify-content-center">--}}
    {{--                <div class="col-md-6 col-lg-4">--}}
    {{--                    <!-- Pricing Table Classic-->--}}
    {{--                    <article class="pt pt-classic">--}}
    {{--                        <div class="pt-classic-header">--}}
    {{--                            <div class="pt-classic-item">--}}
    {{--                                <p class="pt-title">Startup</p><span class="badge">7 Days Free</span>--}}
    {{--                            </div>--}}
    {{--                            <p class="pt-price"><span class="pt-price-small pt-price-currency">$</span><span>59</span><span class="pt-price-small">00</span></p>--}}
    {{--                        </div>--}}
    {{--                        <div class="pt-classic-main">--}}
    {{--                            <ul class="pt-classic-features">--}}
    {{--                                <li>Post 8 Jobs</li>--}}
    {{--                                <li>5 Highlighted Job Posts</li>--}}
    {{--                                <li>Browse Your Job Listings</li>--}}
    {{--                                <li>Access to Job Posting Stats</li>--}}
    {{--                                <li>Email Support</li>--}}
    {{--                                <li>Jobs Expire In 90 Days</li>--}}
    {{--                            </ul><a class="button button-primary-outline" href="#">Get started</a>--}}
    {{--                        </div>--}}
    {{--                    </article>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6 col-lg-4">--}}
    {{--                    <!-- Pricing Table Classic-->--}}
    {{--                    <article class="pt pt-classic">--}}
    {{--                        <div class="pt-classic-header">--}}
    {{--                            <div class="pt-classic-item">--}}
    {{--                                <p class="pt-title text-tertiary">Company</p>--}}
    {{--                            </div>--}}
    {{--                            <p class="pt-price"><span class="pt-price-small pt-price-currency">$</span><span>89</span><span class="pt-price-small">00</span></p>--}}
    {{--                        </div>--}}
    {{--                        <div class="pt-classic-main">--}}
    {{--                            <ul class="pt-classic-features">--}}
    {{--                                <li>Post 28 Jobs</li>--}}
    {{--                                <li>10 Highlighted Job Posts</li>--}}
    {{--                                <li>Edit Your Job Listings</li>--}}
    {{--                                <li>Access to Job Posting Stats</li>--}}
    {{--                                <li>Email and Phone Support</li>--}}
    {{--                                <li>Jobs Expire In 180 Days</li>--}}
    {{--                            </ul><a class="button button-primary-outline" href="#">Get started</a>--}}
    {{--                        </div>--}}
    {{--                    </article>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-6 col-lg-4">--}}
    {{--                    <!-- Pricing Table Classic-->--}}
    {{--                    <article class="pt pt-classic">--}}
    {{--                        <div class="pt-classic-header">--}}
    {{--                            <div class="pt-classic-item">--}}
    {{--                                <p class="pt-title text-secondary">Enterprise</p>--}}
    {{--                            </div>--}}
    {{--                            <p class="pt-price"><span class="pt-price-small pt-price-currency">$</span><span>199</span><span class="pt-price-small">00</span></p>--}}
    {{--                        </div>--}}
    {{--                        <div class="pt-classic-main">--}}
    {{--                            <ul class="pt-classic-features">--}}
    {{--                                <li>Post 35 Jobs</li>--}}
    {{--                                <li>15 Highlighted Job Posts</li>--}}
    {{--                                <li>Replace Your Job Listings</li>--}}
    {{--                                <li>Access to Job Posting Stats</li>--}}
    {{--                                <li>24/7 Support</li>--}}
    {{--                                <li>Jobs Expire In 250 Days</li>--}}
    {{--                            </ul><a class="button button-primary-outline" href="#">Get started</a>--}}
    {{--                        </div>--}}
    {{--                    </article>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- Latest Posts-->
    <section class="section pdf-section section-md bg-gray-100">
        <div class="container">
            <h3 class="text-center">Sample Articles</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="container-img">
                        <img src="{{ asset('front/images/document-1.jpg') }}" alt="Article 1" class="image img-responsive">
                        <div class="overlay">
                            <a href="{{ asset('front/pdf/article_format.pdf') }}" class="icon-img" title="Download PDF" download>
                                <img src="{{ asset('images/pdf.svg') }}" alt="Download PDF" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container-img">
                    <img src="{{ asset('front/images/ArticleFormat 4-1.jpg') }}" class="img-responsive image" alt="Article 2" />
                        <div class="overlay">
                            <a href="{{ asset('front/pdf/article_format_1.pdf') }}" class="icon-img" title="Download PDF" download>
                                <img src="{{ asset('images/pdf.svg') }}" alt="Download PDF" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container-img">
                    <img src="{{ asset('front/images/2-req.jpg') }}" class="img-responsive image" alt="Article 3" />
                    <div class="overlay">
                        <a href="{{ asset('front/pdf/article_format_2.pdf') }}" class="icon-img" title="Download PDF" download>
                            <img src="{{ asset('images/pdf.svg') }}" alt="Download PDF" />
                        </a>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-md-12 text-center">
                    <a class="button button-lg button-primary-outline button-anorak" href="">Read More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA-->
@endsection
