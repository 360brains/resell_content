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

{{--        <section>--}}
{{--            <div class="section how-does-iwriter-work service">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <div class="main-heading">--}}
{{--                                <h2 class="home-page text-center" style="margin-bottom: 15px"> How Does it <span class="how-it-works">Work?</span> </h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-12">--}}
{{--                            <h3 class="home-page text-center font-weight-300 five-easy-steps"> it Works In Just 5 Easy--}}
{{--                                Steps. </h3>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-12 hidden-xs">--}}
{{--                            <table class="how-iwriter-works-bubbles">--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td class="odd-td"><img src="{{ asset('assets/img/bubble-step-1.png') }}"></td>--}}
{{--                                    <td class="even-td"><img src="{{ asset('assets/img/stripped-line.png') }}"></td>--}}
{{--                                    <td class="odd-td"><img src="{{ asset('assets/img/bubble-step-2.png') }}"></td>--}}
{{--                                    <td class="even-td"><img src="{{ asset('assets/img/stripped-line.png') }}"></td>--}}
{{--                                    <td class="odd-td"><img src="{{ asset('assets/img/bubble-step-3.png') }}"></td>--}}
{{--                                    <td class="even-td"><img src="{{ asset('assets/img/stripped-line.png') }}"></td>--}}
{{--                                    <td class="odd-td"><img src="{{ asset('assets/img/bubble-step-4.png') }}"></td>--}}
{{--                                    <td class="even-td"><img src="{{ asset('assets/img/stripped-line.png') }}"></td>--}}
{{--                                    <td class="odd-td"><img src="{{ asset('assets/img/bubble-step-5.png') }}"></td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td class="odd-td">--}}
{{--                                        <h4>Step #1</h4>--}}
{{--                                        <p>--}}
{{--                                            <!----><a href="/register-client" class="how-it-works">Register</a>--}}
{{--                                            <!---->For A Free Account. </p>--}}
{{--                                    </td>--}}
{{--                                    <td class="even-td"></td>--}}
{{--                                    <td class="odd-td">--}}
{{--                                        <h4>Step #2</h4>--}}
{{--                                        <p>Pass an easy Test Of Type You Would Like to take for free and gain level 1.</p>--}}
{{--                                    </td>--}}
{{--                                    <td class="even-td"></td>--}}
{{--                                    <td class="odd-td">--}}
{{--                                        <h4>Step #3</h4>--}}
{{--                                        <p>Complete 10 level 1 tasks and get a level 2 and be paid afterwards.</p>--}}
{{--                                    </td>--}}
{{--                                    <td class="even-td"></td>--}}
{{--                                    <td class="odd-td">--}}
{{--                                        <h4>Step #4</h4>--}}
{{--                                        <p>Your Content Will be reviewed And After Approval you will be paid.</p>--}}
{{--                                    </td>--}}
{{--                                    <td class="even-td"></td>--}}
{{--                                    <td class="odd-td">--}}
{{--                                        <h4>Step #5</h4>--}}
{{--                                        <p>Download Your Content And Rinse And Repeat.</p>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-12 col-sm-12">--}}
{{--                            <div class="text-center"><a href="{{route('pages.projects')}}" class="btn btn-primary">How It Works</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

    <section>
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <h2>Browse Jobs By <span>Category</span></h2></div>
            </div>
            <div class="row">
                @forelse($categories as $category)

                    <a href="{{ route('pages.projects.category', $category->id) }}">
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
                    </a>
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
                    <a href="{{ route('pages.project.details', $project->id) }}">
                        <div class="col-md-4 col-sm-4">
                            <div class="popular-jobs-container">
                                <div class="popular-jobs-box">
                                    <div class="popular-jobs-box">
                                        <div class="brows-job-company-img">
                                            <img src="{{ asset('assets/img/project.png') }}" class="img-responsive" alt="" />
                                        </div>
                                        <div class="popular-jobs-box-detail">
                                            <h4>{{ $project->name }}</h4><span class="desination">{{ $project->category->name }}</span></div>
                                    </div>
                                    <div class="popular-jobs-box-extra">
                                        <ul>
                                            <li>Total: {{ $project->quantity }}</li>
                                            <li>Level: {{ $project->level->name }}</li>
                                            <li class="more-skill bg-primary">{{ $project->level->price }}</li>
                                        </ul>
                                        {{--                                <p class="giveMeEllipsis">{!! $project->description !!} </p>--}}
                                    </div>
                                </div>
                                <div class="brows-job-type">
                                    <span class="full-time">{{ $project->type->name }}</span>
                                </div>
                                <ul class="grid-view-caption">
                                    <li>
                                        <div class="brows-job-location">
                                            <p><i class="fa fa-clock-o"></i>{{ $project->deadline }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <p><span class="brows-job-sallery"><i class="fa fa-money"></i>{{ $project->level->price }}</span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                @empty
                No Featured Projects found
                @endforelse

            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center"><a href="{{route('pages.projects')}}" class="btn btn-primary">Load More</a></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========= start Call To Action section =========== -->
{{--    <div class="clearfix"></div>--}}
{{--    <section class="call-to-act">--}}
{{--        <div class="container-fluid">--}}

{{--            <div class="col-md-6 col-sm-6 no-padd ht-min bl-dark">--}}
{{--                <div class="call-to-act-caption">--}}
{{--                    <h2>Want to be an expert?</h2>--}}
{{--                    <h3>We have experts that can train you in your desired skill.</h3>--}}
{{--                    <a href="{{ route('pages.trainings') }}" class="btn bat-call-to-act">Hire Us</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-6 col-sm-6 no-padd ht-min gr-dark">--}}
{{--                <div class="call-to-act-caption">--}}
{{--                    <h2>Do not know how to do it?</h2>--}}
{{--                    <h3>We have some free tutorials for you. learn it and start to earn immediately</h3>--}}
{{--                    <a href="{{ route('pages.tutorials') }}" class="btn bat-call-to-act">Learn</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </section>--}}
    <!-- =========== Call To Action section End ============= -->

{{--    <div class="clearfix"></div>--}}
{{--    <section class="testimonial" id="testimonial">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="main-heading">--}}
{{--                    <p>What Say Our Client</p>--}}
{{--                    <h2>Our Success <span>Stories</span></h2></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div id="client-testimonial-slider" class="owl-carousel">--}}
{{--                    <div class="client-testimonial">--}}
{{--                        <div class="pic"><img src="{{ asset('assets/img/client-1.jpg') }}" alt=""></div>--}}
{{--                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>--}}
{{--                        <h3 class="client-testimonial-title">Lacky Mole</h3>--}}
{{--                        <ul class="client-testimonial-rating">--}}
{{--                            <li class="fa fa-star-o"></li>--}}
{{--                            <li class="fa fa-star-o"></li>--}}
{{--                            <li class="fa fa-star"></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="client-testimonial">--}}
{{--                        <div class="pic"><img src="{{ asset('assets/img/client-4.jpg') }}" alt=""></div>--}}
{{--                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>--}}
{{--                        <h3 class="client-testimonial-title">Karan Wessi</h3>--}}
{{--                        <ul class="client-testimonial-rating">--}}
{{--                            <li class="fa fa-star-o"></li>--}}
{{--                            <li class="fa fa-star"></li>--}}
{{--                            <li class="fa fa-star"></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="client-testimonial">--}}
{{--                        <div class="pic"><img src="{{ asset('assets/img/client-2.jpg') }}" alt=""></div>--}}
{{--                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>--}}
{{--                        <h3 class="client-testimonial-title">Roul Pinchai</h3>--}}
{{--                        <ul class="client-testimonial-rating">--}}
{{--                            <li class="fa fa-star-o"></li>--}}
{{--                            <li class="fa fa-star-o"></li>--}}
{{--                            <li class="fa fa-star"></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="client-testimonial">--}}
{{--                        <div class="pic"><img src="{{ asset('assets/img/client-3.jpg') }}" alt=""></div>--}}
{{--                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>--}}
{{--                        <h3 class="client-testimonial-title">Adam Jinna</h3>--}}
{{--                        <ul class="client-testimonial-rating">--}}
{{--                            <li class="fa fa-star-o"></li>--}}
{{--                            <li class="fa fa-star-o"></li>--}}
{{--                            <li class="fa fa-star"></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}
    <!-- Counter Section Start -->

    <section class="counter">
    <div class="parallax today-on-iwriter" id="parallax-one">
    <div class="parallax-text-container-1">
      <div class="parallax-text-item">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2>Today On iWriter</h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
              <div class="parallax-content-wrapper">
                <div class="today-icon"><img src="{{ asset('assets/img/1.png') }}"></div>
                <div class="counter-item">
                  <div class="stat-number" style="display: inline-block">55</div><span class="timer-2">,</span>
                  <div class="stat-number" style="display: inline-block">15</div>
                  <h5>jobs posted (last 30 days)</h5>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
              <div class="parallax-content-wrapper">
                <div class="today-icon"><img src="{{ asset('assets/img/2.png') }}"></div>
                <div class="counter-item">
                  <div class="stat-number" style="display: inline-block">55</div><span class="timer-2">,</span>
                  <div class="stat-number" style="display: inline-block">15</div>
                  <h5>jobs posted (last 30 days)</h5>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
              <div class="parallax-content-wrapper">
                <div class="today-icon"><img src="{{ asset('assets/img/3.png') }}"></div>
                <div class="counter-item">
                  <div class="stat-number" style="display: inline-block">55</div><span class="timer-2">,</span>
                  <div class="stat-number" style="display: inline-block">15</div>
                  <h5>jobs posted (last 30 days)</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
