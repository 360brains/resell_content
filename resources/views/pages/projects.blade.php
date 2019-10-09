@extends("layouts.master")

@section("content")
    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url({{ asset('assets/img/banner-10.jpg') }});">
        <div class="container">
            <h1>Browse Jobs</h1>
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
                <div class="item-click">
                    <article>
                        <div class="brows-job-list">
                            <div class="col-md-6 col-sm-6">
                                <div class="item-fl-box">
                                    <div class="brows-job-position">
                                        <h3><a href="job-apply-detail.html">{{ $project->name }}</a></h3>
                                        <p>
                                            <span>{{ $project->category->name }}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>Level: {{ $project->level->name }}</span>
                                            <span class="job-type cl-success bg-trans-success">{{ $project->deadline }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="brows-job-location">
                                    <p></i>{{ $project->type->name }}:  <span class="num-projects"> {{ $project->quantity }}</span> </p>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="brows-job-link">
                                    <a href="job-apply-detail.html" class="btn btn-default">Take Now</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <h1>No Projects found</h1>
        @endforelse
        <!-- Single Job List -->

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
