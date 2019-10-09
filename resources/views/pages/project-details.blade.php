@extends("layouts.master")

@section("content")
    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url({{ asset('assets/img/banner-10.jpg') }});">
        <div class="container">
            <h1>Project Detail</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- Candidate Detail Start -->
    <section class="detail-desc">
        <div class="container">

            <div class="ur-detail-wrap top-lay">

                <div class="ur-detail-box">

                    <div class="ur-thumb">
                        <img src="{{ asset('assets/img/com-2.jpg') }}" class="img-responsive" alt="" />
                    </div>
                    <div class="ur-caption">
                        <h4 class="ur-title">{{ $project->name }}</h4>
                        <p class="ur-location"><i class="ti-location-pin mrg-r-5"></i>232, New Sleewar, Canada</p>
                        <span class="ur-designation">{{ $project->category->name }}</span>
                        <div class="rateing">
                            <i class="fa fa-star filled"></i>
                            <i class="fa fa-star filled"></i>
                            <i class="fa fa-star filled"></i>
                            <i class="fa fa-star filled"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>

                </div>

                <div class="ur-detail-btn">
                    <a href="#" class="btn btn-info full-width"><i class="ti-thumb-up mrg-r-5"></i>Take a task</a><br>
                </div>

            </div>

        </div>
    </section>
    <!-- Candidate Detail End -->

    <!-- Candidate full detail Start -->
    <section class="full-detail-description full-detail">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8">

                    <div class="row-bottom">
                        <h2 class="detail-title">Job Description</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>

                    <div class="row-bottom">
                        <h2 class="detail-title">Required Knowledge, Skills, and Abilities</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul class="detail-list">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                        </ul>
                    </div>

                    <div class="row-bottom">
                        <h2 class="detail-title">Education + Experience</h2>
                        <ul class="detail-list">
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                            <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="full-sidebar-wrap">

                        <a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="btn btn-info mrg-bot-15 full-width"><i class="ti-star mrg-r-5"></i>Apply This Job</a>

                        <!-- Candidate overview -->
                        <div class="sidebar-widgets">

                            <div class="ur-detail-wrap">
                                <div class="ur-detail-wrap-header">
                                    <h4>Candidate Overview</h4>
                                </div>
                                <div class="ur-detail-wrap-body">
                                    <ul class="ove-detail-list">

                                        <li>
                                            <i class="ti-wallet"></i>
                                            <h5>Offerd Salary</h5>
                                            <span>£15,000 - £20,000</span>
                                        </li>

                                        <li>
                                            <i class="ti-user"></i>
                                            <h5>Gender</h5>
                                            <span>Male</span>
                                        </li>

                                        <li>
                                            <i class="ti-ink-pen"></i>
                                            <h5>Career Level</h5>
                                            <span>Excutive</span>
                                        </li>

                                        <li>
                                            <i class="ti-home"></i>
                                            <h5>Industry</h5>
                                            <span>Management</span>
                                        </li>

                                        <li>
                                            <i class="ti-shield"></i>
                                            <h5>Experience</h5>
                                            <span>5 Years</span>
                                        </li>

                                        <li>
                                            <i class="ti-book"></i>
                                            <h5>Qualification</h5>
                                            <span>Master Degree</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                        <!-- /Candidate overview -->

                        <!-- Say Hello -->
                        <div class="sidebar-widgets">

                            <div class="ur-detail-wrap">
                                <div class="ur-detail-wrap-header">
                                    <h4>Get In Touch</h4>
                                </div>
                                <div class="ur-detail-wrap-body">
                                    <form action="#">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- /Say Hello -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- company full detail End -->

    <!-- More Jobs -->
    <section class="padd-top-20">
        <div class="container">

            <div class="row mrg-0">
                <div class="col-md-12 col-sm-12">
                    <h3>Related Jobs</h3>
                </div>
            </div>
            <!--Browse Job In Grid-->
            <div class="row mrg-0">

                <div class="col-md-4 col-sm-6">
                    <div class="grid-view brows-job-list">
                        <div class="brows-job-company-img">
                            <img src="{{ asset('assets/img/com-3.jpg') }}" class="img-responsive" alt="" />
                        </div>
                        <div class="brows-job-position">
                            <h3><a href="job-detail.html">Web Developer</a></h3>
                            <p><span>Google</span></p>
                        </div>
                        <div class="job-position">
                            <span class="job-num">5 Position</span>
                        </div>
                        <div class="brows-job-type">
                            <span class="full-time">Full Time</span>
                        </div>
                        <ul class="grid-view-caption">
                            <li>
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                </div>
                            </li>
                            <li>
                                <p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
                            </li>
                        </ul>
                        <span class="tg-themetag tg-featuretag">Premium</span>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="grid-view brows-job-list">
                        <div class="brows-job-company-img">
                            <img src="{{ asset('assets/img/com-2.jpg') }}" class="img-responsive" alt="" />
                        </div>
                        <div class="brows-job-position">
                            <h3><a href="job-detail.html">Web Developer</a></h3>
                            <p><span>Google</span></p>
                        </div>
                        <div class="job-position">
                            <span class="job-num">5 Position</span>
                        </div>
                        <div class="brows-job-type">
                            <span class="part-time">Part Time</span>
                        </div>
                        <ul class="grid-view-caption">
                            <li>
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                </div>
                            </li>
                            <li>
                                <p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="grid-view brows-job-list">
                        <div class="brows-job-company-img">
                            <img src="{{ asset('assets/img/com-1.jpg') }}" class="img-responsive" alt="" />
                        </div>
                        <div class="brows-job-position">
                            <h3><a href="job-detail.html">Web Developer</a></h3>
                            <p><span>Google</span></p>
                        </div>
                        <div class="job-position">
                            <span class="job-num">5 Position</span>
                        </div>
                        <div class="brows-job-type">
                            <span class="freelanc">Freelancer</span>
                        </div>
                        <ul class="grid-view-caption">
                            <li>
                                <div class="brows-job-location">
                                    <p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
                                </div>
                            </li>
                            <li>
                                <p><span class="brows-job-sallery"><i class="fa fa-money"></i>$110 - 200</span></p>
                            </li>
                        </ul>
                        <span class="tg-themetag tg-featuretag">Premium</span>
                    </div>
                </div>

            </div>
            <!--/.Browse Job In Grid-->

        </div>
    </section>
    <!-- More Jobs End -->
@endsection
