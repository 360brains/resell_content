@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Withdraw Requests</span>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <h3 class="page-title">Withdraw Requests
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
                            <th> Username </th>
                            <th> Account Holder </th>
                            <th> IBAN </th>
                            <th> Bank Name </th>
                            <th> Amount </th>
                            <th> Status </th>
                            <th> Created </th>
{{--                            <th> Last Updated </th>--}}
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($withdrawRequests as $withdraw)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td><a href="{{route('admin.users.show', $withdraw->user->id)}}">{{ $withdraw->user->name}}</a></td>
                                    <td> {{ $withdraw->holder}} </td>
                                    <td> {{ $withdraw->iban}} </td>
                                    <td> {{ $withdraw->bank}} </td>
                                    <td> {{ $withdraw->amount}} </td>
                                    <td> {{ $withdraw->status}} </td>
                                    <td> {{ date('d-M-Y', strtotime($withdraw->created_at)) }} </td>
{{--                                    <td> {{ $level->updated_at }} </td>--}}
                                        <td>
                                            @if($withdraw->status == 'Pending')
                                            <form action="{{ route('admin.withdraw.approve', $withdraw->id) }}">
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
                        {{$withdrawRequests->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

