@extends("layouts.master")

@section("content")

    <section class="inner-header-title" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <h1>Our Packages</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- pricing Section Start -->
    <section class="pricing">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="main-heading">
                        <p>What we Pay</p>
                        <h2>Rates for <span>Content Writing</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid-slide">
                    @foreach($levels as $level)
                        @if($level->types->name == 'Content Writing')
                            <div class="grid-slide-box">
                                <div class=" style-2">
                                    <div class="pr-table">
                                        <div class="pr-header">
                                            <div class="pr-plan">
                                                <h4>Level: {{ $level->name }}</h4>
                                            </div>
                                            <div class="pr-price">
                                                <h3><sup>PKR</sup>{{ $level->price }}<sub>/100 Words</sub></h3>
                                            </div>
                                        </div>
                                        <div class="pr-features">
                                            <ul>
                                                <li>PKR {{ $level->price/100 }} / Word</li>
                                                <li>PKR {{ $level->price }} / 100 Words</li>
                                                <li>PKR {{ $level->price*5 }} / 500 Words</li>
                                                <li>PKR {{ $level->price*10 }} / 1k Words</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="pricing">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="main-heading">
                        <p>What we Pay</p>
                        <h2>Rates for <span>Video Making</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="grid-slide">
                    @foreach($levels as $level)
                        @if($level->types->name == 'Video Making')
                            <div class="grid-slide-box">
                                <div class=" style-2">
                                    <div class="pr-table">
                                        <div class="pr-header">
                                            <div class="pr-plan">
                                                <h4>Level: {{ $level->name }}</h4>
                                            </div>
                                            <div class="pr-price">
                                                <h3><sup>PKR</sup>{{ $level->price }}<sub>/100 Words</sub></h3>
                                            </div>
                                        </div>
                                        <div class="pr-features">
                                            <ul>
                                                <li>PKR {{ $level->price/100 }} / Word</li>
                                                <li>PKR {{ $level->price }} / 100 Words</li>
                                                <li>PKR {{ $level->price*5 }} / 500 Words</li>
                                                <li>PKR {{ $level->price*10 }} / 1k Words</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
