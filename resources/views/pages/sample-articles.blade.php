@extends("user.n-layouts.master")
@section("content")
    <section class="section breadcrumbs-custom breadcrumbs-custom-overlay-2">
        <div class="breadcrumbs-custom-main bg-image bg-gray-700" style="background-image: url({{ asset('front/images/bg-image-9.jpg') }});">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">Sample Articles</h3>
            </div>
        </div>
        <div class="breadcrumbs-custom-aside">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ route('pages.home') }}">Home</a></li>
                    <li class="active">Sample Articles</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="section pdf-section section-md bg-gray-100">
        <div class="container">
            <h3 class="text-center">Sample Articles</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="container-img">
                        <img src="{{ asset('front/images/document-1.jpg') }}" alt="Article 1" class="image img-responsive">
                        <div class="overlay">
                            <a href="{{ asset('front/pdf/article_format.pdf') }}" class="icon-img" title="Download PDF" download>
                                <img src="{{ asset('front/images/pdf.svg') }}" alt="Download PDF" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container-img">
                        <img src="{{ asset('front/images/ArticleFormat 4-1.jpg') }}" class="img-responsive image" alt="Article 2" />
                        <div class="overlay">
                            <a href="{{ asset('front/pdf/article_format_1.pdf') }}" class="icon-img" title="Download PDF" download>
                                <img src="{{ asset('front/images/pdf.svg') }}" alt="Download PDF" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container-img">
                        <img src="{{ asset('front/images/2-req.jpg') }}" class="img-responsive image" alt="Article 3" />
                        <div class="overlay">
                            <a href="{{ asset('front/pdf/article_format_2.pdf') }}" class="icon-img" title="Download PDF" download>
                                <img src="{{ asset('front/images/pdf.svg') }}" alt="Download PDF" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container-img">
                        <img src="{{ asset('front/images/3-ar.jpg') }}" class="img-responsive image" alt="Article 4" />
                        <div class="overlay">
                            <a href="{{ asset('front/pdf/article_format_3.pdf') }}" class="icon-img" title="Download PDF" download>
                                <img src="{{ asset('front/images/pdf.svg') }}" alt="Download PDF" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
