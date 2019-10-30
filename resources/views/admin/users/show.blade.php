
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
                <span> User </span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> Show </span>
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


    <div class="row">
        <div class="col-sm-6">
            <h3 class="d-inline-block page-title">Details of <b>{{ $user->name }}</b></h3>
        </div>

        <div class="col-sm-6">
        <div class="pull-right padding-tb-20">
            @if($user->special == 0)
                <form action="{{ route('admin.users.special', $user->id) }}" method="post">
                    @csrf
                    <button class="btn btn-success" type="submit" name="action" value="special">Add to Special</button>
                </form>
            @else
                <form action="{{ route('admin.users.special', $user->id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger" type="submit" name="action" value="non-special">Remove from Special</button>
                </form>
            @endif
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>User Name</th>
                            <td>{{$user->name}}</td>
                        </tr>

                        <tr>
                            <th>Gender</th>
                            <td>{{$user->gender}}</td>
                        </tr>

                        <tr>
                            <th>Email Address</th>
                            <td>{{$user->email}}</td>
                        </tr>

                        <tr>
                            <th>Contact No.</th>
                            <td>{{$user->contact}}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{$user->active}}</td>
                        </tr>

                        <tr>
                            <th>Created</th>
                            <td>{{$user->created_at}}</td>
                        </tr>

                        <tr>
                            <th>Last Update</th>
                            <td>{{$user->updated_at}}</td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
