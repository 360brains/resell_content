@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
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
                <div class="col-lg-8">
                    <div class="token-information card card-full-height">
                        <div class="row no-gutters height-100">
                            <div class="col-md-6 text-center">
                                <div class="token-info"><img class="dashboard-user-img" alt="logo-md" src="{{ asset(auth()->user()->avatar) }}">
                                    <div class="gaps-1x"></div>
                                    <h5 class="token-info-sub">{{ auth()->user()->name }}</h5>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="token-info bdr-tl">
                                    <div>
                                        <ul class="token-info-list">
                                            <!--Timer divs start
                                            <div id="one">
                                            </div>
                                            Timer divs end-->
                                            @if(!is_null($currentTask))

                                                <h4 class="token-info-sub text-light">
                                                    <input type="hidden" id="count-down" value="{{$diff}}">
                                                    <span class="count-down"></span>
                                                    {{ $currentTask->project->name }}
                                                </h4>
                                                <h5 class="token-info-head text-light">
                                                        {{ $diff->format("%a day/s, %h hour/s Left") }}
                                                </h5>
                                            @else
                                                <h5 class="token-info-sub">No Task Currently</h5>
                                            @endif

                                        </ul>
                                        @if(!is_null($currentTask))
                                            @if( $currentTask->project->type->name == 'Content Writing')
                                                <form action="{{ route('user.tasks.upload.doc', $currentTask->id) }}" method="post">
                                                    <button type="submit" class="btn btn-primary btn-sm"><em class="fas fa-upload mr-3"></em>Upload Task Doc</button>
                                                </form>
                                            @else
                                                <form action="{{ route('user.tasks.save.progress', $currentTask->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="file" id="video" name="video">
                                                    <div class="gaps-1x"></div>
                                                    <button type="submit" name="action" value="video" class="btn btn-danger btn-sm"><em class="fas fa-upload mr-3"></em>Upload Task Video</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .card -->
                </div>
                <!-- .col -->
                <div class="col-xl-8 col-lg-7">
                    <div class="token-transaction card card-full-height">
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
                                                <div class="data-state data-state-approved"></div><span class="lead">{{ $i++ }}</span></div>
                                        </td>
                                        <td><span><span class="lead">{{ $transaction->amount }}</span><span class="sub">PKR <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" data-original-title="1 PKR = 0.012 USD"></em></span></span>
                                        </td>
                                        <td class="d-none d-sm-table-cell tnx-date"><span class="sub sub-s2">{{ $transaction->created_at }}</span></td>
                                        <td class="tnx-type"><span class="tnx-type-md badge badge-outline badge-success badge-md">{{ $transaction->status }}</span><span class="tnx-type-sm badge badge-sq badge-outline badge-success badge-md">P</span></td>
                                    </tr>
                                @empty
                                    <tr><td rowspan="4">No Transactions Found</td></tr>
                                @endforelse
                                <!-- tr -->
                                </tbody>
                                <!-- tbody -->
                            </table>
                            <!-- .table -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="referral-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Earn with Referral</h6>
                            <p class=" pdb-0-5x">Invite your friends &amp; family and Get <strong><span class="text-primary">10 points</span> for the current level.</strong></p>
                            <div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><em class="fas fa-link"></em>
                                <input type="text" class="copy-address" value="{{ route('pages.home') }}/{{auth()->user()->id}}" disabled>
                                <button class="copy-trigger copy-clipboard" data-clipboard-text="{{ route('pages.home') }}"><em class="ti ti-files"></em></button>
                            </div>
                            <!-- .copy-wrap -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="token-sale-graph card card-full-height">
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
                    <!-- .card -->
                </div>
                <!-- .col -->
                <div class="col-xl-4 col-lg-5">
                    <div class="token-sales card card-full-height">
                        <div class="card-innr">
                            <div class="card-head">
                                <h4 class="card-title">Current Level Progress</h4></div>
                            <ul class="progress-info">
                                <li><span>POINTS</span> {{ auth()->user()->points }} </li>
                                <li class="text-right"><span>TOTAL POINTS</span> 100 </li>
                            </ul>
                            <div class="progress-bar">
                                <div class="progress-hcap" data-percent="75" style="width: 75%;">
                                    <div>Points <span>75</span></div>
                                </div>
                                <div class="progress-scap" data-percent="25" style="width: 25%;">
                                    <div>Points <span>25</span></div>
                                </div>
                                <div class="progress-percent" data-percent=" {{ auth()->user()->points }} " style="width: {{ auth()->user()->points }}%;"></div>
                            </div><span class="card-sub-title mgb-0-5x">LEVEL STARTED AT</span>
                            <div class="countdown-clock" data-date="2019/04/05">
                                @foreach($currentLevel as $level)
                                    <?php $time = strtotime($level->created_at); ?>
                                    <div><span class="countdown-time countdown-time-first">{{ date('d',$time) }}</span><span class="countdown-text">Day</span></div>
                                    <div><span class="countdown-time">{{ date('m',$time) }}</span><span class="countdown-text">Month</span></div>
                                    <div><span class="countdown-time">{{ date('Y',$time) }}</span><span class="countdown-text">year</span></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row -->
        </div>
        <!-- .container -->
    </div>

@endsection
