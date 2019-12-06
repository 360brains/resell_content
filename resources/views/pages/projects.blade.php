@extends("layouts.master")

@section("content")
<div class="browse-img" style="background-image:url({{ asset('assets/img/browse-projects.jpg') }});">
        <h1>Browse Projects</h1>
</div>
<section class="projects-content pt-5 pb-5">
    <div class="container">
        <div class="jobs-heading">
            <h3 class="avil-jobs">Available Jobs</h3>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group position-relative">
                    <i class="fas custom-arrow fa-chevron-down"></i>
                    <label for="exampleFormControlSelect1"><h5>Level</h5></label>
                    <select class="form-control custom-inp" id="exampleFormControlSelect1">
                        <option>Basic</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group position-relative">
                    <i class="fas custom-arrow fa-chevron-down"></i>
                    <label for="exampleFormControlSelect1"><h5>Points</h5></label>
                    <select class="form-control custom-inp" id="exampleFormControlSelect1">
                        <option>100-500</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group position-relative">
                    <i class="fas custom-arrow fa-chevron-down"></i>
                    <label for="exampleFormControlSelect1"><h5>Account Type</h5></label>
                    <select class="form-control custom-inp" id="exampleFormControlSelect1">
                        <option>Premium</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group position-relative">
                    <i class="fas custom-arrow fa-chevron-down"></i>
                    <label for="exampleFormControlSelect1"><h5>Type</h5></label>
                    <select class="form-control custom-inp" id="exampleFormControlSelect1">
                        <option>Content Writing</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group position-relative">
                    <i class="fas custom-arrow fa-chevron-down"></i>
                    <label for="exampleFormControlSelect1"><h5>Money</h5></label>
                    <select class="form-control custom-inp" id="exampleFormControlSelect1">
                        <option>Rs.500-1000</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn apply-btn btn-sm btn-outline-success">
                    Apply
                </button>
            </div>
        </div>
        @foreach($projects as $project)
        <div class="project-detail shadow-sm rounded p-4 mb-3">
            <div class="clearfix">
                <div class="project-heading float-left">
                    <h1 class="m-0 ">{{ $project->name }}</h1>
                    <span class="text-success font-weight-bold">{{ $project->type->name }}</span>
                </div>
                <div class="project-price float-right d-flex">
                    <h1 class="m-0 pt-2 font-weight-bold">Rs.{{ $project->price }}</h1>
                    <a data-toggle="modal" data-target="#start-job-{{$project->id}}" href="#">
                        <button class="btn start-job btn-lg btn-success ml-2">
                            Start This Job
                        </button>
                    </a>
                </div>
            </div>
            <hr>
            <div class="project-des">
                <div class="row">
                    <div class="col-md-7">
                        <div class="dec">
                            <p>{!! $project->description !!}</p>
                        </div>
                        <h6 class="font-weight-bold">REQUIRED TRANING</h6>
                        <ul class="d-flex">
                            <li><a href=""><img src="{{ asset('user/images/asset 1.png') }}" alt=""></a></li>
                            <li><a href=""><img src="{{ asset('user/images/asset 2.png') }}" alt=""></a></li>
                            <li><a href=""><img src="{{ asset('user/images/asset 3.png') }}" alt=""></a></li>
                            <li><a href=""><img src="{{ asset('user/images/asset 4.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-4  pl-4">
                                <h6 class="m-0 font-weight-bold">LEVEL</h6>
                                <span class="text-success">{{$project->level->name}}</span>
                                <h6 class="m-0 font-weight-bold pt-4">TIME AWARDED <small>Hours</small></h6>
                                <span class="text-danger">{{ $project->deadline }}</span>
                            </div>
                            <div class="col-md-4 pl-4">
                                <h6 class="m-0 font-weight-bold">CATEGORY</h6>
                                <span class="text-success">{{ $project->category->name }}</span>
                                <h6 class="m-0 font-weight-bold pt-4">NO. OF WORDS</h6>
                                <span class="text-success">{{ $project->words }}</span>
                            </div>
                            <div class="col-md-4 pl-5">
                                <h6 class="m-0 font-weight-bold">POINTS</h6>
                                <span class="text-success">+{{ $project->points }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="modal fade" id="start-job-{{$project->id}}" tabindex="-1">
                <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
                    <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                        <div class="popup-body popup-body-lg">
                            <div class="content-area">
                                <div class="card-head d-flex justify-content-between align-items-center">
                                    <h4 class="card-title pb-2 mb-0">Project Details</h4></div>
                                <div class="gaps-1-5x"></div>
                                <div class="data-details d-md-flex">
                                    <div class="fake-class"><span class="data-details-title">Project Name</span><span class="data-details-info">{{ $project->name }}</span></div>
                                    <div class="ur-detail-btn">
                                        <a href="{{ route('user.tasks.take', $project->id) }}" class="btn btn-info full-width"><i class="ti-thumb-up mrg-r-5"></i>Take a task</a><br>
                                    </div>
                                </div>
                                <div class="gaps-3x"></div>
                                <h6 class="card-sub-title">Project Info</h6>
                                <ul class="data-details-list">
                                    <li>
                                        <div class="data-details-head">Available</div>
                                        <div class="data-details-des"><strong>{{ $project->available }}/{{ $project->quantity }}</strong></div>
                                    </li>
                                    <!-- li -->
                                    <li>
                                        <div class="data-details-head">Offerd Wages</div>
                                        <div class="data-details-des"><strong>Rs{{ $project->price }}</strong></div>
                                    </li>
                                    <!-- li -->
                                    <li>
                                        <div class="data-details-head">Career Level</div>
                                        <div class="data-details-des"><strong>{{$project->level->name}}</strong></div>
                                    </li>
                                    <!-- li -->
                                    <li>
                                        <div class="data-details-head">Category</div>
                                        <div class="data-details-des"><span>{{$project->category->name}}</span></div>
                                    </li>
                                    <!-- li -->
                                    <li>
                                        <div class="data-details-head">Project Type</div>
                                        <div class="data-details-des"><span>{{$project->type->name}}</span> <span></span></div>
                                    </li>
                                </ul>
                                <h6 class="card-sub-title pt-3">Tranings</h6>
                                <ul class="data-details-list">
                                    <li>
                                        <div class="data-details-des">
                                            <ul class="detail-list">
                                                @forelse($project->trainings as $training)
                                                    <li> {{ $training->name }}</li>
                                                @empty
                                                    <h3>No training required.</h3>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <h6 class="card-sub-title pt-3">Project Description</h6>
                                <ul class="data-details-list">
                                    <li>
                                        <div class="data-details-des"><strong>{!! $project->description !!}</strong></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


</section>
    <!-- ========== Begin: Brows job Category End ===============  -->
@endsection
