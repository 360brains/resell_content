
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
                <span>User Test</span>
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

    <h3 class="page-title">Details of <b> {{ $test->test->name }}</b>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">

                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">

                        <tr>
                            <th>User Name</th>
                            <td>{{$test->user->name}}</td>
                        </tr>

                        <tr>
                            <th>Test Type</th>
                            <td>{{$test->test->types->name}}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{$test->status}}</td>
                        </tr>

                        <tr>
                            <th>Deadline</th>
                            <td>{{$test->test->deadline ?? 'None'}}</td>
                        </tr>

                        @if($test->status == 'completed')
                            <tr>
                                <th>Actions</th>
                                <td>
                                    <form action="{{ route('admin.user.test.evaluate', $test->id) }}" method="post">
                                        @csrf
                                        <button type="submit" name="action" value="approved" class="btn btn-success">Approve</button>
                                        <button type="submit" name="action" value="rejected" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>


        @if($test->status != 'started')
            <div class="col-md-12">
                <h3>Content Delivered</h3>
                <div class="portlet light portlet-fit bordered">

                    @if($test->test->types->name == 'Video Making')
                        <div class="portlet-body">
                            <video width="100%" controls>
                                <source src="{{ asset( $test->video ) }}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                    @elseif($test->test->types->name == 'Content Writing')
                        <div class="portlet-body">
                            <form>
                                <textarea id="messageArea" name="body" rows="7" class="form-control summernote" placeholder="Write your message..">{!! $test->body !!}</textarea>
                                <div class="gaps-2-5x"></div>

                            </form>
                        </div>
                    @endif

                </div>
            </div>
        @endif
    </div>
@endsection
