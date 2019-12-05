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
                    <a data-toggle="modal" data-target="#start-job" href="#">
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
                        <p>{!! $project->description !!}</p>
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
                                <h6 class="m-0 font-weight-bold pt-4">TIME AWARDED</h6>
                                <span class="text-danger">{{ $project->deadline }}</span>
                            </div>
                            <div class="col-md-4 pl-4">
                                <h6 class="m-0 font-weight-bold">CATEGORY</h6>
                                <span class="text-success">{{ $project->category->name }}</span>
                                <h6 class="m-0 font-weight-bold pt-4">NO. OF WORDS</h6>
                                <span class="text-success">978</span>
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
            @endforeach
    </div>

    <div class="modal fade" id="start-job" tabindex="-1">
        <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
            <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="popup-body popup-body-lg">
                    <div class="content-area">
                        <div class="card-head d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Transaction Details</h4></div>
                        <div class="gaps-1-5x"></div>
                        <div class="data-details d-md-flex">
                            <div class="fake-class"><span class="data-details-title">Tranx Date</span><span class="data-details-info"></span></div>
                            <div class="fake-class"><span class="data-details-title">Tranx Status</span><span class="badge badge-success ucap"></span></div>
                            <div class="fake-class"><span class="data-details-title">Tranx Approved Note</span><span class="data-details-info">By <strong>Admin</strong> </span></div>
                            <div class="ur-detail-btn">
                                <a href="{{ route('user.tasks.take', $project->id) }}" class="btn btn-info full-width"><i class="ti-thumb-up mrg-r-5"></i>Take a task</a><br>
                            </div>
                        </div>
                        <div class="gaps-3x"></div>
                        <h6 class="card-sub-title">Transaction Info</h6>
                        <ul class="data-details-list">
                            <li>
                                <div class="data-details-head">Transaction Type</div>
                                <div class="data-details-des"><strong></strong></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Payment Getway</div>
                                <div class="data-details-des"><strong>Ethereum <small>- Offline Payment</small></strong></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Deposit From</div>
                                <div class="data-details-des"><strong>0xa87d264f935920005810653734156d3342d5c385</strong></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Tx Hash</div>
                                <div class="data-details-des"><span>Tx156d3342d5c87d264f9359200xa058106537340385c87d264f93</span> <span></span></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Deposit To</div>
                                <div class="data-details-des"><span>0xa058106537340385156d3342d5c87d264f935920</span> <span></span></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Details</div>
                                <div class="data-details-des"> </div>
                            </li>
                            <!-- li -->
                        </ul>
                        <!-- .data-details -->
                        <div class="gaps-3x"></div>
                        <h6 class="card-sub-title"></h6>
                        <ul class="data-details-list">
                            <li>
                                <div class="data-details-head"></div>
                                <div class="data-details-des"><strong>
                                    </strong></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Contribution</div>
                                <div class="data-details-des"><span><strong>1.000 ETH</strong> <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 ETH = 100 TWZ"></em></span><span><em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="1 ETH = 100 TWZ"></em> $2540.65</span></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Tokens Added To</div>
                                <div class="data-details-des"><strong>UD1020001 <small>- infoicox@gmail..com</small></strong></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Token (T)</div>
                                <div class="data-details-des"><span>4,780.00</span><span>(4780 * 1)</span></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Bonus Tokens (B)</div>
                                <div class="data-details-des"><span>956.00</span><span>(956 * 1)</span></div>
                            </li>
                            <!-- li -->
                            <li>
                                <div class="data-details-head">Total Amount</div>
                                <div class="data-details-des"><span><strong></strong></span><span>(T+B)</span></div>
                            </li>
                            <!-- li -->
                        </ul>
                        <!-- .data-details -->
                    </div>
                    <!-- .card -->
                </div>
            </div>
            <!-- .modal-content -->
        </div>
        <!-- .modal-dialog -->
    </div>

</section>
    <!-- ========== Begin: Brows job Category End ===============  -->
@endsection
