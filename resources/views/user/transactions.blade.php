@extends('user.layouts.master')

@section('content')
    <section class="transactions pt-5 pb-5">
        <div class="container">
            <div class="clearfix pb-2">
                <h4 class="float-left">Earnings</h4>
                <a href="{{ route('withdraw.create') }}" class="btn btn-sm btn-outline-success float-right">Withdraw </a>
            </div>
            <div class="statictics text-center">
                <div class="row">
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>NET INCOME</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>WITHDRAWN</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>USED FOR PUCHASES</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md border-right pt-3 pb-3">
                        <h5>PENDING CLEARANCE</h5>
                        <h3>250</h3>
                    </div>
                    <div class="col-md pt-3 pb-3">
                        <h5>AVAILABLE</h5>
                        <h3>250</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix pt-3 pb-2">
                <h4 class="pt-3 float-left">Transaction History</h4>
                <div class="dropdown float-right">
                    Shown by:
                    <button class="btn btn-sm btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        PENDING FUNDS
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <div class="my-jobs-table shadow">
                <div class="table-responsive">
                    <table class="table table-hover table-borderless ">
                        <thead>
                        <tr>
                            <th>SR.</th>
                            <th>FOR</th>
                            <th>DATE</th>
                            <th>AMOUNT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td ></td>
                                <td ></td>
                                <td >PKR {{ $transaction->amount }}</td>
                                <td><a href="#" data-toggle="modal" data-target="#transaction-details{{$transaction->id}}" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a></td>

                                <div class="modal fade" id="transaction-details{{$transaction->id}}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
                                        <div class="modal-content"><a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                                            <div class="popup-body popup-body-lg">
                                                <div class="content-area">
                                                    <div class="card-head d-flex justify-content-between align-items-center">
                                                        <h4 class="card-title mb-0">Transaction Details</h4></div>
                                                    <div class="gaps-1-5x"></div>
                                                    <div class="data-details d-md-flex">
                                                        <div class="fake-class"><span class="data-details-title">Tranx Date</span><span class="data-details-info">{{ $transaction->created_at }}</span></div>
                                                        <div class="fake-class"><span class="data-details-title">Tranx Status</span><span class="badge badge-success ucap">{{ $transaction->status }}</span></div>
                                                        <div class="fake-class"><span class="data-details-title">Tranx Approved Note</span><span class="data-details-info">By <strong>Admin</strong> at {{ $transaction->created_at }}</span></div>
                                                    </div>
                                                    <div class="gaps-3x"></div>
                                                    <h6 class="card-sub-title">Transaction Info</h6>
                                                    <ul class="data-details-list">
                                                        <li>
                                                            <div class="data-details-head">Transaction Type</div>
                                                            <div class="data-details-des"><strong>{{ $transaction->type }}</strong></div>
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
                                                            <div class="data-details-des"> {{ $transaction->status }} For a {{ $transaction->for }}</div>
                                                        </li>
                                                        <!-- li -->
                                                    </ul>
                                                    <!-- .data-details -->
                                                    <div class="gaps-3x"></div>
                                                    <h6 class="card-sub-title">{{ $transaction->for }} Details</h6>
                                                    <ul class="data-details-list">
                                                        <li>
                                                            <div class="data-details-head">{{ $transaction->for }} Name</div>
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
                                                            <div class="data-details-des"><span><strong>{{ $transaction->amount }}</strong></span><span>(T+B)</span></div>
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
                            </tr>
                        @empty
                            <tr><td colspan="5">No Transactions Found</td></tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
