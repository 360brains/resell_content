@extends("layouts.master")

@section("content")
    <section  class="slider position-relative">
            <div class="owl-slider owl-theme">
                <div id="carousel" class="owl-carousel">
                    <div class="item info">
                                            <div class="slider-content">
                                                <h1>
                                                    <i class="fas fa-quote-left"></i>
                                                    Start writing, no metter what. The water does not flow until the faucet is turned on.
                                                    <i class="fas fa-quote-right"></i>
                                                </h1>
                                                <p>&minus;Louis L'Amour</p>
                                            </div>
                    </div>
                    <div class="item info">
                                            <div class="slider-content">
                                                <h1>
                                                    <i class="fas fa-quote-left"></i>
                                                    Start writing, no metter what. The water does not flow until the faucet is turned on.
                                                    <i class="fas fa-quote-right"></i>
                                                </h1>
                                                <p>&minus;Louis L'Amour</p>
                                            </div>
                    </div>
                    <div class="item info">
                                            <div class="slider-content">
                                                <h1>
                                                    <i class="fas fa-quote-left"></i>
                                                    Start writing, no metter what. The water does not flow until the faucet is turned on.
                                                    <i class="fas fa-quote-right"></i>
                                                </h1>
                                                <p>&minus;Louis L'Amour</p>
                                            </div>
                    </div>
                </div>
            </div>
    </section>

    <div style="background-image: url('{{ asset('assets/img/front-banner.png') }}');background-size: cover">
        <h1 style="padding: 240px 0">This is welcome page</h1>
    </div>

    <div class="clearfix"></div>

    <section class="work-done pt-5 pb-5" style="width: 100%; float: left">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Get Work Done Faster On <span>GreatContent</span>, With Confidence</h2>
                    <div class="work-done-dec pt-4">
                        <h4><i class="fas fa-tasks"></i>&nbsp; Payment Protection, Guranteed</h4>
                        <p>Payment is released to the writer once the work get approved.</p>
                        <h4><i class="fas fa-tasks"></i>&nbsp; Know The Price Upfront</h4>
                        <p>Find task within minutes and know exactly what you'll pay. No hourly rates, just a fixed
                            price</p>
                        <h4><i class="fas fa-tasks"></i>&nbsp; We're Here For You 24/7</h4>
                        <p>GreatContent is here for you, anything from answering any questions to resolving any issue,
                            at any time.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-done-img">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/work-done.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <section  class="market-place pt-3 pb-5 text-center">
        <div class="main-heading">
            <h3>Explore The <span>Marketplace</span></h3>
        </div>
        <div class="container">
            <div class="row pt-4">
                @forelse($categories as $category)
                <div class="col-md-3 col-sm-3">
                        <form action="{{ route('pages.projects', $category->id) }}" method="get">
                            @csrf
                            <div class="category-box" data-aos="fade-up">
                                <div class="category-desc">
                                    <div class="category-icon">
                                        <i class="icon-bargraph" aria-hidden="true"></i>
                                        <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                                    </div>
                                    <div class="category-detail category-desc-text">
                                        <div class="about-border"></div>
                                        <h4>
                                            <button type="submit">{{ $category->name }}</button>
                                        </h4>
                                        <input type="hidden" name="category" value="{{ $category->id }}">
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                @empty
                    <h1>No categories Found.</h1>
                @endforelse
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="counter">
        <div class="parallax today-on-iwriter" id="parallax-one">
            <div class="parallax-text-container-1">
                <div class="parallax-text-item">
                    <h2 class="text-center">Today On <span>GreatContent</span></h2>
                    <div class="d-flex counter-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="parallax-content-wrapper">
                                        <div class="clearfix">
                                            <div class="today-icon float-left"><img
                                                    src="{{ asset('assets/img/counter-img-1.png') }}"></div>
                                            <div class="counter-item">
                                                <div>
                                                    <div class="stat-number"
                                                         style="display: inline-block">{{ $totalJobs }}</div>
                                                    <br>
                                                </div>
                                                <h5><span>jobs posted</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="parallax-content-wrapper">
                                        <div class="clearfix">
                                            <div class="today-icon float-left"><img
                                                    src="{{ asset('assets/img/counter-img-3.png') }}"></div>
                                            <div class="counter-item">
                                                <div>
                                                    <div class="stat-number"
                                                         style="display: inline-block">{{ $totalWriters }}</div>
                                                    <br>
                                                </div>
                                                <h5><span>writers</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="parallax-content-wrapper">
                                        <div class="clearfix">
                                            <div class="today-icon float-left"><img class="pt-2 pr-2"
                                                                                    src="{{ asset('assets/img/counter-img-2.png') }}">
                                            </div>
                                            <div class="counter-item float-none">
                                                <div>
                                                    <div class="stat-number"
                                                         style="display: inline-block">{{ $totalWork }}</div>
                                                    <br>
                                                </div>
                                                <h5><span>articles written (till now)</span></h5>
                                            </div>
                                        </div>
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

    <div class="how-it-work pt-2">
        <img src="{{ asset('assets/img/works.png') }}" alt="">
    </div>

    <div class="clearfix"></div>

    <div class="learn pb-2">
        <a href="{{ route('user.learn') }}">
            <img src="{{ asset('assets/img/learn.png') }}" alt="">
        </a>
    </div>
@endsection
