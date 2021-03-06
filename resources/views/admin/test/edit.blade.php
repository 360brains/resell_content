@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Test</span>
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
    <h3 class="page-title">Test
        <small>Create Test</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.test.update', $test->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" value="{{$test->name}}" class="form-control" id="form_control_1" placeholder="Enter Test Name">
                                        <label>Test Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="deadline" value="{{$test->deadline}}" class="form-control" id="mask_number form_control_1" placeholder="Enter Deadline">
                                        <label>Deadline</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="fee" value="{{$test->fee}}" class="form-control" id="mask_number form_control_1" placeholder="Enter Fee">
                                        <label>Fee</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="type">
                                            <option value="">Select type of test</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ $type->id ==  $test->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Type</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="level">
                                            <option value="">Select level of test</option>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}" {{ $level->id ==  $test->type_id ? 'selected' : '' }}>{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Level</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="active">
                                            <option value="">Select status of test</option>
                                            <option value="1" {{ $test->active = 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ $test->active = 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        <label>Status</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <textarea name="description" class="summernote" placeholder="Description" >{!! $test->description !!}</textarea>
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
