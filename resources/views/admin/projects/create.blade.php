@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Projects</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Create</span>
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
    <h3 class="page-title">Projects
        <small>Create Project</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.projects.store') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" class="form-control" id="form_control_1" placeholder="Enter Project Name">
                                        <label for="form_control_1">Project Name</label>
                                    </div>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="quantity" class="form-control" id="mask_number form_control_2" placeholder="Enter Number of Tasks">
                                        <label for="form_control_2">Quantity</label>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <select class="form-control" name="type">
                                        <option value="">Select type of project</option>

                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach

                                    </select>

                                    <label for="form_control_1">Super Type</label>
                                    <span class="help-block">Select a type of the project...</span>
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
