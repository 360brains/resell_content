@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Tasks</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Edit</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b><i class="fa fa-backward"></i> Back</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Tasks
        <small>Edit Task</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.tasks.update', $task->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" value="{{ $task->name }}" class="form-control" id="form_control_1" placeholder="Enter Task Name">
                                        <label>Task Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="type">
                                            <option value="">Select Type of Task</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ $task->type_id == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Task Type</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="deadline" value="{{ $task->deadline }}" class="form-control date-picker" id="form_control_1" placeholder="Give a deadline">
                                        <label>Task Deadline</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="category">
                                            <option value="">Select Category of Task</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $task->id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Task Category</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="level">
                                            <option value="">Select User Level for the Task</option>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}" {{ $task->id == $level->id ? 'selected' : ''}}>{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Task Level</label>
                                    </div>

                                    <div class="form-group form-md-line-input">

                                        <select class="form-control" id="form_control_1" name="active">
                                            <option value="">Status</option>
                                            <option value="1" {{ $task->active = 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ $task->active = 0 ? 'selected' : ''}}>Deactive</option>
                                        </select>
                                        <label>Status</label>
                                    </div>


                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group last">
                                                <textarea name="description" class="summernote" cols="30" rows="10">{!! $task->description
                                                 !!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <input type="submit" class="btn green" value="Submit">
                                    <input type="reset" class="btn default" value="Reset">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
@endsection
