@extends("layouts.master")

@section("content")
    <section class="slide-banner scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
        <div class="slideshow-container">
            <div class="slideshow-item">
                <div class="bg" data-bg="assets/img/banner-3.jpg"></div>
            </div>
            <div class="slideshow-item">
                <div class="bg" data-bg="assets/img/banner-6.jpg"></div>
            </div>
            <div class="slideshow-item">
                <div class="bg" data-bg="assets/img/banner-5.jpg"></div>
            </div>
            <div class="slideshow-item">
                <div class="bg" data-bg="assets/img/banner-2.jpg"></div>
            </div>
        </div>
        <div class="overlay"></div>
        <div class="hero-section-wrap fl-wrap">
            <div class="container">
                <div class="intro-item fl-wrap">
                    <div class="caption text-center cl-white">
                        <h2>Discover 7412+ Jobs Here</h2>
                        <p>Expolore top rated tours, hotels and restaurants around the world</p>
                    </div>
                    <form class="form-horizontal">
                        <div class="col-md-4 no-padd">
                            <div class="input-group">
                                <input type="text" class="form-control br-1" id="joblist" placeholder="Skills, Designations, Companies"> </div>
                        </div>
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <input type="text" class="form-control br-1" id="location" placeholder="Search By Location.."> </div>
                        </div>
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select id="choose-city" class="form-control">
                                    <option>Choose City</option>
                                    <option>Chandigarh</option>
                                    <option>London</option>
                                    <option>England</option>
                                    <option>Pratapcity</option>
                                    <option>Ukrain</option>
                                    <option>Wilangana</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 no-padd">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary full-width">Search Job</button>
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
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-bargraph" aria-hidden="true"></i><i class="icon-bargraph abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Accounting & Finance</a></h4>
                                <p>122 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-tools-2" aria-hidden="true"></i><i class="icon-tools-2 abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Automotive Jobs</a></h4>
                                <p>155 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-briefcase" aria-hidden="true"></i><i class="icon-briefcase abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Business</a></h4>
                                <p>300 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-edit" aria-hidden="true"></i><i class="icon-edit abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Education Training</a></h4>
                                <p>80 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-heart" aria-hidden="true"></i><i class="icon-heart abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Healthcare</a></h4>
                                <p>120 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-wine" aria-hidden="true"></i><i class="icon-wine abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Restaurant & Food</a></h4>
                                <p>78 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-map" aria-hidden="true"></i><i class="icon-map abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Transportation</a></h4>
                                <p>90 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="category-box" data-aos="fade-up">
                        <div class="category-desc">
                            <div class="category-icon"><i class="icon-desktop" aria-hidden="true"></i><i class="icon-desktop abs-icon" aria-hidden="true"></i></div>
                            <div class="category-detail category-desc-text">
                                <h4> <a href="browse-jobs-grid.html">Telecommunications</a></h4>
                                <p>210 Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="video-sec dark" id="video" style="background-image:url(assets/img/banner-10.jpg);">
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
                        <p>Most View Jobs</p>
                        <h2>Hot & Featured <span>Jobs</span></h2></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="popular-jobs-container">
                        <div class="popular-jobs-box"><span class="popular-jobs-status bg-success">hourly</span>
                            <h4 class="flc-rate">$17/hr</h4>
                            <div class="popular-jobs-box">
                                <div class="popular-jobs-box-detail">
                                    <h4>Google Inc</h4><span class="desination">Software Designer</span></div>
                            </div>
                            <div class="popular-jobs-box-extra">
                                <ul>
                                    <li>Php</li>
                                    <li>Android</li>
                                    <li>Html</li>
                                    <li class="more-skill bg-primary">+3</li>
                                </ul>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                            </div>
                        </div><a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a></div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="popular-jobs-container">
                        <div class="popular-jobs-box"><span class="popular-jobs-status bg-warning">Monthly</span>
                            <h4 class="flc-rate">$570/Mo</h4>
                            <div class="popular-jobs-box">
                                <div class="popular-jobs-box-detail">
                                    <h4>Duff Beer</h4><span class="desination">Marketting</span></div>
                            </div>
                            <div class="popular-jobs-box-extra">
                                <ul>
                                    <li>Php</li>
                                    <li>Android</li>
                                    <li>Html</li>
                                    <li class="more-skill bg-primary">+3</li>
                                </ul>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                            </div>
                        </div><a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a></div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="popular-jobs-container">
                        <div class="popular-jobs-box"><span class="popular-jobs-status bg-info">Weekly</span>
                            <h4 class="flc-rate">$200/We</h4>
                            <div class="popular-jobs-box">
                                <div class="popular-jobs-box-detail">
                                    <h4>Cyberdyne Systems</h4><span class="desination">Human Resource</span></div>
                            </div>
                            <div class="popular-jobs-box-extra">
                                <ul>
                                    <li>Php</li>
                                    <li>Android</li>
                                    <li>Html</li>
                                    <li class="more-skill bg-primary">+3</li>
                                </ul>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                            </div>
                        </div><a href="new-job-detail.html" class="btn btn-popular-jobs bt-1">View Detail</a></div>
                </div>
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
                        <div class="pic"><img src="assets/img/client-1.jpg" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>
                        <h3 class="client-testimonial-title">Lacky Mole</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="assets/img/client-4.jpg" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>
                        <h3 class="client-testimonial-title">Karan Wessi</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="assets/img/client-2.jpg" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.</p>
                        <h3 class="client-testimonial-title">Roul Pinchai</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="assets/img/client-3.jpg" alt=""></div>
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
                    <h2>We found 477 matches jobs, you are watching 7 to 27</h2></div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Single Job List -->
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-company-img">
                                            <a href="job-detail.html"><img src="assets/img/com-1.jpg" class="img-responsive" alt="" /></a>
                                        </div>
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">Digital Marketing Manager</a></h3>
                                            <p>
                                                <span>Autodesk</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$750 - 800</span>
                                                <span class="job-type cl-success bg-trans-success">Full Time</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                            <span class="tg-themetag tg-featuretag">Premium</span>
                        </article>
                    </div>

                    <!-- Single Job List -->
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-company-img">
                                            <a href="job-detail.html"><img src="assets/img/com-2.jpg" class="img-responsive" alt="" /></a>
                                        </div>
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">Compensation Analyst</a></h3>
                                            <p>
                                                <span>Google</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$810 - 900</span>
                                                <span class="job-type bg-trans-warning cl-warning">Part Time</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Single Job List -->
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-company-img">
                                            <a href="job-detail.html"><img src="assets/img/com-3.jpg" class="img-responsive" alt="" /></a>
                                        </div>
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">Investment Banker</a></h3>
                                            <p>
                                                <span>Honda</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$800 - 910</span>
                                                <span class="job-type bg-trans-primary cl-primary">Freelancer</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                            <span class="tg-themetag tg-featuretag">Premium</span>
                        </article>
                    </div>

                    <!-- Single Job List -->
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-company-img">
                                            <a href="job-detail.html"><img src="assets/img/com-3.jpg" class="img-responsive" alt="" /></a>
                                        </div>
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">Financial Analyst</a></h3>
                                            <p>
                                                <span>Microsoft</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$580 - 600</span>
                                                <span class="job-type bg-trans-success cl-success">Full Time</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Single Job List -->
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-company-img">
                                            <a href="job-detail.html"><img src="assets/img/com-4.jpg" class="img-responsive" alt="" /></a>
                                        </div>
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">Service Representative</a></h3>
                                            <p>
                                                <span>Autodesk</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$800 - 900</span>
                                                <span class="job-type bg-trans-denger cl-danger">Enternship</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                            <span class="tg-themetag tg-featuretag">Premium</span>
                        </article>
                    </div>

                    <!-- Single Job List -->
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-company-img">
                                            <a href="job-detail.html"><img src="assets/img/com-5.jpg" class="img-responsive" alt="" /></a>
                                        </div>
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">Chief Executive Officer</a></h3>
                                            <p>
                                                <span>Google</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$510 - 700</span>
                                                <span class="job-type bg-trans-success cl-success">Full Time</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Single Job List -->
                    <div class="item-click">
                        <article>
                            <div class="brows-job-list">
                                <div class="col-md-6 col-sm-6">
                                    <div class="item-fl-box">
                                        <div class="brows-job-company-img">
                                            <a href="job-detail.html"><img src="assets/img/com-7.jpg" class="img-responsive" alt="" /></a>
                                        </div>
                                        <div class="brows-job-position">
                                            <h3><a href="job-apply-detail.html">Administrative Manager</a></h3>
                                            <p>
                                                <span>Honda</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$700 - 800</span>
                                                <span class="job-type bg-trans-warning cl-warning">Part Time</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="brows-job-link">
                                        <a href="job-apply-detail.html" class="btn btn-default">Apply Now</a>
                                    </div>
                                </div>
                            </div>
                            <span class="tg-themetag tg-featuretag">Premium</span>
                        </article>
                    </div>

                </div>
            </div>
            <div class="row">
                <ul class="pagination">
                    <li><a href="#"><i class="ti-arrow-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="ti-arrow-right"></i></a></li>
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
