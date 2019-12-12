@extends('user.layouts.master')

@section('content')
    <section class="dashborad-content pt-5 pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="slider position-relative pb-2">
                        <div class="owl-slider owl-theme">
                            <div id="carousel" class="owl-carousel">
                            @if(is_null($currentMembership))
                                <div class="item info">
                                    <a href="#" data-toggle="modal" data-target="#pay-online">
                                        <img class="" src="{{ asset('user/images/1111.png') }}" alt="">
                                    </a>
                                </div>
                            @endif
                                <div class="item info">
                                    <a href="#">
                                        <img class="" src="{{ asset('user/images/WEB-BANNER-1-3.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="recent-projects mt-4 shadow rounded">
                        <div class="clearfix">
                            <strong><h5 class="float-left">RECENT PROJECTS</h5></strong>
                            <div class="dropdown float-right">
                                <button class="btn btn-sm btn-outline-success dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    Newest
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
{{--                                    <a class="dropdown-item" href="#">Newest</a>--}}
{{--                                    <a class="dropdown-item" href="#">Completed</a>--}}
{{--                                    <a class="dropdown-item" href="#">Delivered</a>--}}
{{--                                    <a class="dropdown-item" href="#">Undelivered</a>--}}
                                </div>
                            </div>
                        </div>
                        <div class=" table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th>JOB TITLE</th>
                                    <th>POINTS</th>
                                    <th>DEADLINE</th>
                                    <th>PRICE</th>
                                    <th>STATUS</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @forelse($tasks as $task)
                                    <tr>
                                        <td>{{ $task->project->name  }}</td>
                                        <td>{{ $task->project->points }}</td>
                                        <td>{{ date('d-m-y h:i', strtotime($task->deadline)) }}</td>
                                        <td>{{ $task->project->price }}</td>
                                        <td>{{ $task->status }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Tasks Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="profile shadow rounded">
                        <div class="clearfix">
                            <h6 class="float-left">Your Profile</h6>
                            @if(!is_null($currentMembership) && $currentMembership->name == 'premium')
                                <h6 class="float-right"><a href="">Premium <small><br>{{ date('Y/m/d', strtotime($currentMembership->pivot->deadline)) }}</small></a></h6>
                            @else
                                <h6 class="float-right"><a href="">FREE ACCOUNT</a></h6>
                            @endif
                        </div>
                        <div class="profile-img pt-2 text-center">
                            <img src="{{ url(auth()->user()->avatar) }}" alt="">
                            <h5 class="pt-2">{{ auth()->user()->name }}</h5>
                        </div>
                        <div class="profile-dec pt-3">
                            <h6>CONTENT WRITING <span
                                    class="badge badge-success">{{ auth()->user()->writing_level }}</span></h6>
                            <div class="clearfix">
                                <p class="float-left m-0">Total Writings</p>
                                <h6 class="float-right">{{ $totalWritingTasks }}</h6>
                            </div>
                            <div class="clearfix">
                                <p class="float-left pr-3">Points Earned</p>
                                <div class="progress d-inline-flex" style="height: 5px; width: 165px;">
                                    <div class="progress-bar bg-success"
                                         data-percent=" {{ auth()->user()->writing_points }}" role="progressbar"
                                         style="width: 25%;"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h6 class="float-right">{{ auth()->user()->writing_points }}</h6>
                            </div>
                            <h6 class="pt-2">VIDEO CONTENT <span
                                    class="badge badge-success">{{ auth()->user()->video_level }}</span></h6>
                            <div class="clearfix">
                                <p class="float-left m-0">Total Videos</p>
                                <h6 class="float-right">{{ $totalVideoTasks }}</h6>
                            </div>
                            <div class="clearfix">
                                <p class="float-left pr-3">Points Earned</p>
                                <div class="progress d-inline-flex" style="height: 5px; width: 165px;">
                                    <div class="progress-bar bg-success"
                                         data-percent=" {{ auth()->user()->video_points }}" role="progressbar"
                                         style="width: 25%;"
                                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <h6 class="float-right">{{ auth()->user()->video_points }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="account mt-4 shadow rounded">
                        <h5>Account Balance</h5>
                        <h1 class="acc-blnc">Rs.{{ floor(auth()->user()->balance) }}</h1>
                        <p>This Month: <span><b>Rs.5400</b></span> This Year: <span><b>Rs.5400</b></span></p>
                        <div class="pt-4">
                            <div class="clearfix">
                                <a href="{{ route('withdraw.create') }}" class="btn float-left btn-outline-success">Withdraw </a>
                                <a href="#" data-toggle="modal" data-target="#deposit" class="btn float-right btn-outline-success">Deposit</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pay-online" tabindex="-1">
            <div class="modal-dialog modal-dialog-md modal-dialog-centered">
                <div class="modal-content pb-0">
                    <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em
                            class="ti ti-close"></em></a>
                    <div class="popup-body">
                        <h4 class="popup-title">Pay For Membership</h4>
                        <p class="lead">To receive <strong>Premium</strong> Membership require payment amount of
                            <strong>{{ $membership->price }}</strong>.</p>
                        <p>This amount will be deducted from your balance. Please make sure you have enough money in
                            your balance or you can deposit funds.</p>
                        <form action="{{ route('user.memberships.buy', $membership->id) }}">
                            <div class="pdb-2-5x pdt-1-5x pt-3 pb-3">
                                @csrf
                                <input type="checkbox" name="check" class="input-checkbox input-checkbox-md"
                                       id="agree-term-3">
                                <label for="agree-term-3">I hereby agree to the
                                    <strong>Membership purchase
                                        aggrement</strong>.
                                </label>
                            </div>
                            <ul class="d-flex flex-wrap align-items-center guttar-30px mt-2 mb-2">
                                <li>
                                    <button id="buyMembership" class="btn btn-primary">Proceed</button>
                                </li>
                            </ul>
                        </form>

                        <div class="gaps-2x"></div>
                        <div class="gaps-1x d-none d-sm-block"></div>
                        <div class="note note-plane note-light mgb-1x pt-3"><em class="fas fa-info-circle"></em>
                            <p class="d-inline">You will automatically get membership after clicking process to pay.</p>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>

        <div class="modal fade" id="deposit" tabindex="-1">
            <div class="modal-dialog modal-dialog-md modal-dialog-centered">
                <div class="modal-content pb-0">
                    <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                    <div class="popup-body">
                        <h4 class="popup-title">Choose method to deposit funds</h4>
                        <p>You can choose any of following payment method. Deposited funds will be added to your balance as soon as it is approved by the admin.</p>
                        <h5 class="mgt-1-5x font-mid">Select payment method:</h5>
                        <form action="{{ route('user.deposit.funds') }}" method="get">
                            @csrf
                            <ul class="pay-list guttar-20px">
                                <li class="pay-item">
                                    <input type="radio" class="pay-check" name="option" value="easypaisa" id="easypaisa">
                                    <label class="pay-check-label" for="easypaisa"><img src="images/telenor-pakistan-easypaisa-logo.png" alt="pay-logo"></label>
                                </li>
                                <li class="pay-item">
                                    <input type="radio" class="pay-check" name="option" value="jazzcash" id="jazzcash">
                                    <label class="pay-check-label" for="jazzcash"><img src="images/JazzCash_logo.png" alt="pay-logo"></label>
                                </li>
                                <li class="pay-item">
                                    <input type="radio" class="pay-check" name="option" value="bank" id="bank">
                                    <label class="pay-check-label" for="bank"><img src="images//Bank-Free-Download-PNG.png" alt="pay-logo"></label>
                                </li>
                            </ul>
                            {{--                    <div class="pdb-2-5x pdt-1-5x">--}}
                            {{--                        <input type="checkbox" class="input-checkbox input-checkbox-md" id="agree-term-3">--}}
                            {{--                        <label for="agree-term-3">I hereby agree to the <strong>Membership purchase aggrement</strong>.</label>--}}
                            {{--                    </div>--}}
                            <ul class="d-flex flex-wrap align-items-center guttar-30px">
                                <li><button class="btn btn-primary"> Process to Pay <em class="ti ti-arrow-right mgl-2x"></em></button>
                                </li>
                                <li class="pdt-1x pdb-1x pl-2"><a href="{{ route('user.voucher') }}" class="link link-primary">Make Manual Payment</a></li>
                            </ul>
                        </form>

                        <div class="gaps-2x"></div>
                        <div class="gaps-1x d-none d-sm-block"></div>
                        <div class="note note-plane note-light mgb-1x">
                            <p><em class="fas fa-info-circle"></em> You will automatically redirect for payment after you click on process to pay.</p>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- Modal End -->
    </section>
@endsection
