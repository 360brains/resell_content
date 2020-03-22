@extends("user.n-layouts.master")
@section("content")
    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url({{ asset('front/images/bg-image-9.jpg') }});">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">How It Work</h3>
            </div>
        </div>
        <div class="breadcrumbs-custom-aside">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="">Home</a></li>
                    <li class="active">How It Work</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="pt-5 pb-5 how-it-works">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('front/images/how.png') }}" class="img-responsive" alt="work" />
                </div>
            </div>
        </div>
    </section>
@endsection
