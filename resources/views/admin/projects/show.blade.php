@extends('admin.layouts.master')

@section('content')
<style>
    .description {
        background: #8080800d;
        padding: 1px 10px 15px 25px;
    }
    .pos-r{
        position: relative;
        top: -6px;
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
            <a href="{{ url()->previous() }}" class="btn red btn-sm"> <b>Back</b>
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

                    @if($project->type->name == 'Content Writing')
                    @if( !(is_null($project->template_id)) )
                    <tr>
                        <th>Project Template</th>
                        <td>{{$project->template->name}}</td>
                    </tr>
                    @endif
                    @endif

                    <tr>
                        <th>Number of Tasks</th>
                        <td>{{$project->quantity}}</td>
                    </tr>

                    @if($project->type->name == 'Content Writing')
                    <tr>
                        <th>Number of words</th>
                        <td>{{$project->words}}</td>
                    </tr>
                    @elseif($project->type->name == 'Video Making')
                    <tr>
                        <th>Duration</th>
                        <td>{{$project->duration}} Minutes</td>
                    </tr>
                    @endif

                    <tr>
                        <th>Available Tasks</th>
                        <td>{{$project->available }}</td>
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
                        <th>Price for a Task</th>
                        <td>{{$project->price}}</td>
                    </tr>

                    <tr>
                        <th>Points for a Task</th>
                        <td>{{$project->points}}</td>
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

                <h3>Description</h3>
                <div class=" description">{!! $project->description !!}</div>

                <div class="clearfix">
                <h3 class="pull-left">Sub Description</h3>
                <a href="" class="pull-right mt-3 mb-3 margin-right-10 margin-top-15 margin-bottom-15 btn blue btn-sm" data-toggle="modal" data-target="#sub-descriptions"> <b><i class="fa fa-plus"></i> Add</b></a>
                </div>
            @foreach($project->subDescriptions as $subDesc)
                    <div class="sub-descriptions">{{ $subDesc->text }} <a href="" class="pull-right btn red btn-sm pos-r"> <b><i class="fa fa-trash"></i></b></a></div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit bordered">

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped flip-content table-hover">
                    <thead class="flip-content">
                        <tr>
                            <th width="75px"> Sr No. </th>
                            <th> User Name </th>
                            <th> Deadline </th>
                            <th> Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 0;
                        @endphp
                        @forelse($tasks as $task)
                        <tr>
                            <td> {{ ++$i }} </td>
                            <td><a href="{{ route('admin.users.show', $task->user->id) }}"> {{ $task->user->name }} </a></td>
                            <td> {{ $task->deadline }} </td>
                            <td> {{ $task->status}} </td>
                            <td>
                                <form action="{{ route('admin.projects.destroy',$task->id) }}" method="POST">
                                    @csrf

                                    <a class="btn btn-success" href="{{ route('admin.tasks.show', $task->id) }}">View</a>

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
                    {{$tasks->links()}}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sub-descriptions" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Add new sub description</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group form-md-line-input">
                        <input type="text" name="sub_description" class="form-control" id="form_control_1" value="">
                        <label>Sub description</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
