@extends('user.layouts.master')

@section('content')

    <div class="page-content ">
        <div class="container">
            <div class="bg-white">
                <section class="blog-wrap clearfix custom_sticky_main mt-3 mb-3">
                    <div class="blog-inner sticky">
                        <div class="blog-left">
                            <h1 class="h1">{{$training->name}}</h1>
                            <div class="course_label">
                                <!-- otherwise course is still for sale or user can resume -->
                            </div>
                        </div>

                        @if($trained == 0)
                        <div class="blog-right">
                            <div class="price-blog">
                                @if(!is_null($training->fee))
                                    <strong>
                                        <sup>$</sup>{{ $training->fee }}
                                    </strong>
                                    <button data-toggle="modal" data-target="#buy-training" class="btn btn-auto btn-lg btn-success">
                                        Buy Course
                                    </button>
                                @else
                                    <strong>
                                        FREE
                                    </strong>
                                @endif
                            </div>
                        </div>
                            @elseif($trained == 1)
                                <div class="blog-right">
                                    <div class="price-blog">
                                        <button class="btn btn-outline btn-success">Purchased</button>
                                    </div>
                                </div>
                            @endif

                    </div>
                </section>
                <div class="row">
                    <div class="col-md-8">
                        <video class="border" id="myVideo" width="560" height="315" controls>
                            <source id="myVideoSrc" src="{{ asset('trainings/'.$training->id.'/grb_2.mp4') }}" type="video/mp4">
                            Your browser does not support video.
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
                                        <a>{{ count($training->trainingLists) }} Videos </a>
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
                                        {!! $training->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="course-syllabus">
                            <div class="course-badge-section">
                                <div class="badge-flex">
                                    <div class="course-badge-icon">
                                        <img src="{{ asset($training->badge) }}">
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
                                        @foreach($training->trainingLists as $list)
                                        <li onclick="changeVideo( '{{ asset('trainings/'.$training->id.'/'.$list->name)}}' )" data-type="icon-lesson" class="training-name">
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

                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div><!-- .container -->
    </div>

    <div class="modal fade" id="buy-training" tabindex="-1">
        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
            <div class="modal-content pb-0">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="popup-body">
                    <h4 class="popup-title">Pay For Training</h4>
                    <p class="lead">To receive <strong>{{ $training->name }}</strong> require payment amount of <strong>{{ $training->fee }}</strong>.</p>
                    <p>This amount will be deducted from your balance. Please make sure you have enough money in your balance or you can deposit funds.</p>
                    <form action="{{ route('user.training.buy', $training->id) }}">
                        <div class="pdb-2-5x pdt-1-5x">
                            @csrf
                            <input type="checkbox" name="check" class="input-checkbox input-checkbox-md" id="agree-term-3" >
                            <label for="agree-term-3">I hereby agree to the
                                <strong>Training purchase
                                    aggrement</strong>.
                            </label>
                        </div>
                        <ul class="d-flex flex-wrap align-items-center guttar-30px">
                            <li><button id="buyMembership" class="btn btn-primary">Proceed</button></li>
                        </ul>
                    </form>

                    <div class="gaps-2x"></div>
                    <div class="gaps-1x d-none d-sm-block"></div>
                    <div class="note note-plane note-light mgb-1x"><em class="fas fa-info-circle"></em>
                        <p class="text-light">You will automatically be assigned training after clicking proceed.</p>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>


@endsection
