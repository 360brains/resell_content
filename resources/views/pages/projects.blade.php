@extends("layouts.master")

@section("content")
    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url({{ asset('assets/img/banner-10.jpg') }});">
        <div class="container">
            <h1>Browse Projects</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- ========== Begin: Brows job Category ===============  -->
    <section class="brows-job-category">
        <div class="container">
            <!-- Company Searrch Filter End -->
            <div class="row extra-mrg">
                <div class="wrap-search-filter">
                    <form>
                        <div class="col-md-3 col-sm-6">
                            <input type="text" class="form-control" placeholder="Location: City, State, Zip">
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <select class="selectpicker form-control" multiple title="All Categories">
                                <option>Information Technology</option>
                                <option>Mechanical</option>
                                <option>Hardware</option>
                            </select>

                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="job-types">
                                <label>
                                    <input type="checkbox" class="full-time check-option checkbox" CHECKED />
                                    Full Time
                                </label>

                                <label>
                                    <input type="checkbox" class="part-time check-option checkbox" />
                                    Part Time
                                </label>

                                <label>
                                    <input type="checkbox" class="freelancer check-option checkbox" />
                                    Freelancer
                                </label>

                                <label>
                                    <input type="checkbox" class="internship check-option checkbox" />
                                    Internship
                                </label>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- Company Searrch Filter End -->

            <!-- Single Job List -->
            @forelse($projects as $project)
                <a href="{{ route('pages.project.details', $project->id) }}">
                    <div class="col-md-4 col-sm-4">
                        <div class="popular-jobs-container">
                            <div class="popular-jobs-box">
                                <div class="popular-jobs-box">
                                    <div class="brows-job-company-img">
                                        <img src="{{ asset('assets/img/project.png') }}" class="img-responsive" alt="" />
                                    </div>
                                    <div class="popular-jobs-box-detail">
                                        <h4>{{ $project->name }}</h4><span class="desination">{{ $project->category->name }}</span></div>
                                </div>
                                <div class="popular-jobs-box-extra">
                                    <ul>
                                        <li>Total: {{ $project->quantity }}</li>
                                        <li>Level: {{ $project->level->name }}</li>
                                        <li class="more-skill bg-primary">{{ $project->level->price }}</li>
                                    </ul>
                                    {{--                                <p class="giveMeEllipsis">{!! $project->description !!} </p>--}}
                                </div>
                            </div>
                            <div class="brows-job-type">
                                <span class="full-time">{{ $project->type->name }}</span>
                            </div>
                            <ul class="grid-view-caption">
                                <li>
                                    <div class="brows-job-location">
                                        <p><i class="fa fa-clock-o"></i>{{ $project->deadline }}</p>
                                    </div>
                                </li>
                                <li>
                                    <p><span class="brows-job-sallery"><i class="fa fa-money"></i>{{ $project->level->price }}</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </a>
            @empty
                No Featured Projects found
        @endforelse
        <!-- Single Job List -->
            <div class="clearfix"></div>


            <!--row-->
            <div class="row">
                <ul class="pagination">
                    {{ $projects->links() }}
                </ul>
            </div>
            <!-- /.row-->
        </div>
    </section>
    <!-- ========== Begin: Brows job Category End ===============  -->
@endsection
