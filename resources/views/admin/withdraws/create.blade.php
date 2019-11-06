@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Levels</span>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Create</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b> <i class="fa fa-backward"></i> Back</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Levels
        <small>Create Level</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.levels.store') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" class="form-control" placeholder="Enter Level Name" value="{{old('name')}}">
                                        <label>Level Name</label>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="min_points" class="form-control" id="form_control_1" placeholder="Enter min number of points" value="{{old('min_points')}}">
                                                <label>Minimum Points</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="max_points" class="form-control" id="form_control_1" placeholder="Enter max number of points" value="{{old('max_points')}}">
                                                <label>Maximun Points</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="active" value="">
                                            <option value="">Status</option>
                                            <option value="1" {{old('active') == 1?'selected':''}}>Active</option>
                                            <option value="0" {{old('active') == 0?'selected':''}}>Inactive</option>
                                        </select>
                                        <label>Status</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <textarea name="description" class="summernote" placeholder="Description">{{old('description')}}</textarea>
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
