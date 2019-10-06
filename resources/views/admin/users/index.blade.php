@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Users</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ route('admin.users.create') }}" class="btn blue btn-sm" > <b><i class="fa fa-plus"></i> Add</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Users
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
                            <th> Gender </th>
                            <th> Email Address </th>
                            <th> Total Tasks </th>
                            <th> Created </th>
                            <th> Last Updated </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $i = 0;
                        @endphp
                            @forelse($users as $user)
                                <tr>
                                    <td> {{ ++$i }} </td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->gender }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->created_at }} </td>
                                    <td> {{ $user->updated_at }} </td>
                                    <td>
                                        <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a class="btn btn-success" href="{{ route('admin.users.show', $user->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                                            <button type="submit" class="btn btn-danger btn-outline sbold uppercase">Delete</button>

                                        </form>
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
                    {{$users->links()}}
                    </div>
            </div>
        </div>
    </div>
@endsection

