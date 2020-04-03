@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Accounts</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.accounts.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b>
                </a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Accounts</h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class=" light portlet-fit my_table">

                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> Bank Name </th>
                            <th> Account Holder </th>
                            <th> IBAN Number </th>
                            <th> Created </th>
                            <th> Last Updated </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse($accounts as $account)
                            <tr class="table-row-clickable">
                                <td> {{ ++$i }} </td>
                                <td> {{ $account->bank }}</td>
                                <td> {{ $account->holder }} </td>
                                <td> {{ $account->iban }} </td>
                                <td> {{ date('d-M-y h:i', strtotime($account->created_at)) }} </td>
                                <td> {{ date('d-M-y h:i', strtotime($account->updated_at)) }} </td>
                                <td>
                                    <form action="{{ route('admin.accounts.destroy',$account->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary" href="{{ route('admin.accounts.edit', $account->id) }}">Edit</a>
                                        @if($account->active == 0)
                                            <button type="submit" class="btn btn-success btn-outline sbold uppercase">Active</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase">Inactive</button>
                                        @endif
                                    </form>
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
                        {{$accounts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

