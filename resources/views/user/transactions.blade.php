@extends('user.layouts.master')

@section('content')
    <section class="transactions pt-5 pb-5">
        <div class="container">
            <div class="clearfix pb-2">
                <h4 class="float-left m-0">Earnings</h4>
                <a href="{{ route('withdraw.create') }}" class="btn btn-sm btn-outline-success float-right">Withdraw </a>
            </div>
            <div class="statictics text-center shadow">
                <div class="row">
                    <div class="col-md border-right border-sm-0 pt-3 pb-3">
                        <h5>NET INCOME</h5>
                        <h3>{{ auth()->user()->income }}</h3>
                    </div>
                    <div class="col-md border-right border-sm-0 pt-3 pb-3">
                        <h5>WITHDRAWN</h5>
                        <h3>{{ $withdrawn }}</h3>
                    </div>
                    <div class="col-md border-right border-sm-0 pt-3 pb-3">
                        <h5>USED FOR PUCHASES</h5>
                        <h3>{{ $purchased }}</h3>
                    </div>
                    <div class="col-md border-right border-sm-0 pt-3 pb-3">
                        <h5>PENDING CLEARANCE</h5>
                        <h3>{{ $pending }}</h3>
                    </div>
                    <div class="col-md pt-3 pb-3">
                        <h5>AVAILABLE</h5>
                        <h3>{{ floor(auth()->user()->balance) }}</h3>
                    </div>
                </div>
            </div>
            <div class="clearfix pt-3 pb-2">
                <h4 class="pt-3 pb-2 float-left">Transaction History</h4>
{{--                <div class="dropdown float-right">--}}
{{--                    Shown by:--}}
{{--                    <button class="btn btn-sm btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        PENDING FUNDS--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="my-jobs-table shadow">
                <div class="table-responsive">
                    <table class="table table-borderless ">
                        <thead>
                        <tr>
                            <th>SR.</th>
                            <th>FOR</th>
                            <th>STATUS</th>
                            <th>DATE</th>
                            <th>AMOUNT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td >{{ $transaction->description }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td >{{ $transaction->created_at }}</td>
                                <td >PKR {{ $transaction->amount }}</td>
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
