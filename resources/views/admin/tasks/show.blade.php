
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

    @foreach(auth()->user()->unreadNotifications as $notification)
        @if(strpos($notification->data['link'], "".$task->id))
            {{ $notification->markAsRead() }}
        @endif
    @endforeach

    <h3 class="page-title">Details of <b> {{ $task->project->name }}</b>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">

                        <tr>
                            <th>User Name</th>
                            <td>{{$task->user->name}}</td>
                        </tr>

                        <tr>
                            <th>Task Type</th>
                            <td>{{$task->project->type->name}}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{$task->status}}</td>
                        </tr>

                        <tr>
                            <th>Deadline</th>
                            <td>{{$task->deadline}}</td>
                        </tr>

                        @foreach($task->statuses as $status)
                            <tr>
                                <th>{{ $status->name }}</th>
                                <td>{{$status->created_at}}</td>
                            </tr>
                        @endforeach

                            <tr>
                                <th>price</th>
                                <td>{{$task->project->price}}</td>
                            </tr>

                        @if($task->status == 'delivered')
                            <tr>
                                <th>Actions</th>
                                <td>
                                    <form action="{{ route('admin.tasks.update', $task->id) }}" method="post">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <button type="submit" name="action" value="approved" class="btn btn-success">Approve</button>
                                        <button type="button" data-toggle="modal" href="#basic" class="btn btn-primary">Rework</button>
                                        <button type="submit" name="action" value="rejected" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                        @if(isset($task->timeExtension))
                            @if($task->timeExtension->status == 'Requested')
                                <tr>
                                    <th>Time extension request</th>
                                    <td>
                                        <button type="button" data-toggle="modal" href="#time-extension" class="btn btn-primary">View</button>
                                    </td>
                                </tr>
                            @endif
                        @endif

                    </table>

                </div>
            </div>
        </div>


        @if($task->status == 'delivered' OR $task->status == 'reworking' OR $task->status == 'approved' OR $task->status == 'rejected')
            <div class="col-md-12">
                <h3>Content Delivered</h3>
                <div class="portlet light portlet-fit bordered">

                    @if($task->project->type->name == 'Video Making')
                        <div class="portlet-body">
                            <video width="100%" controls>
                                <source src="{{ asset( $task->video ) }}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                    @elseif($task->project->type->name == 'Content Writing')
                        <div class="portlet-body">
                            <form action="{{ route('admin.task.save.progress', $task->id) }}" method="post">
                                @csrf
                                <textarea id="messageArea" name="body" rows="7" class="form-control summernote" placeholder="Write your message..">{!! $task->body !!}</textarea>
                                <div class="gaps-2-5x"></div>

                                <button class="btn btn-auto btn-lg btn-success" type="submit" name="action" value="admin-save"> Save </button>

                            </form>
                        </div>
                    @endif

                </div>
            </div>
        @endif
    </div>
    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Details for rework</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.tasks.update', $task->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group form-md-line-input">
                            <input type="number" name="deadline" class="form-control" id="form_control_1" placeholder="Time Awarded for task in hours" value="{{ $task->project->deadline }}">
                            <label class="text-left">Task Deadline <small>(in hours)</small></label>
                        </div>
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" name="action" value="reworking" class="btn green">Save changes</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="time-extension" tabindex="-1" role="basic" aria-hidden="true">
        @if(isset($task->timeExtension))
            @if($task->timeExtension->status == 'Requested')
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Request for time extension.</h4>
                        </div>
                        <div class="modal-header">
                            <h5>{{ $task->user->name }} requested {{ $task->timeExtension->time }} hours time extension for the task.</h5>
                            <h3>Reason: <br>
                                <small>{{ $task->timeExtension->reason }}</small>
                            </h3>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.task.extend', $task->id) }}" method="get">
                                @csrf
                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                <button type="submit" name="action" value="approve" class="btn green">Approve</button>
                                <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            @endif
        @endif
        <!-- /.modal-dialog -->
    </div>
@endsection
