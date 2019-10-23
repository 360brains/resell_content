@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="creative-box clearfix">
                <div class="row">

                    @forelse($trainings as $training)
                    <div class="col-md-4">
                        <div class="spacing">
                            <a href="{{ route('user.learn.details', $training->id) }}">
                                <div class="border_cource  blog-img-course">
                                    <div class="blog-img">
                                        <img src="{{ url( $training->avatar ) }}"
                                             alt="Training image">
                                        <div class="blog_overlay_new">
                                            <p>learn more<span class="green_dot">.</span></p>
                                        </div>
                                    </div>

                                    <div class="cource_pading">
                                        <h3 class="product_name">{{ $training->name }}
                                        </h3>

                                        <!-- Jon Youshaei -->

                                        <span class="name">Jon Youshaei</span>
                                        <p class="instructor_title">
                                            {{ $training->descriotion }}
                                        </p>

                                        <div class="bottom_fix_cource">
                                            <div class="left_con_cource">

                                            </div>

                                            <div class="right_con_cource">
                                                @if($training->is_paid )
                                                <span><sup>$</sup><strong>{{ $training->fee }}</strong></span>
                                                @else
                                                <span><strong>FREE</strong></span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                        <h2>No Trainings found</h2>
                    @endforelse


                    <div class="col-md-4">
                        <div class="spacing">
                            <a href="/courses/branding-strategy-and-design-for-small-businesses">
                                <div class="border_cource  blog-img-course">
                                    <div class="blog-img">
                                        <img src="https://thinkific-import.s3.amazonaws.com/114242/gkpr2xmcSGe7c4p0tfsQ_New%20course%20Thumbnail%20780x440-min.jpg"
                                             alt="Brand Strategy and Design for Small Businesses">
                                        <div class="blog_overlay_new"
                                             data-url="/courses/branding-strategy-and-design-for-small-businesses">
                                            <p>learn more<span class="green_dot">.</span></p>
                                        </div>
                                    </div>

                                    <div class="cource_pading">
                                        <h3 class="product_name">Brand Strategy and Design for Small Businesses</h3>

                                        <div class="ratting_cource">

                                            <i class="fa fa-star"></i><strong>4.9 </strong> (44)

                                        </div>

                                        <!-- Haylee Powers -->

                                        <span class="name">Haylee Powers</span>
                                        <p class="instructor_title">
                                            Haylee is an Emmy award-winning designer specializing in brand strategy
                                            and
                                            design for compelling businesses.
                                        </p>

                                        <div class="bottom_fix_cource">
                                            <div class="left_con_cource">

                                            </div>

                                            <div class="right_con_cource">

                                                <span><sup>$</sup><strong>40</strong></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="spacing">
                            <a href="/courses/voice-over-for-real-people-complete-freelancing-guide">
                                <div class="border_cource  blog-img-course">
                                    <div class="blog-img">
                                        <img src="https://thinkific-import.s3.amazonaws.com/114242/oo6SYIWRSupGCoT3W6Db_Voice%20over%20780x440-min.jpg"
                                             alt="Voice Over for Real People: Complete Freelancing Guide">
                                        <div class="blog_overlay_new"
                                             data-url="/courses/voice-over-for-real-people-complete-freelancing-guide">
                                            <p>learn more<span class="green_dot">.</span></p>
                                        </div>
                                    </div>

                                    <div class="cource_pading">
                                        <h3 class="product_name">Voice Over for Real People: Complete Freelancing
                                            Guide
                                        </h3>

                                        <div class="ratting_cource">

                                            <i class="fa fa-star"></i><strong>4.7 </strong> (50)

                                        </div>

                                        <!-- Keith  Harris -->

                                        <span class="name">Keith Harris</span>
                                        <p class="instructor_title">
                                            Keith Harris is a Fiverr Pro with over 600 Five Star Reviews.
                                        </p>

                                        <div class="bottom_fix_cource">
                                            <div class="left_con_cource">

                                            </div>

                                            <div class="right_con_cource">

                                                <span><sup>$</sup><strong>94</strong></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="spacing">
                            <a href="/courses/viral-marketing">
                                <div class="border_cource  blog-img-course">
                                    <div class="blog-img">
                                        <img src="https://thinkific-import.s3.amazonaws.com/114242/xtSNSfvTOOHkmfblNmQ0_Viral%20Marketing%20Thumbnai%20780x440.jpg"
                                             alt="Viral Marketing: 7 Secrets to Promote Any Product">
                                        <div class="blog_overlay_new" data-url="/courses/viral-marketing">
                                            <p>learn more<span class="green_dot">.</span></p>
                                        </div>
                                    </div>

                                    <div class="cource_pading">
                                        <h3 class="product_name">Viral Marketing: 7 Secrets to Promote Any Product
                                        </h3>

                                        <div class="ratting_cource">

                                            <i class="fa fa-star"></i><strong>4.9 </strong> (241)

                                        </div>

                                        <!-- Jon Youshaei -->

                                        <span class="name">Jon Youshaei</span>
                                        <p class="instructor_title">
                                            Marketing manager at YouTube, ranked as one of world's top marketers by
                                            Forbes
                                            &amp; Entrepreneur.
                                        </p>

                                        <div class="bottom_fix_cource">
                                            <div class="left_con_cource">

                                            </div>

                                            <div class="right_con_cource">

                                                <span><sup>$</sup><strong>45</strong></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="spacing">
                            <a href="/courses/branding-strategy-and-design-for-small-businesses">
                                <div class="border_cource  blog-img-course">
                                    <div class="blog-img">
                                        <img src="https://thinkific-import.s3.amazonaws.com/114242/gkpr2xmcSGe7c4p0tfsQ_New%20course%20Thumbnail%20780x440-min.jpg"
                                             alt="Brand Strategy and Design for Small Businesses">
                                        <div class="blog_overlay_new"
                                             data-url="/courses/branding-strategy-and-design-for-small-businesses">
                                            <p>learn more<span class="green_dot">.</span></p>
                                        </div>
                                    </div>

                                    <div class="cource_pading">
                                        <h3 class="product_name">Brand Strategy and Design for Small Businesses</h3>

                                        <div class="ratting_cource">

                                            <i class="fa fa-star"></i><strong>4.9 </strong> (44)

                                        </div>

                                        <!-- Haylee Powers -->

                                        <span class="name">Haylee Powers</span>
                                        <p class="instructor_title">
                                            Haylee is an Emmy award-winning designer specializing in brand strategy
                                            and
                                            design for compelling businesses.
                                        </p>

                                        <div class="bottom_fix_cource">
                                            <div class="left_con_cource">

                                            </div>

                                            <div class="right_con_cource">

                                                <span><sup>$</sup><strong>40</strong></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="spacing">
                            <a href="/courses/voice-over-for-real-people-complete-freelancing-guide">
                                <div class="border_cource  blog-img-course">
                                    <div class="blog-img">
                                        <img src="https://thinkific-import.s3.amazonaws.com/114242/oo6SYIWRSupGCoT3W6Db_Voice%20over%20780x440-min.jpg"
                                             alt="Voice Over for Real People: Complete Freelancing Guide">
                                        <div class="blog_overlay_new"
                                             data-url="/courses/voice-over-for-real-people-complete-freelancing-guide">
                                            <p>learn more<span class="green_dot">.</span></p>
                                        </div>
                                    </div>

                                    <div class="cource_pading">
                                        <h3 class="product_name">Voice Over for Real People: Complete Freelancing
                                            Guide
                                        </h3>

                                        <div class="ratting_cource">

                                            <i class="fa fa-star"></i><strong>4.7 </strong> (50)

                                        </div>

                                        <!-- Keith  Harris -->

                                        <span class="name">Keith Harris</span>
                                        <p class="instructor_title">
                                            Keith Harris is a Fiverr Pro with over 600 Five Star Reviews.
                                        </p>

                                        <div class="bottom_fix_cource">
                                            <div class="left_con_cource">

                                            </div>

                                            <div class="right_con_cource">

                                                <span><sup>$</sup><strong>94</strong></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .container -->
    </div

@endsection
