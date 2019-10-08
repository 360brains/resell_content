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
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> User Name </th>
                            <th> Amount </th>
                            <th> Type </th>
                            <th> Product </th>
                            <th> Status </th>
                            <th> Date </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $transaction->user->name }} </td>
                                    <td> {{ $transaction->amount }} </td>
                                    <td> {{ $transaction->type }} </td>

                                    @if($transaction->task_id != NULL)
                                        <td>Task: {{ $transaction->task->name }} </td>
                                    @elseif($transaction->test_id != Null)
                                        <td>Test: {{ $transaction->test->name }} </td>
                                    @elseif($transaction->training_id != NULL)
                                        <td>Training: {{ $transaction->training->name }} </td>
                                    @endif

                                    <td> {{ $transaction->status }} </td>
                                    <td> {{ $transaction->created_at }} </td>

                                    <td><a class="btn btn-success" href="{{ route('admin.transactions.show', $transaction->id) }}">Show</a></td>
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

