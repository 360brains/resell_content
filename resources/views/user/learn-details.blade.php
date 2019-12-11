@extends('user.layouts.master')
@section('content')
{{--    <div class="page-content ">--}}
{{--        <div class="container">--}}
{{--            <div class="bg-white">--}}
{{--                    <section class="blog-wrap clearfix custom_sticky_main mt-3 mb-3">--}}
{{--                    <div class="blog-inner sticky">--}}
{{--                        <div class="blog-left">--}}
{{--                            <h1 class="h1">{{$training->name}}</h1>--}}
{{--                            <div class="course_label">--}}
{{--                                <!-- otherwise course is still for sale or user can resume -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @if($trained == 0)--}}
{{--                            <div class="blog-right">--}}
{{--                                <div class="price-blog">--}}
{{--                                    @if(!is_null($training->fee))--}}
{{--                                        <strong>--}}
{{--                                            <sup>$</sup>{{ $training->fee }}--}}
{{--                                        </strong>--}}
{{--                                        <button data-toggle="modal" data-target="#buy-training" class="btn btn-auto btn-lg btn-success">--}}
{{--                                            Buy Course--}}
{{--                                        </button>--}}
{{--                                    @else--}}
{{--                                        <strong>--}}
{{--                                            FREE--}}
{{--                                        </strong>--}}
{{--                                    @endif--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @elseif($trained == 1)--}}
{{--                            <div class="blog-right">--}}
{{--                                <div class="price-blog">--}}
{{--                                    <button class="btn btn-outline btn-success">Purchased</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                    </div>--}}
{{--                </section>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-8">--}}
{{--                        <video class="border" id="myVideo" width="560" height="315" controls>--}}
{{--                            <source id="myVideoSrc" src="{{ asset('trainings/'.$training->id.'/grb_2.mp4') }}" type="video/mp4">--}}
{{--                                Your browser does not support video.--}}
{{--                            </video>--}}

{{--                            <div class="user-prof">--}}
{{--                            <a href="/pages/haylee-powers">--}}
{{--                                <span><img--}}
{{--                                        src="https://s3.amazonaws.com/thinkific/instructors/000/202/3711555592153.original.jpg?1555592153"--}}
{{--                                        alt="Haylee Powers"></span>--}}
{{--                                <h3> Haylee Powers </h3>--}}
{{--                                <p>--}}
{{--                                    Haylee is an Emmy award-winning designer specializing in brand strategy and design--}}
{{--                                    for--}}
{{--                                    compelling businesses.--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="des-wrap">--}}
{{--                            <div class="description clearfix">--}}
{{--                                <h2> Course Description </h2>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <img src="https://cdn-themes.thinkific.com/114242/301560/dawX7dssSW6lLx1jeGV6_play-course.png"--}}
{{--                                             alt="play">--}}
{{--                                        <a>{{ count($training->trainingLists) }} Videos </a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <img src="https://cdn-themes.thinkific.com/114242/301560/time-1571417719.png"--}}
{{--                                             alt="time">--}}
{{--                                        <a>2.0 Hours </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="custom-theme">--}}
{{--                                    <div class="fr-view">--}}
{{--                                        {!! $training->description !!}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-4">--}}
{{--                        <div class="course-syllabus">--}}
{{--                            <div class="course-badge-section">--}}
{{--                                <div class="badge-flex">--}}
{{--                                    <div class="course-badge-icon">--}}
{{--                                        <img src="{{ asset($training->badge) }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="course-badge-text">--}}
{{--                                        <h4>This badge will appear on your profile once you complete this course.</h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="course-syllabus-wrapper">--}}
{{--                                <h2> Course Syllabus </h2>--}}
{{--                                <div class="course-list">--}}
{{--                                    <ul>--}}
{{--                                        <!-- icon-lesson -->--}}
{{--                                        @foreach($training->trainingLists as $list)--}}
{{--                                            <li onclick="changeVideo( '{{ asset('trainings/'.$training->id.'/'.$list->name)}}' )" data-type="icon-lesson" class="training-name">--}}
{{--                                                {{ $list->name }}--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                        <!-- icon-lesson -->--}}
{{--                                        <li data-type="icon-lesson">--}}
{{--                                            5. Your Brand Checklist (0:40)--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- .container -->--}}
{{--    </div>--}}




    <section class="learn-details pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                        <video class="border w-100" height="400px" id="myVideo" controls>
                            <source id="myVideoSrc" src="{{ asset('trainings/'.$training->id.'/grb_2.mp4') }}" type="video/mp4">
                            Your browser does not support video.
                        </video>
                </div>
                <div class="col-md-4">
                    @if($trained == 0)
                    <div class="vedio-detail shadow-sm">
                        <ul>
                            <li><i class="fab fa-youtube"></i> <b>Videos:</b> {{ count($training->trainingLists) }}</li>
                            <hr>
                                @if(!is_null($training->fee))
                                <li><i class="fas fa-tag"></i> <b>Fee:</b> Rs. {{ $training->fee }}</li>
                                @else
                                <li><i class="fas fa-tag"></i> <b>Fee:</b> Free</li>
                                @endif

                            <hr>
                            <li><i class="fas fa-certificate"></i> <b>Who can Join:</b> Everyone</li>
                            <hr>
                            <li><i class="fas fa-user"></i> <b>Enrolled Trainees:</b> 11781</li>
                            <hr>
                            <li><i class="far fa-file-video"></i> <b>Video Medium:</b> Urdu&Englosh</li>
                        </ul>
                    </div>
                    @if(!is_null($training->fee))
                        <button class="btn btn-block btn-success mt-4" data-toggle="modal" data-target="#buy-training">Enroll Now</button>
                    @else
                        <strong>
                            FREE
                        </strong>
                    @endif
                @elseif($trained == 1)
                        <div class="p-4 course-syllabus shadow">
                            <ul>
                                <li><i class="fab fa-youtube"></i> <b>Videos:</b> {{ count($training->trainingLists) }}</li>
                            </ul>
                            <div class="course-syllabus-wrapper">
                                <h2> Course Syllabus </h2>
                                <div class="course-list">
                                    <ul>
                                        @foreach($training->trainingLists as $list)
                                            <div class="row pb-3">
                                                <div class="col-md-3 pr-0">
                                                    <div style="width: 100%; height: 40px">
                                                        <img style="object-fit: cover; width: 100%; height: 100%" src="{{ asset($training->avatar) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="learn-dec">
                                                        <li onclick="changeVideo( '{{ asset('trainings/'.$training->id.'/'.$list->name)}}' )" data-type="icon-lesson" class="training-name">
                                                            {{ $list->name }}
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                @endif
                </div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col-md-8">
                    <div class="learn-about">
                        <h3>About</h3>
                        {!! $training->description !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shadow related-course p-4">
                        <h3>Related Courses</h3>
                        @forelse($retatedTrainings as $training)
                            <div class="row pb-3">
                                <div class="col-md-7 pr-0">
                                    <div style="width: 100%; height: 100px">
                                        <img style="object-fit: cover; width: 100%; height: 100%" src="{{ asset($training->avatar) }}" alt="{{ $training->name }}">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="learn-dec">
                                        <p>{{ $training->name }}</p>
                                    </div>
                                    <a href="{{ route('user.learn.details', $training->id) }}" class="btn pr-4 pl-4 btn-xs btn-success">View</a>
                                </div>
                            </div>
                        @empty
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>No related trainings found.</h3>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <ul class="d-flex flex-wrap align-items-center guttar-30px pt-3 pb-3">
                            <li><button id="buyMembership" class="btn btn-primary">Proceed</button></li>
                        </ul>
                    </form>

                    <div class="gaps-2x"></div>
                    <div class="gaps-1x d-none d-sm-block"></div>
                    <div class="note note-plane note-light mgb-1x">
                        <p><em class="fas fa-info-circle"></em> You will automatically be assigned training after clicking proceed.</p>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div>
@endsection
