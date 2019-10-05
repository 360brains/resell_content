
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
                <span> Task</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span> Show</span>
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

    <h3 class="page-title">Details of <b>{{ $task->name }}</b>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Task Name</th>
                            <td>{{$task->name}}</td>
                        </tr>

                        @if($task->status != null)
                        <tr>
                            <th>User Name</th>
                            <td>{{$task->user->name}}</td>
                        </tr>
                        @endif

                        <tr>
                            <th>Task Type</th>
                            <td>{{$task->type->name}}</td>
                        </tr>

                        @if($task->project != null)
                            <tr>
                                <th>Project</th>
                                <td>{{$task->project->name}}</td>
                            </tr>
                        @endif

                        <tr>
                            <th>Category</th>
                            <td>{{$task->category->name}}</td>
                        </tr>

                        <tr>
                            <th>User Level for Task</th>
                            <td>{{$task->level->name}}</td>
                        </tr>

                        <tr>
                            <th>Deadline</th>
                            <td>{{$task->deadline ?? 'None'}}</td>
                        </tr>

                        <tr>
                            <th>Created</th>
                            <td>{{$task->created_at}}</td>
                        </tr>

                        <tr>
                            <th>Last Update</th>
                            <td>{{$task->updated_at}}</td>
                        </tr>

                    </table>

                    <h3 >Description</h3>
                    <div class="description">{!! $task->description !!}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
