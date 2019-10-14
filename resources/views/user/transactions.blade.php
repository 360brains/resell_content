@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="card content-area">
                <div class="card-innr">
                    <div class="card-head">
                        <h4 class="card-title">User Transactions</h4></div>
                    <table class="data-table dt-init user-tnx">
                        <thead>
                        <tr class="data-item data-head">
                            <th class="data-col dt-tnxno">Tranx No.</th>
                            <th class="data-col dt-amount">Amount</th>
                            <th class="data-col dt-usd-amount">USD Amount</th>
                            <th class="data-col dt-account">Date</th>
                            <th class="data-col dt-type">
                                <div class="dt-type-text">Type</div>
                            </th>
                            <th class="data-col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @forelse($transactions as $transaction)
                            <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                        <div class="data-state data-state-approved"><span class="d-none">Approved</span></div>
                                        <div class="fake-class"><span class="lead tnx-id">{{ $i++ }}</span></div>
                                    </div>
                                </td>
                                <td class="data-col dt-amount"><span class="lead amount-pay">{{ $transaction->amount }}</span><span class="sub sub-symbol">PKR <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 PKR = 0.0064 USD"></em></span></td>
                                <td class="data-col dt-usd-amount"><span class="lead amount-pay">{{ $transaction->amount*0.0064 }}</span><span class="sub sub-symbol">USD <em class="fas fa-info-circle" data-toggle="tooltip" data-placement="bottom" title="1 PKR = 0.0064 USD"></em></span></td>
                                <td class="data-col dt-account"><span class="lead user-info">{{ $transaction->created_at }}</span></td>
                                <td class="data-col dt-type"><span class="dt-type-md badge badge-outline badge-success badge-md">{{ $transaction->status }}</span><span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">P</span></td>
                                <td class="data-col text-right"><a href="#" data-toggle="modal" data-target="#transaction-details{{$transaction->id}}" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a></td>


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
                        <!-- .data-item -->
                        </tbody>
                    </table>
                </div>
                <!-- .card-innr -->
            </div>
            <!-- .card -->
        </div>
        <!-- .container -->
    </div>



@endsection
