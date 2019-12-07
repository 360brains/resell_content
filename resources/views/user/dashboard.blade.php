@extends('user.layouts.master')

@section('content')
    <section class="dashborad-content pt-5 pb-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="slider position-relative pb-2">
                        <div class="owl-slider owl-theme">
                            <div id="carousel" class="owl-carousel">
                                <div class="item info">
                                    <a href="#" data-toggle="modal" data-target="#pay-online">
                                        <img class="" src="{{ asset('user/images/1111.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="item info">
                                    <a href="#" data-toggle="modal" data-target="#pay-online">
                                        <img class="" src="{{ asset('user/images/1111.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="item info">
                                    <a href="#" data-toggle="modal" data-target="#pay-online">
                                        <img class="" src="{{ asset('user/images/1111.png') }}" alt="">
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
                            <h6 class="float-right"><a href="">FREE ACCOUNT</a></h6>
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
                            <a href="{{ route('withdraw.create') }}" class="btn  btn-outline-success">Withdraw </a>
                            <button class="btn  btn-outline-success">Full Account Balance</button>
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
    </section>
@endsection
