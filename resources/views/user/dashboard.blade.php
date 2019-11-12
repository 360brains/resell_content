@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                @if(auth()->user()->writing_points == 0)
                    <div class="col-md-12">
                        <div class="content-area card">
                            <div class="card-innr video-making-card">
                                @forelse(auth()->user()->currentWritingTest as $test)
                                    <div class="card-head d-inline">
                                        <h6 class="d-inline card-title"><srtong>Raise your Level:</srtong></h6>
                                        <small><p class="d-inline">Your current Writing Level is <strong>0</strong>. Take a free test and raise your level to get tasks.</p></small>
                                    </div>
                                    @if($test->pivot->status == 'completed')
                                    <!-- Button trigger modal -->
                                        <button disabled class=" btn btn-sm btn-info float-right">
                                            Writing Test
                                        </button>
                                    @elseif($test->pivot->status == 'started')
                                    <!-- Button trigger modal -->
                                        <a  href="{{ route('user.tests.writing.test') }}" class=" video-making-btn btn btn-sm btn-info float-right">
                                            Writing Test
                                        </a>
                                    @else
                                    <!-- Button trigger modal -->
                                        <a  href="{{ route('user.tests.writing.test') }}" class="video-making-btn btn btn-sm btn-info float-right">
                                            Writing Test
                                        </a>
                                    @endif
                                @empty
                                    <div class="card-head d-inline">
                                        <h6 class="d-inline card-title"><srtong>Raise your Level:</srtong></h6>
                                       <small> <p class="d-inline">Your current Writing Level is <strong>0</strong>. Take a free test and raise your level to get tasks.</p></small>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <a  href="{{ route('user.tests.writing.test') }}" class=" video-making-btn btn btn-sm btn-info float-right">
                                        Writing Test
                                    </a>
                                    <!-- Modal -->
                                @endforelse
                            </div><!-- .card-innr -->
                        </div><!-- .card -->
                    </div>
                @endif

                @if(auth()->user()->video_points == 0)
                    <div class="col-md-12">
                        <div class="content-area card ">
                            <div class="card-innr video-making-card">
                                @forelse(auth()->user()->currentVideoTest as $test)
                                    <div class="card-head d-inline">
                                        <h6 class="d-inline card-title"><srtong>Raise your Level:</srtong></h6>
                                       <small><p class="d-inline">Your current Video Making Level is <strong>0</strong>. Take a free test and raise your level to get tasks.</p></small>
                                    </div>
                                        @if($test->pivot->status == 'completed')
                                        <!-- Button trigger modal -->
                                            <button disabled class=" video-making-btn btn btn-sm btn-info float-right">
                                                Video Making Test
                                            </button>
                                        @elseif($test->pivot->status == 'started')
                                        <!-- Button trigger modal -->
                                            <a  href="{{ route('user.tests.video.test') }}" class=" video-making-btn btn btn-sm btn-info float-right">
                                                Video Making Test
                                            </a>
                                        @else
                                        <!-- Button trigger modal -->
                                            <a  href="{{ route('user.tests.video.test') }}" class=" video-making-btn btn btn-sm btn-info float-right">
                                                Video Making Test
                                            </a>
                                        @endif
                                @empty
                                    <div class="card-head d-inline">
                                        <h6 class="d-inline card-title"><srtong>Raise your Level:</srtong></h6>
                                       <small> <p class="d-inline">Your current Video Making Level is <strong>0</strong>. Take a free test and raise your level to get tasks.</p></small>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <a  href="{{ route('user.tests.video.test') }}" class=" video-making-btn btn btn-sm btn-info float-right">
                                        Video Making Test
                                    </a>
                                    <!-- Modal -->
                                @endforelse
                            </div><!-- .card-innr -->
                        </div><!-- .card -->
                    </div>
                @endif
            </div>


                {{--                    @if(auth()->user()->writing_level == 0 && auth()->user()->video_level == 0)--}}
                {{--                        <div class="col-lg-12">--}}
                {{--                            <div class="content-area card">--}}
                {{--                                <div class="card-innr">--}}
                {{--                                    @if(count(auth()->user()->tests) >= 1)--}}
                {{--                                        @foreach(auth()->user()->tests as $test)--}}
                {{--                                            @if($test->pivot->status == 'completed' && $test->levels->name == 'Zero')--}}
                {{--                                                <h4>Your test is waiting approval. You will be promoted to level 1 if you pass.--}}
                {{--                                                    <small>(You can take test again in case you fail).</small>--}}
                {{--                                                </h4>--}}
                {{--                                            @elseif($test->pivot->status == 'started' && $test->levels->name == 'Zero')--}}
                {{--                                                <div class="card-head d-inline">--}}
                {{--                                                    <h6 class="d-inline card-title">Raise yor Level</h6><br>--}}
                {{--                                                    <p class="d-inline">Your current Level is <strong>0</strong>. Take a free test and raise your level to get tasks.</p>--}}
                {{--                                                </div>--}}
                {{--                                                <!-- Button trigger modal -->--}}
                {{--                                                <button type="button" class=" btn btn-info float-right" data-toggle="modal" data-target="#exampleModalCenter">--}}
                {{--                                                    Free Test--}}
                {{--                                                </button>--}}
                {{--                                                @break--}}
                {{--                                            @elseif($test->pivot->status == 'failed' && $test->levels->name == 'Zero')--}}
                {{--                                                <div class="card-head d-inline">--}}
                {{--                                                    <h6 class="d-inline card-title">Raise yor Level</h6><br>--}}
                {{--                                                    <p class="d-inline">Your current Level is <strong>0</strong>. Take a free test and raise your level to get tasks.</p>--}}
                {{--                                                </div>--}}
                {{--                                                <!-- Button trigger modal -->--}}
                {{--                                                <button type="button" class=" btn btn-info float-right" data-toggle="modal" data-target="#exampleModalCenter">--}}
                {{--                                                    Free Test--}}
                {{--                                                </button>--}}
                {{--                                                @break--}}
                {{--                                            @endif--}}
                {{--                                        @endforeach--}}
                {{--                                    @else--}}
                {{--                                        <div class="card-head d-inline">--}}
                {{--                                            <h6 class="d-inline card-title">Raise yor Level</h6><br>--}}
                {{--                                            <p class="d-inline">Your current Level is <strong>0</strong>. Take a free test and raise your level to get tasks.</p>--}}
                {{--                                        </div>--}}
                {{--                                        <!-- Button trigger modal -->--}}
                {{--                                        <button type="button" class=" btn btn-info float-right" data-toggle="modal" data-target="#exampleModalCenter">--}}
                {{--                                            Free Test--}}
                {{--                                        </button>--}}
                {{--                                        <!-- Modal -->--}}
                {{--                                    @endif--}}
                {{--                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
                {{--                                        <div class="modal-dialog modal-dialog-centered" role="document">--}}
                {{--                                            <div class="modal-content">--}}
                {{--                                                <div class="modal-header">--}}
                {{--                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--                                                        <span aria-hidden="true">&times;</span>--}}
                {{--                                                    </button>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="modal-body">--}}
                {{--                                                    <h3>Chose a test you would like to take.</h3>--}}
                {{--                                                    <small class="text-light">Remember! you can chose from projects of type you have given test of.</small><br><br>--}}

                {{--                                                    <a href="{{ route('user.tests.writing.test') }}" class="btn btn-info btn-block mt-3">Content Writing Test</a>--}}
                {{--                                                    <a href="{{ route('user.tests.video.test') }}" class="btn btn-info btn-block mt-5 mb-5">Video Making Test</a>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div><!-- .card-innr -->--}}
                {{--                            </div><!-- .card -->--}}
                {{--                        </div>--}}
                {{--                    @endif--}}


                <div class="row">
                    <div class="col-lg-4">
                    <div class="token-statistics card card-token height-auto">
                        <div class="card-innr">
                            <div class="token-balance token-balance-with-icon">
                                <div class="token-balance-icon"><img src="{{ asset('user/images/logo-light-sm.png') }}" alt="logo"></div>
                                <div class="token-balance-text">
                                    <h6 class="card-sub-title">Total Earned</h6><span class="lead"> {{ $totalEarned }} <span>Rs</span></span>
                                </div>
                            </div>
                            <div class="token-balance token-balance-s2">
                                <h6 class="card-sub-title">Your Stats</h6>
                                <ul class="token-balance-list">
                                    <li class="token-balance-sub"><span class="lead">{{ count(auth()->user()->tasks) }}</span><span class="sub">Tasks</span></li>
                                    <li class="token-balance-sub"><span class="lead">
                                        <?php $trainingsCount = 0 ?>
                                            @foreach(auth()->user()->trainings as $training)
                                                @if($training->status == 'Completed')
                                                    <?php $trainingsCount = $trainingsCount + 1 ?>
                                                @endif
                                            @endforeach
                                            {{ $trainingsCount ?? '0' }}
                                    </span><span class="sub">Trainings</span></li>
                                    <li class="token-balance-sub"><span class="lead">{{ count($transactions) }}</span><span class="sub">Transactions</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .col -->
                <div class="col-xl-4 col-lg-5">
                    <div class="token-sales card card-full-height">
                        <div class="card-innr">
                            <div class="card-head">
                                <h5 class="card-title">Your Profile</h5>
                            </div>
                            <div class="profile-img float-left">
                                <img class="dashboard-user-img" src="{{ asset(auth()->user()->avatar) }}" alt="">
                            </div>
                            <div class="profile-name float-left pt-3 pl-3">
                                <strong class="name">{{ auth()->user()->name }}</strong>
                                <strong class="text-light">{{ auth()->user()->email }}</strong>
                            </div>
                            <div class="user-data float-left pt-3">
                                <strong class="text-light">From {{ auth()->user()->country }}</strong><br>
                                <strong class="text-light">Member since {{ auth()->user()->created_at }} </strong>
                                <a href="{{route('user.profile')}}" type="button" class="btn btn-xs btn-block btn-info pt-2 mt-5">
                                    My Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .col -->
                <!-- .col -->
                <div class="col-xl-4 col-lg-5">
                    <div class="token-sales card card-full-height pb-3">
                        <div class="card-innr">
                            <div class="card-head">
                                <h4 class="card-title">Current Level Progress</h4>
                            </div>
                            <h5 class="text-light text-uppercase">Content Writing <span class="float-right">{{ auth()->user()->writing_level }}</span></h5>
                            <ul class="progress-info">
                                <li><span>POINTS</span> {{ auth()->user()->writing_points }} </li>
                                <li class="text-right"><span>TOTAL POINTS</span> 100 </li>
                            </ul>
                            <div class="progress-bar">
                                <div class="progress-hcap" data-percent="75" style="width: 75%;">
                                    <small>basic</small>
                                </div>
                                <div class="progress-scap" data-percent="25" style="width: 25%;">

                                </div>

                                <div class="progress-percent" data-percent=" {{ auth()->user()->writing_points }} " style="width: {{ auth()->user()->writing_points }}%;"></div>
                            </div>
                            <h5 class="text-light text-uppercase">Video Making <span class="float-right">{{ auth()->user()->video_level }}</span></h5>
                            <ul class="progress-info">
                                <li><span>POINTS</span> {{ auth()->user()->video_points }} </li>
                                <li class="text-right"><span>TOTAL POINTS</span> 100 </li>
                            </ul>
                            <div class="progress-bar">
                                <div class="progress-hcap" data-percent="75" style="width: 75%;">

                                </div>
                                <div class="progress-scap" data-percent="25" style="width: 25%;">

                                </div>
                                <div class="progress-percent" data-percent=" {{ auth()->user()->video_points }} " style="width: {{ auth()->user()->video_points }}%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .col -->
                <div class="col-xl-8 col-lg-7">
                    <div class="token-transaction card ">
                        <div class="card-innr">
                            <div class="card-head has-aside">
                                <h4 class="card-title">Transaction</h4>
                                <div class="card-opt"><a href="user.transactions" class="link ucap">View ALL <em class="fas fa-angle-right ml-2"></em></a></div>
                            </div>
                            <table class="table tnx-table">
                                <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Amount</th>
                                    <th class="d-none d-sm-table-cell tnx-date">Date</th>
                                    <th class="tnx-type">
                                        <div class="tnx-type-text"></div>
                                    </th>
                                </tr>
                                <!-- tr -->
                                </thead>
                                <!-- thead -->
                                <tbody>
                                @php($i = 1)
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="data-state data-state-approved"></div><span class="lead">{{ $i++ }}</span>
                                            </div>
                                        </td>
                                        <td><span><span class="lead">{{ $transaction->amount }}</span><span class="sub">PKR <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" data-original-title="1 PKR = 0.012 USD"></em></span></span>
                                        </td>
                                        <td class="d-none d-sm-table-cell tnx-date"><span class="sub sub-s2">{{ $transaction->created_at }}</span></td>
                                        <td class="tnx-type"><span class="tnx-type-md badge badge-outline badge-success badge-md">{{ $transaction->status }}</span><span class="tnx-type-sm badge badge-sq badge-outline badge-success badge-md">P</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td rowspan="4">No Transactions Found</td>
                                    </tr>
                                @endforelse
                                <!-- tr -->
                                </tbody>
                                <!-- tbody -->
                            </table>
                            <!-- .table -->
                        </div>
                    </div>
                    <div class="token-sale-graph card ">
                        <div class="card-innr">
                            <div class="card-head has-aside">
                                <h4 class="card-title">Tokens Sale Graph</h4>
                                <div class="card-opt"><a href="#" class="link ucap link-light toggle-tigger toggle-caret">7 Days</a>
                                    <div class="toggle-class dropdown-content">
                                        <ul class="dropdown-list">
                                            <li><a href="#">30 days</a></li>
                                            <li><a href="#">1 years</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chart-tokensale">
                                <canvas id="tknSale"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="token-statistics card membership height-auto ">
                        <div class="card-innr">
                            <div class="token-balance ">
                                <div class="token-balance-text">
                                    <div class="countdown-clock" data-date="2019/04/05">
                                        <div ><span class="countdown-time countdown-time-first">DURATION</span><span class="countdown-text">{{ $membership->duration }} month</span></div>
                                        <div ><span class="countdown-time">PRICE</span><span class="countdown-text">Rs.{{ $membership->price }}</span></div>
                                    </div>
                                </div>
                                <div class="text-center pt-5 pb-5">
                                    <img src="{{ asset('user/images/premium.png') }}" alt="">
                                </div>
                            </div>
{{--                            <form action="{{ route('user.payment') }}" method="get">--}}
                                <button class="btn btn-block btn-dark" data-toggle="modal" data-target="#pay-online">Buy Membership</button>
{{--                            </form>--}}
                            <div>
                                <ul class="membership-benefits">
                                    <li>Get Premium Tasks</li>
                                    <li>Earn Higher Wages</li>
                                    <li>No level Restriction</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-xl-8 col-lg-7">

                    <!-- .card -->
                </div>
            {{--            <div class="col-lg-8">--}}
            {{--                <div class="token-information card card-full-height">--}}
            {{--                    <div class="row no-gutters height-100">--}}
            {{--                        <div class="col-md-6 text-center">--}}
            {{--                            <div class="token-info"><img class="dashboard-user-img" alt="logo-md" src="{{ asset(auth()->user()->avatar) }}">--}}
            {{--                                <div class="gaps-1x"></div>--}}
            {{--                                <h5 class="token-info-sub">{{ auth()->user()->name }}</h5>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-md-6">--}}
            {{--                            <div class="token-info bdr-tl">--}}
            {{--                                <div>--}}
            {{--                                    <ul class="token-info-list">--}}
            {{--                                        <!--Timer divs start--}}
            {{--                                            <div id="one">--}}
            {{--                                            </div>--}}
            {{--                                            Timer divs end-->--}}
            {{--                                            @if(!is_null($currentTask))--}}

            {{--                                                <h4 class="token-info-sub text-light">--}}
            {{--                                                    <input type="hidden" id="count-down" value="{{ $diff}}">--}}
            {{--                                                    <span class="count-down"></span>--}}
            {{--                                                    {{ $currentTask->project->name }}--}}
            {{--                                                </h4>--}}
            {{--                                                <h5 class="token-info-head text-light">--}}
            {{--                                                        {{ date("y-m-d h:i:s", strtotime($currentTask->project->deadline)) }}--}}
            {{--                                                </h5>--}}
            {{--                                            @else--}}
            {{--                                                <h2 class="token-info-sub">No Task Currently</h2>--}}
            {{--                                            @endif--}}

            {{--                                        </ul>--}}
            {{--                                        @if(!is_null($currentTask))--}}

            {{--                                        <h4 class="token-info-sub text-light">--}}
            {{--                                            <input type="hidden" id="count-down" value="{{ $diff}}">--}}
            {{--                                            <span class="count-down"></span>--}}
            {{--                                            {{ $currentTask->project->name }}--}}
            {{--                                        </h4>--}}
            {{--                                        <h5 class="token-info-head text-light">--}}
            {{--                                        </h5>--}}
            {{--                                        @else--}}
            {{--                                        <h2 class="token-info-sub">No Task Currently</h2>--}}
            {{--                                        @endif--}}
            {{--                                    @if(!is_null($currentTask))--}}
            {{--                                    @if( $currentTask->project->type->name == 'Content Writing')--}}
            {{--                                    <form action="{{ route('user.tasks.upload.doc', $currentTask->id) }}" method="post">--}}
            {{--                                        <button type="submit" class="btn btn-primary btn-sm"><em class="fas fa-upload mr-3"></em>Upload Task Doc</button>--}}
            {{--                                    </form>--}}
            {{--                                    @else--}}
            {{--                                    <form action="{{ route('user.tasks.save.progress', $currentTask->id) }}" method="post" enctype="multipart/form-data">--}}
            {{--                                        @csrf--}}
            {{--                                        <input type="file" id="video" name="video">--}}
            {{--                                        <div class="gaps-1x"></div>--}}
            {{--                                        <button type="submit" name="action" value="video" class="btn btn-danger btn-sm"><em class="fas fa-upload mr-3"></em>Upload Task Video</button>--}}
            {{--                                    </form>--}}
            {{--                                    @endif--}}
            {{--                                    @endif--}}
            {{--                                </div>--}}

            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <!-- .card -->--}}
            {{--            </div>--}}
            <!-- .col -->

            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>



    <!-- Modal Start -->
    <div class="modal fade" id="pay-online" tabindex="-1">
        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
            <div class="modal-content pb-0">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="popup-body">
                    <h4 class="popup-title">Pay online For Membership</h4>
                    <p class="lead">To receive <strong>Premium</strong> Membership require payment amount of <strong>{{ $membership->price }}</strong>.</p>
                    <p>You can choose any of following payment method to make your payment. You will be nitified after your payment is varified.</p>
                    <h5 class="mgt-1-5x font-mid">Select payment method:</h5>
                    <ul class="pay-list guttar-20px">
                        <li class="pay-item"><input type="radio" class="pay-check" name="pay-option"
                                                    id="pay-coin"><label class="pay-check-label" for="pay-coin"><img src="images/telenor-pakistan-easypaisa-logo.png"
                                                                                                                     alt="easy-pasia"></label></li>
                        <li class="pay-item"><input type="radio" class="pay-check" name="pay-option"
                                                    id="pay-coinpay"><label class="pay-check-label" for="pay-coinpay"><img
                                    src="images/JazzCash_logo.png" alt=jazz-cash"></label></li>
                        <li class="pay-item"><input type="radio" class="pay-check" name="pay-option"
                                                    id="pay-paypal"><label class="pay-check-label" for="pay-paypal"><img
                                    src="images/Bank-Free-Download-PNG.png" alt="bank"></label></li>
                    </ul><span class="text-light font-italic mgb-2x"><small>* Payment gateway company may charge you a
                            processing fees.</small></span>
                    <div class="pdb-2-5x pdt-1-5x"><input type="checkbox" class="input-checkbox input-checkbox-md"
                                                          id="agree-term-3"><label for="agree-term-3">I hereby agree to the <strong>Membership purchase
                                aggrement</strong>.</label></div>
                    <ul class="d-flex flex-wrap align-items-center guttar-30px">
                        <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#pay-review"
                               class="btn btn-primary"> Process to Pay <em
                                    class="ti ti-arrow-right mgl-2x"></em></a></li>
                        <li class="pdt-1x pdb-1x"><a href="{{ route('user.voucher') }}" class="link link-primary">Make Manual Payment</a></li>
                    </ul>
                    <div class="gaps-2x"></div>
                    <div class="gaps-1x d-none d-sm-block"></div>
                    <div class="note note-plane note-light mgb-1x"><em class="fas fa-info-circle"></em>
                        <p class="text-light">You will automatically redirect for payment after you click on process to pay.</p>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- Modal End -->

@endsection
