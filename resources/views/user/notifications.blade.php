@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="card content-area">
                <div class="card-innr">
                    <div class="card-head">
                        <h4 class="card-title">Notifications</h4></div>
                    <table class="data-table dt-init user-tnx">
                        <thead>
                        <tr class="data-item data-head">
                            <th class="data-col dt-tnxno">Sr No.</th>
                            <th class="data-col dt-amount">Name</th>
                            <th class="data-col dt-usd-amount">Message</th>
                            <th class="data-col dt-account">Date</th>
{{--                            <th class="data-col dt-type">--}}
{{--                                <div class="dt-type-text">Type</div>--}}
{{--                            </th>--}}
{{--                            <th class="data-col"></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @forelse(auth()->user()->notifications()->paginate(2) as $notification)
                            <tr class="data-item">
                                <td class="data-col dt-tnxno">
                                    <div class="d-flex align-items-center">
                                        <div class="data-state data-state-approved"><span class="d-none">Approved</span></div>
                                        <div class="fake-class"><span class="lead tnx-id">{{ $i++ }}</span></div>
                                    </div>
                                </td>
                                <td class="data-col dt-amount"><span class="lead amount-pay">{{ $notification->data['taskName'] }}</span></td>
                                <td class="data-col dt-usd-amount"><span class="lead amount-pay">{{ $notification->data['message']}}</span></td>
                                <td class="data-col dt-account"><span class="lead user-info">{{ date('d-M-Y h:i', strtotime($notification->data['date'])) }}</span></td>
{{--                                <td class="data-col dt-type"><span class="dt-type-md badge badge-outline badge-success badge-md">{{ $transaction->status }}</span><span class="dt-type-sm badge badge-sq badge-outline badge-success badge-md">P</span></td>--}}
{{--                                <td class="data-col text-right"><a href="#" data-toggle="modal" data-target="#transaction-details{{$transaction->id}}" class="btn btn-light-alt btn-xs btn-icon"><em class="ti ti-eye"></em></a></td>--}}


                            </tr>
                        @empty
                            <tr><td colspan="5">No Notifications Found</td></tr>
                        @endforelse
                        <!-- .data-item -->
                        </tbody>
                    </table>
                    <div>
                        {{auth()->user()->notifications()->paginate(2)->links()}}
                    </div>
                </div>
                <!-- .card-innr -->
            </div>
            <!-- .card -->
        </div>
        <!-- .container -->
    </div>



@endsection
