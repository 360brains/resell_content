@extends("layouts.master")

@section("content")
    <section class="slide-banner scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
        <div class="slideshow-container">
            <div class="slideshow-item">
                <div class="bg" data-bg="{{ asset('assets/img/banner-3.jpg') }}"></div>
            </div>
            <div class="slideshow-item">
                <div class="bg" data-bg="{{ asset('assets/img/banner-6.jpg') }}"></div>
            </div>
            <div class="slideshow-item">
                <div class="bg" data-bg="{{ asset('assets/img/banner-5.jpg') }}"></div>
            </div>
            <div class="slideshow-item">
                <div class="bg" data-bg="{{ asset('assets/img/banner-2.jpg') }}"></div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="hero-section-wrap fl-wrap">
            <div class="container">
                <div class="intro-item fl-wrap banner-text">
                    <div class="caption text-center cl-white">
                        <h1 class="cl-white">Best Place To Grow Your<span class=""> Career </span></h1>
                        <p>Get the projects and tasks that match your skills.</p>
                    </div>
                    <form class="form-horizontal" action="{{ route('pages.projects') }}" method="get">
                        @csrf
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select id="choose-level" class="form-control" name="level">
                                    <option value="">Choose a Level</option>
                                    @forelse($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @empty
                                        <option>No Levels found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select id="choose-category" class="form-control" name="category">
                                    <option value="">Choose a Category</option>
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                        <option>No categories found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select id="choose-type" class="form-control" name="type">
                                    <option value="">Choose a Project Type</option>
                                    @forelse($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @empty
                                        <option>No types found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 no-padd">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary full-width">Search Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <h2>Browse Jobs By <span>Category</span></h2></div>
            </div>
            <div class="row">
                @forelse($categories as $category)

                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-bargraph" aria-hidden="true"></i><i class="icon-bargraph abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">{{ $category->name }}</a></h4>
                                <p>{{ $category->projects->count() }} Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <h1>No categories Found.</h1>
                @endforelse

            </div>
        </div>
    </section>
    <section class="video-sec dark" id="video" style="background-image:url({{ asset('assets/img/banner-10.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>Best For Your Projects</p>
                    <h2>Watch Our <span>video</span></h2></div>
            </div>
            <div class="video-part"><a href="#" data-toggle="modal" data-target="#my-video" class="video-btn"><i class="fa fa-play"></i></a></div>
        </div>
    </section>
    <section class="wp-process">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="main-heading">
                        <p>Most Viewed Projects</p>
                        <h2>Hot & Featured <span>Projects</span></h2></div>
                </div>
            </div>
            <div class="row">
                @forelse($projects as $project)
                <div class="col-md-4 col-sm-4">
                    <div class="popular-jobs-container">
                        <div class="popular-jobs-box"><span class="popular-jobs-status bg-success">hourly</span>
                            <h4 class="flc-rate">{{ $project->deadline }}</h4>
                            <div class="popular-jobs-box">
                                <div class="popular-jobs-box-detail">
                                    <h4>{{ $project->name }}</h4><span class="desination">{{ $project->category->name }}</span></div>
                            </div>
                            <div class="popular-jobs-box-extra">
                                <ul>
                                    <li>Total: {{ $project->quantity }}</li>
                                    <li>Level: {{ $project->level->name }}</li>
                                    <li class="more-skill bg-primary">+3</li>
                                </ul>
                                <p class="giveMeEllipsis">{!! $project->description !!} </p>
                            </div>
                        </div><a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a></div>
                </div>
                @empty
                No Featured Projects found
                @endforelse

            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center"><a href="http://themezhub.com/" class="btn btn-primary">Load More</a></div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="testimonial" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>What Say Our Client</p>
                    <h2>Our Success <span>Stories</span></h2></div>
            </div>
            <div class="row">
                <div id="client-testimonial-slider" class="owl-carousel">
                    <div class="client-testimonial">
                        <div class="pic"><img src="{{ asset('assets/img/client-1.jpg') }}" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>
                        <h3 class="client-testimonial-title">Lacky Mole</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="{{ asset('assets/img/client-4.jpg') }}" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>
                        <h3 class="client-testimonial-title">Karan Wessi</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="{{ asset('assets/img/client-2.jpg') }}" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>
                        <h3 class="client-testimonial-title">Roul Pinchai</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="{{ asset('assets/img/client-3.jpg') }}" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>
                        <h3 class="client-testimonial-title">Adam Jinna</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="brows-job-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>We found {{count($projects)}} matching projects. Interested?</h2></div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Single Job List -->
                    @forelse($projects as $project)
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">{{ $project->name }}</a></h3>
                                            <p>
                                                <span>{{ $project->category->name }}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>Level: {{ $project->level->name }}</span>
                                                <span class="job-type cl-success bg-trans-success">{{ $project->deadline }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p></i>{{ $project->type->name }}:  <span class="num-projects"> {{ $project->quantity }}</span> </p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="{{ route('pages.project.details', $project->id) }}" class="btn btn-default">Check Now</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    @empty
                        <h1>No Projects found</h1>
                @endforelse
                    <!-- Single Job List -->

                </div>
            </div>
            <div class="row">
                <ul class="pagination">
                    {{ $projects->links() }}
                </ul>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Download app Section Start -->
    <section class="download-app gray-bg">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                    <div class="app-content">
                        <h2>Download Our Best Apps</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi.</p>
                        <a href="#" class="btn call-btn"><i class="fa fa-apple"></i>iPhone Store</a>
                        <a href="#" class="btn call-btn gps"><i class="fa fa-android"></i>Google Store</a>
                    </div>
                </div>
            </div>
            <!--/row-->
        </div>
    </section>
@endsection
