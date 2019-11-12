@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Deposit Funds</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <h3 class="page-title">Deposit Requests
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
                            <th> Bank Name </th>
                            <th> Tranx. ID </th>
                            <th> Amount </th>
                            <th> Deposit Date </th>
                            <th>Created At</th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($deposits as $deposit)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $deposit->bank}} </td>
                                    <td> {{ $deposit->reference_id}} </td>
                                    <td> {{ $deposit->amount}} </td>
                                    <td> {{ $deposit->date_deposit}} </td>
                                    <td> {{ date('d-M-Y', strtotime($deposit->created_at)) }} </td>
                                    <td> {{ $deposit->active == 1 ? 'Pending' : 'Approved'}} </td>
                                        <td>
                                            @if($deposit->status == 'Pending')
                                            <form action="{{ route('admin.deposits.update', $deposit->id) }}">
                                                @csrf
                                                    <button class="btn btn-primary" type="submit">Approve</button>
    {{--                                                <button type="submit" class="btn btn-success btn-outline sbold uppercase">Reject</button>--}}
                                            </form>
                                            @endif
                                        </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        Data Not Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$deposits->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

