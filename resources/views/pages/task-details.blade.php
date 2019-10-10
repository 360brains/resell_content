@extends("layouts.master")

@section("content")
    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url({{ asset('assets/img/banner-10.jpg') }});">
        <div class="container">
            <h1>Task Detail</h1>
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
                        <img src="{{ asset('assets/img/project.png') }}" class="img-responsive" alt="" />
                    </div>
                    <div class="ur-caption">
                        <h4 class="ur-title">{{ $task->name }}</h4>
                        <p class="ur-location"><i class="ti-location-pin mrg-r-5"></i>Available Before {{ $task->deadline }}</p>
                        <span class="ur-designation">{{ $task->category->name }}</span>

                    </div>

                </div>

                <div class="ur-detail-btn">
                    <a href="#" class="btn btn-info full-width"><i class="ti-thumb-up mrg-r-5"></i>Take task</a><br>
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
                        <h2 class="detail-title">Task Description</h2>
                        {!! $task->description !!}
                    </div>

                    <div class="row-bottom">
                        <h2 class="detail-title">Required Level, and Trainings</h2>
                        <p>This task requires user Level {{$task->level->name}}, and the following trainings:</p>
                        <ul class="detail-list">
                            @forelse($task->trainings as $training)
                                <li> {{ $training->name }} - Requires level: {{ $training->levels->name }} of Type {{ $training->types->name }}</li>
                            @empty
                                <h2>No training required.</h2>
                            @endforelse
                        </ul>
                    </div>

                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="full-sidebar-wrap">

                        <!-- Candidate overview -->
                        <div class="sidebar-widgets">

                            <div class="ur-detail-wrap">
                                <div class="ur-detail-wrap-header">
                                    <h4>Project Overview</h4>
                                </div>
                                <div class="ur-detail-wrap-body">
                                    <ul class="ove-detail-list">

                                        <li>
                                            <i class="ti-wallet"></i>
                                            <h5>Offerd Wages</h5>
                                            <span>Rs{{ $task->level->price }}</span>
                                        </li>

                                        <li>
                                            <i class="ti-ink-pen"></i>
                                            <h5>Career Level</h5>
                                            <span>{{$task->level->name}}</span>
                                        </li>

                                        <li>
                                            <i class="ti-home"></i>
                                            <h5>Category</h5>
                                            <span>{{$task->category->name}}</span>
                                        </li>

                                        <li>
                                            <i class="ti-book"></i>
                                            <h5>Task Type</h5>
                                            <span>{{$task->type->name}}</span>
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
                    <h3>Related Tasks</h3>
                </div>
            </div>
            <!--Browse Job In Grid-->
            <div class="row mrg-0">

                @forelse($relatedTasks as $task)
                    <div class="col-md-4 col-sm-6">
                        <div class="grid-view brows-job-list">
                            <div class="brows-job-company-img">
                                <img src="{{ asset('assets/img/project.png') }}" class="img-responsive" alt="" />
                            </div>
                            <div class="brows-job-position">
                                <h3><a href="job-detail.html">{{ $task->name }}</a></h3>
                                <p><span>{{ $task->category->name }}</span></p>
                            </div>
                            <div class="brows-job-type">
                                <span class="full-time">{{ $task->type->name }} Level:{{ $task->level->name }}</span>
                            </div>
                            <ul class="grid-view-caption">
                                <li>
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-clock-o"></i>{{ $task->deadline }}</p>
                                    </div>
                                </li>
                                <li>
                                    <p><span class="brows-job-sallery"><i class="fa fa-money"></i>{{ $task->level->price }}</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                @empty
                    <h2>No related tasks found.</h2>
                @endforelse

            </div>
            <!--/.Browse Job In Grid-->

        </div>
    </section>
    <!-- More Jobs End -->
@endsection
