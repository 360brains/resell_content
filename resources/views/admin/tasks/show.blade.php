
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
                                <td>{{$task->created_at}}</td>
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
                                        <button type="submit" name="action" value="reworking" class="btn btn-primary">Rework</button>
                                        <button type="submit" name="action" value="rejected" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            </tr>
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
                            <form action="{{ route('user.tasks.save.progress', $task->id) }}" method="post">
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
@endsection
