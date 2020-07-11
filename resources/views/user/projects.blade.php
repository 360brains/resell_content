@extends("user.layouts.master")

@section("content")
    <section class="projects-content pt-5 pb-5">
        <div class="container">
            <div class="jobs-heading">
                <h3 class="avil-jobs">Available Jobs</h3>
                <hr>
            </div>
            <form class="form-horizontal" action="{{ route('user.projects') }}" method="get">
                <div class="row">
                    <div class="col-lg col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group position-relative">
                            <i class="fas custom-arrow fa-chevron-down"></i>
                            <label for="exampleFormControlSelect1"><h5>Level</h5></label>
                            <select name="level" class="form-control custom-inp" id="exampleFormControlSelect1">
                                <option value="">Choose Level</option>
                                @forelse($levels as $level)
                                    @if($level->name != "Zero")
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endif
                                @empty
                                    <option>No Levels found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group position-relative">
                            <i class="fas custom-arrow fa-chevron-down"></i>
                            <label for="exampleFormControlSelect1"><h5>Category</h5></label>
                            <select name="category" class="form-control custom-inp" id="exampleFormControlSelect1">
                                <option value="">Choose Category</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                    <option>No categories found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-lg col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group position-relative">
                            <i class="fas custom-arrow fa-chevron-down"></i>
                            <label for="exampleFormControlSelect1"><h5>Type</h5></label>
                            <select name="type" class="form-control custom-inp" id="exampleFormControlSelect1">
                                <option value="">Choose Type</option>
                                @forelse($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @empty
                                    <option>No types found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 col-xs-12">
                        <div class="form-group position-relative">
                            <i class="fas custom-arrow fa-chevron-down"></i>
                            <label for="exampleFormControlSelect1"><h5>Money</h5></label>
                            <select name="price" class="form-control custom-inp" id="exampleFormControlSelect1">
                                <option value="">Price range</option>
                                <option value="0-100">Rs.0-100</option>
                                <option value="101-200">Rs.101-200</option>
                                <option value="201-500">Rs.201-500</option>
                                <option value="501-1000">Rs.501-1000</option>
                                <option value="1000-more">Rs.1001-More</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-sm-12 col-xs-12">
                        <button type="submit" class="button button-sm mt-4 button-primary" style="width: 100%">
                            Apply
                        </button>
                    </div>
                </div>
            </form>

            @forelse($projects as $project)
                <div class="project-detail shadow-sm rounded p-4 mb-3">
                    <div class="clearfix">
                        <div class="project-heading float-left">
                            <h1 class="m-0 ">{{ $project->name }}</h1>
                            <span class="text-success font-weight-bold">{{ $project->type->name }}</span>
                        </div>
                        <div class="project-price float-right d-flex">
                            <h1 class="m-0 pt-2 font-weight-bold">Rs.{{ floor($project->price) }}</h1>
                            <a data-toggle="modal" data-target="#start-job-{{$project->id}}" href="#">
                                <button class="button button-xs button-primary-outline button-anorak ml-2 mt-1">
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
                                <div class="req-tra">
                                    @if(count($project->trainings) >= 1)
                                        <h6 class="font-weight-bold">REQUIRED TRANING</h6>
                                    @endif
                                    <ul class="d-flex">
                                        @foreach( $project->trainings as $training)
                                            <li class="pr-2"><a href=""><img width="24px" src="{{ asset($training->badge) }}" alt=""></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-4 pl-4 pb-4">
                                        <h6 class="m-0 font-weight-bold">LEVEL</h6>
                                        <span class="text-success">{{$project->level->name}}</span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 pl-4 pb-4">
                                        <h6 class="m-0 font-weight-bold">TIME AWARDED</h6>
                                        <span class="text-danger">{{ $project->deadline }} <small>Hours</small></span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 pl-4 pb-4">
                                        <h6 class="m-0 font-weight-bold">CATEGORY</h6>
                                        <span class="text-success">{{ $project->category->name }}</span>
                                    </div>
                                    @if($project->type->name == 'Content Writing')
                                        <div class="col-md-4 col-sm-4 col-xs-4 pl-4 pb-4">
                                            <h6 class="m-0 font-weight-bold">NO. OF WORDS</h6>
                                            <span class="text-success">{{ $project->words }}</span>
                                        </div>
                                        @elseif($project->type->name == 'Video Making')
                                        <div class="col-md-4 col-sm-4 col-xs-4 pl-4 pb-4">
                                            <h6 class="m-0 font-weight-bold">DURATION</h6>
                                            <span class="text-success">{{ $project->duration }}</span>
                                        </div>
                                    @endif
                                    <div class="col-md-4 col-sm-4 col-xs-4 pl-4 pb-4">
                                        <h6 class="m-0 font-weight-bold">POINTS</h6>
                                        <span class="text-success">+{{ $project->points }}</span>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4 pl-4 pb-4">
                                        <h6 class="m-0 font-weight-bold">Available</h6>
                                        <span class="text-success">{{ $project->available }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="start-job-{{$project->id}}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
                        <div class="modal-content modal-w"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                            <div class="popup-body popup-body-lg">
                                <div class="content-area">
                                    <div class="card-head d-flex justify-content-between align-items-center">
                                        <h4 class="card-title pb-2 mb-0">Project Details</h4></div>
                                    <div class="gaps-1-5x"></div>
                                    <div class="data-details d-md-flex">
                                        <div class="fake-class"><span class="data-details-title">Project Name</span><span class="data-details-info">{{ $project->name }}</span></div>
                                        <form action="{{ route('user.tasks.take', $project->id) }}" id="getTask">
                                            @csrf
                                            <div class="ur-detail-btn">
                                                <button type="submit" class="button button-sm button-primary float-right"><i class="ti-thumb-up mrg-r-5"></i>Take a task</button><br>
                                            </div>
                                        </form>
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
                                    @if(count($project->availableSubDesc) > 0)
                                        <h6 class="card-sub-title pt-3">Project Sub Description <small>(you have to choose one to get the project)</small></h6>
                                        <ul class="data-details-list">
                                            @forelse($project->subDescriptions as $subdesc)
                                                <li>
                                                    <div class="data-details-des"><input required form="getTask" type="radio" name="subDescription" value="{{$subdesc->id}}" id="">{{ $subdesc->text }}</div>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h1>No projects found.</h1>
            @endforelse
        </div>


    </section>
    <!-- ========== Begin: Brows job Category End ===============  -->
@endsection
