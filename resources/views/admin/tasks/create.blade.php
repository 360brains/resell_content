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
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Create</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b><i class="fa fa-backward"></i> Back</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Users
        <small>Create User</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.users.store') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" class="form-control" id="form_control_1" placeholder="Enter User Name">
                                        <label>Users Name</label>
                                    </div>

                                    <div class="form-group form-md-radios">
                                        <label class="col-md-3 control-label" for="form_control_1">Radios(warning)</label>
                                        <div class="col-md-9">
                                            <div class="md-radio-inline">
                                                <div class="md-radio">
                                                    <input type="radio" id="checkbox1_8" name="radio2" class="md-radiobtn">
                                                    <label for="checkbox1_8">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Option 1 </label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="checkbox1_9" name="radio2" class="md-radiobtn" checked="">
                                                    <label for="checkbox1_9">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Option 2 </label>
                                                </div>
                                                <div class="md-radio">
                                                    <input type="radio" id="checkbox1_10" name="radio2" class="md-radiobtn">
                                                    <label for="checkbox1_10">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Option 3 </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="email" name="email" class="form-control" id="form_control_1" placeholder="Enter Email-Address">
                                        <label>Email-Address</label>
                                    </div>

{{--                                    <div class="form-group form-md-line-input">--}}
{{--                                        <select class="form-control" name="type">--}}
{{--                                            <option value="">Select Type of Task</option>--}}
{{--                                            @foreach($types as $type)--}}
{{--                                                <option value="{{ $type->id }}">{{ $type->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        <label>Task Type</label>--}}
{{--                                    </div>--}}

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="deadline" class="form-control date-picker" id="form_control_1" placeholder="Give a deadline">
                                        <label>Task Deadline</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="category">
                                            <option value="">Select Category of Task</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Task Category</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="level">
                                            <option value="">Select User Level for the Task</option>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Task Level</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="active">
                                            <option value="">Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <label>Status</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <textarea name="description" class="summernote" placeholder="Description"></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <input type="submit" class="btn green" value="Submit">
                                    <a href="javascript:;" class="btn default">Cancel</a>
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
