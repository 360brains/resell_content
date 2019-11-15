@extends('user.layouts.master')

@section('content')

    <div class="page-content ">
        <div class="container">
            <div class="bg-white">
                <section class="blog-wrap clearfix custom_sticky_main">
                    <div class="blog-inner sticky">
                        <div class="blog-left">
                            <h1 class="h1">{{$trainings->name}}</h1>
                            <div class="course_label">
                                <!-- otherwise course is still for sale or user can resume -->
                            </div>
                        </div>
                        <div class="blog-right">
                            <div class="price-blog">
                                @if(!is_null($trainings->fee))
                                    <strong>
                                        <sup>$</sup>{{ $trainings->fee }}
                                    </strong>
                                @else
                                    <strong>
                                        FREE
                                    </strong>
                                @endif

                                <a href="/enroll/455029" class="btn btn-auto btn-lg btn-success">Buy Course</a>
                                <!--<a href="/enroll/455029" class="un-view">Unlimited Views</a>-->
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-md-8">
{{--                        <iframe width="560" height="315" src="https://www.youtube.com/embed/EU7PRmCpx-0"></iframe>--}}
                        <video width="560" height="315" controls>
                            <source src="{{asset('/trainings/12/2 learn.mp4')}}" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                        <div class="user-prof">
                            <a href="/pages/haylee-powers">
                                <span><img
                                        src="https://s3.amazonaws.com/thinkific/instructors/000/202/3711555592153.original.jpg?1555592153"
                                        alt="Haylee Powers"></span>
                                <h3> Haylee Powers </h3>
                                <p>
                                    Haylee is an Emmy award-winning designer specializing in brand strategy and design
                                    for
                                    compelling businesses.
                                </p>
                            </a>
                        </div>
                        <div class="des-wrap">
                            <div class="description clearfix">
                                <h2> Course Description </h2>
                                <ul>
                                    <li>
                                        <img src="https://cdn-themes.thinkific.com/114242/301560/dawX7dssSW6lLx1jeGV6_play-course.png"
                                             alt="play">
                                        <a>22 Videos </a>
                                    </li>
                                    <li>
                                        <img src="https://cdn-themes.thinkific.com/114242/301560/time-1571417719.png"
                                             alt="time">
                                        <a>2.0 Hours </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="custom-theme">
                                    <div class="fr-view">
                                        <p>Developing a solid brand makes selling easier. Brand Strategy and Design
                                            communicates your superiority with ease so that you can rise above your
                                            competition. When you differentiate through brand strategy and design, you
                                            create a compelling brand that brings in more profit. This course would be
                                            very
                                            valuable for anyone that wants to learn the key principles of branding,
                                            including business owners, solopreneurs, freelancers, marketing
                                            professionals,
                                            designers or anyone that is interested in understanding branding.</p>
                                        <p>Join Haylee to learn how to take the right steps to begin to build your brand
                                            strategy and design!</p>
                                    </div>
                                </div>
                            </div>
                            <a href="/enroll/455029" class="btn btn-auto btn-lg btn-success mid_cta">Buy Course</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="course-syllabus">
                            <div class="course-badge-section">
                                <div class="badge-flex">
                                    <div class="course-badge-icon">
                                        <img src="https://s3.amazonaws.com/thinkific-import/114242/ocNaEhCQY6Y6ftdmgHtg_Branding%20%281%29.svg"
                                             class="" alt="">
                                    </div>
                                    <div class="course-badge-text">
                                        <h4>This badge will appear on your profile once you complete this course.</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="course-syllabus-wrapper">
                                <h2> Course Syllabus </h2>
                                <div class="course-list">
                                    <ul>
                                        <!-- icon-lesson -->
                                        @foreach($trainings->trainingLists as $list)
                                        <li data-type="icon-lesson" class="training-name" data-link="{{ asset('trainings/'.$trainings->id.'/'.$list->name)}}">
                                            {{$list->name}}
                                        </li>
                                        @endforeach
                                        <!-- icon-lesson -->
{{--                                        <li data-type="icon-lesson">--}}
{{--                                            5. Your Brand Checklist (0:40)--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="related_links_section clearfix related_links_section___8c14a clearfix___8c14a">
                    <div class="container container___8c14a">
                        <div class="row text-center text-center___8c14a row___8c14a">
                            <h2 class="section_heading w-100 w-100___8c14a section_heading___8c14a">Related Courses</h2>
                            <ul class="list-unstyled text-center text-center___8c14a list-unstyled___8c14a">

                                <li>
                                    <a href="/courses/facebook-ads-targeting"
                                       class="related-link regular related-link___8c14a regular___8c14a">Facebook Ads
                                        Targeting</a>
                                </li>

                                <li>
                                    <a href="/courses/viral-marketing"
                                       class="related-link regular related-link___8c14a regular___8c14a">Viral
                                        Marketing Course</a>
                                </li>

                                <li>
                                    <a href="/courses/seo-website-technical-audit"
                                       class="related-link regular related-link___8c14a regular___8c14a">SEO - Website
                                        Technical Audit</a>
                                </li>

                                <li>
                                    <a href="/courses/blog-content-strategy"
                                       class="related-link regular related-link___8c14a regular___8c14a">Blog Content
                                        Strategy</a>
                                </li>

                                <li>
                                    <a href="/courses/google-analytics-fundamentals"
                                       class="related-link regular related-link___8c14a regular___8c14a">Google
                                        Analytics - Fundamentals</a>
                                </li>

                                <li>
                                    <a href="/courses/email-marketing-fundamentals-using-mailchimp"
                                       class="related-link regular related-link___8c14a regular___8c14a">Email
                                        Marketing Fundamentals</a>
                                </li>

                                <li>
                                    <a href="" class="related-link regular related-link___8c14a regular___8c14a">Google
                                        Ads Course</a>
                                </li>

                                <li>
                                    <a href="/courses/lead-generation-with-facebook-ads"
                                       class="related-link regular related-link___8c14a regular___8c14a">Lead
                                        Generation Course</a>
                                </li>

                                <li>
                                    <a href="/courses/symbol-design-for-branding"
                                       class="related-link regular related-link___8c14a regular___8c14a">Symbol Design
                                        Course</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div><!-- .container -->
    </div>

@endsection
