@extends("user.n-layouts.master")
@section("content")
    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url({{ asset('front/images/bg-image-9.jpg') }});">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">About Us</h3>
            </div>
        </div>
        <div class="breadcrumbs-custom-aside">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li class="active">About Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Welcome to WorkPlace-->
    <section class="section section-md">
        <div class="container">
            <div class="row row-30">
                <div class="col-lg-6 height-fill">
                    <figure class="figure-responsive"><img src="{{ asset('user/images/about-1.png') }}" alt=""/>
                    </figure>
                </div>
                <div class="col-lg-6 height-fill">
                    <article class="box-info">
                        <h3>Welcome to Resell Content</h3>
                        <p>Do you want to make money by writing? Do you like to choose your writing assignments and to write on your very own time? Do you want to work conveniently from home or every other location within the world?</p>
                        <p>At ResellContent, you can pick from hundreds of projects each day. Our authors are free to determine how a lot or little they would like to put in writing. Forget hunting through categorized ads, looking for the next patron, or awaiting payments. At ResellContent, payment is speedy and reliable.</p>
                    </article>
                </div>
            </div>
        </div>
        <div class="container offset-top-1 text-center">
            <h3>Why Choose Us</h3>
            <p>Get Work Done Faster On ResellContent, With Confidence</p>
            <div class="row row-50 row-bordered justify-content-center">
                <div class="col-sm-6 col-md-4">
                    <!-- Box Line-->
                    <article class="box-line">
                        <div class="box-line-icon icon mercury-icon-money"></div>
                        <div class="box-line-divider"></div>
                        <h5 class="box-line-title">Payment Protection, Guaranteed</h5>
                    </article>
                </div>
                <div class="col-sm-6 col-md-4">
                    <!-- Box Line-->
                    <article class="box-line">
                        <div class="box-line-icon icon mercury-icon-partners"></div>
                        <div class="box-line-divider"></div>
                        <h5 class="box-line-title">Know The Price Upfront</h5>
                    </article>
                </div>
                <div class="col-sm-6 col-md-4">
                    <!-- Box Line-->
                    <article class="box-line">
                        <div class="box-line-icon icon mercury-icon-clock"></div>
                        <div class="box-line-divider"></div>
                        <h5 class="box-line-title">24\7 Dedicated and Free Support</h5>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Counters-->
@endsection
