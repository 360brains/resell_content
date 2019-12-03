@extends("layouts.master")

@section("content")
    <section class="slider position-relative">
        <div class="owl-slider owl-theme">
            <div id="carousel" class="owl-carousel">
                <div class="item info">
                    <img class="" src="{{ asset('assets/img/nav-bg.png')  }}" alt="">
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
                    <img class="" src="{{ asset('assets/img/nav-bg.png')  }}" alt="">
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
                    <img class="" src="{{ asset('assets/img/nav-bg.png')  }}" alt="">
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
                    <img class="" src="{{ asset('assets/img/nav-bg.png')  }}" alt="">
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

    <div class="clearfix"></div>

    <section class="work-done pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Get Work Done Faster On <span>GreatContent</span>, With Confidence</h2>
                    <div class="work-done-dec pt-4">
                        <h4><i class="fas fa-tasks"></i>&nbsp; Payment Protection, Guranteed</h4>
                        <p>Payment is released to the writer once the work get approved.</p>
                        <h4><i class="fas fa-tasks"></i>&nbsp; Know The Price Upfront</h4>
                        <p>Find task within minutes and know exactly what you'll pay. No hourly rates, just a fixed price</p>
                        <h4><i class="fas fa-tasks"></i>&nbsp; We're Here For You 24/7</h4>
                        <p>GreatContent is here for you, anything from answering any questions to resolving any issue, at any time.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="work-done-img">
                        <img class="img-fluid" src="{{ asset('assets/img/work-done.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="market-place pt-3 pb-3 text-center">
        <div class="main-heading">
            <h3>Explore The <span>Marketplace</span></h3>
        </div>
        <div class="container">
            <div class="row pt-5" >
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Educational</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Trending Topics</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Insightful Lists</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Life Hacks</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Trending Topics</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Insightful Lists</p>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Promotional Content</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Industry News</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Common Problems</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Provocative Material</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Industry News</p>
                </div>
                <div class="col-md-2">
                    <img src="{{ asset('assets/img/market-place-img.png') }} " alt="">
                    <div class="about-border"></div>
                    <p>Common Problems</p>
                </div>
            </div>
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="counter">
        <div class="parallax today-on-iwriter" id="parallax-one">
            <div class="parallax-text-container-1">
                <div class="parallax-text-item">
                                <h2>Today On <span>GreatContent</span></h2>
                            <div class="d-flex counter-bg">
                                <div class="container">
                                    <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="parallax-content-wrapper">
                                        <div class="today-icon"><img src="{{ asset('assets/img/counter-img-1.png') }}"></div>
                                        <div class="counter-item">
                                            <div class="stat-number" style="display: inline-block">55</div><span class="timer-2">,</span>
                                            <div class="stat-number" style="display: inline-block">15</div>
                                            <h5><span>jobs posted (last 30 days)</span></h5>
                                        </div>
                                    </div>
                                </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="parallax-content-wrapper">
                                                <div class="today-icon"><img src="{{ asset('assets/img/counter-img-2.png') }}"></div>
                                                <div class="counter-item">
                                                    <div class="stat-number" style="display: inline-block">55</div><span class="timer-2">,</span>
                                                    <div class="stat-number" style="display: inline-block">15</div>
                                                    <h5><span>writers</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="parallax-content-wrapper">
                                        <div class="today-icon"><img src="{{ asset('assets/img/counter-img-3.png') }}"></div>
                                        <div class="counter-item">
                                            <div class="stat-number" style="display: inline-block">55</div><span class="timer-2">,</span>
                                            <div class="stat-number" style="display: inline-block">15</div>
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
    </section>

    <div class="clearfix"></div>

@endsection
