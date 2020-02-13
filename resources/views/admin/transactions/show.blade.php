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
                <i class="fa fa-circle"></i>

            </li>
            <li>
                <span>Show</span>
            </li>
        </ul>


    </div>
    <h3 class="page-title">Details of Transaction
    </h3>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>User Name</th>
                            <td>{{$transaction->user->name}}</td>
                        </tr>

                        <tr>
                            <th>Amount</th>
                            <td>{{$transaction->amount}}</td>
                        </tr>

                        <tr>
                            <th>Transaction For Product</th>
                            @if($transaction->task_id != NULL)
                                <td>Task: {{ $transaction->task->name }} </td>
                            @elseif($transaction->test_id != Null)
                                <td>Test: {{ $transaction->test->name }} </td>
                            @elseif($transaction->training_id != NULL)
                                <td>Training: {{ $transaction->training->name }} </td>
                            @endif
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{$transaction->status}}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{$transaction->created_at}}</td>
                        </tr>

                    </table>

                    <h3 >Description</h3>
                    <div class="description">{!! $transaction->description !!}</div>

                </div>
            </div>
        </div>
    </div>
@endsection

