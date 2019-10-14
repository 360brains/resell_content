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
                <span> Project</span>
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

    <h3 class="page-title">Details of <b>{{ $project->name }}</b>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Project Name</th>
                            <td>{{$project->name}}</td>
                        </tr>

                        <tr>
                            <th>Project Type</th>
                            <td>{{$project->type->name}}</td>
                        </tr>

                        <tr>
                            <th>Number of Tasks</th>
                            <td>{{$project->quantity}}</td>
                        </tr>

                        <tr>
                            <th>Category</th>
                            <td>{{$project->category->name}}</td>
                        </tr>

                        <tr>
                            <th>User Level for Project</th>
                            <td>{{$project->level->name}}</td>
                        </tr>

                        <tr>
                            <th>Deadline</th>
                            <td>{{$project->deadline ?? 'None'}}</td>
                        </tr>

                        <tr>
                            <th>Created</th>
                            <td>{{$project->created_at}}</td>
                        </tr>

                        <tr>
                            <th>Last Update</th>
                            <td>{{$project->updated_at}}</td>
                        </tr>

                        <tr>
                            <th>Trainings required</th>
                            <td>
                                @forelse($project->trainings as $training)
                                    {{ $training->name }}
                                    <br>
                                    @empty
                                    No Trainings Required
                                    @endforelse
                            </td>
                        </tr>

                    </table>

                    <h3 >Description</h3>
                    <div class="description">{!! $project->description !!}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
