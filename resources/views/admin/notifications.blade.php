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
                            <th> For </th>
                            <th> Message </th>
                            <th> Date </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse(auth()->user()->notifications()->paginate(10) as $notification)
                            <tr class="table-row-clickable">
                                <td> {{ ++$i }} </td>
                                <td> {{ $notification->data['tooltip'] }} </td>
                                <td> {!! $notification->data['message']  !!} </td>
                                <td>{{ $notification->created_at }}</td>
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
                        {{ auth()->user()->notifications()->paginate(10) }}
                    </div>
                </div>
            </div>
        </div>
@endsection

