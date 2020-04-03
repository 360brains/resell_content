@extends('admin.layouts.master')

@section('content')
    <style>
        .description{
            background: #8080800d;
            padding: 1px 10px 15px 25px;
        }
    </style>


    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> Tests</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> User tests</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b>Back</b>
                    <i class="fa fa-backward"></i>
                </a>
            </div>
        </div>

    </div>

    <h3 class="page-title">User Tests</h3>
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
                            <th> Test Name </th>
                            <th> Type </th>
                            <th> Deadline </th>
                            <th> Status </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @forelse($tests as $test)
                            <tr>
                                <td> {{ ++$i }} </td>
                                <td><a href="{{ route('admin.users.show', $test->user->id) }}"> {{ $test->user->name }} </a></td>
                                <td><a href="{{ route('admin.test.show', $test->test->id) }}"> {{ $test->test->name }} </a></td>
                                <td> {{ $test->test->types->name }} </td>
                                <td> {{ $test->test->deadline ?? 'None' }} </td>
                                <td> {{ $test->status}} </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.user.test.show', $test->id )}}">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    Data Not Found
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{$tests->links()}}
                    </div>
                </div>
            </div>
        </div>
@endsection
