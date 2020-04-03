@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Transactions</span>
            </li>
        </ul>


    </div>
    <h3 class="page-title">Transactions
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class=" light portlet-fit my_table">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> User Name </th>
                            <th> Amount </th>
                            <th> Type </th>
                            <th> Product </th>
                            <th> Date </th>
                            <th> Status </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($transactions as $transaction)
                                <tr class="table-row-clickable" onclick="window.location = '{{ route('admin.transactions.show', $transaction->id) }}'">
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $transaction->user->name }} </td>
                                    <td> {{ $transaction->amount }} </td>
                                    <td> {{ $transaction->type }} </td>
{{--                                    @if($transaction->test_id != Null)--}}
{{--                                        <td>Test: {{ $transaction->test->name }} </td>--}}
{{--                                    @elseif($transaction->training_id != NULL)--}}
{{--                                        <td>Training: {{ $transaction->training->name }} </td>--}}
{{--                                    @elseif($transaction->withdraw_id != NULL)--}}
{{--                                        <td>Withdrawn Funds </td>--}}
{{--                                    @elseif($transaction->membership_id != NULL)--}}
{{--                                        <td>Membership: {{ $transaction->membership->name }} </td>--}}
{{--                                    @elseif($transaction->deposit_id != NULL)--}}
{{--                                        <td>Deposit Funds</td>--}}
{{--                                    @endif--}}
                                    <td>{{ $transaction->description }}</td>
                                    <td> {{ $transaction->created_at }} </td>
                                    <td> {{ $transaction->status }} </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        Data Not Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                    {{$transactions->links()}}
                    </div>
            </div>
        </div>
    </div>
@endsection

