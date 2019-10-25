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
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b><i class="fa fa-backward"></i> Back</b></a>
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
                                        <input type="text" name="name" class="form-control" id="form_control_1" placeholder="Enter Project Name" value="{{old('name')}}">
                                        <label>Project Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="quantity" class="form-control" id="mask_number form_control_1" placeholder="Enter Number of Tasks" value="{{old('quantity')}}">
                                        <label>Number of Tasks</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="price" class="form-control" id="form_control_1" placeholder="Enter Price for a Task" value="{{old('price')}}">
                                        <label>Price</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select id="typeselector" class="form-control" name="type">
                                            <option value="">Select type of project</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}" {{old('type')==$type->id?'selected':''}}>{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                        <label>Project Type</label>
                                    </div>

                                    <div id="divid" class="form-group form-md-line-input">
                                        <select class="form-control" name="template">
                                            <option value="">Select Template for project</option>
                                            @foreach($templates as $template)
                                                <option value="{{ $template->id }}" {{old('template')==$template->id?'selected':''}}>{{ $template->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Project Template</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="deadline" class="form-control datetime" id="form_control_1" placeholder="Give a deadline" value="{{old('deadline')}}">
                                        <label>Project Deadline</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="category">
                                            <option value="">Select Category of project</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{old('category')==$category->id?'selected':''}}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Project Category</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="level">
                                            <option value="">Select User Level for the project</option>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}" {{old('level')==$level->id?'selected':''}}>{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Project Level</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="trainings[]" multiple="multiple">
                                            @foreach($trainings as $training)
                                                <option value="{{ $training->id }}" {{old('trainings[]')==$training->id?'selected':''}}>{{$training->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Trainings Required  <small>(Can Select Multiple Trainings)</small></label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="active">
                                            <option value="">Status</option>
                                            <option value="1" {{old('active')==1 ?'selected':''}}>Active</option>
                                            <option value="0" {{old('active')==0 ?'selected':''}}>Inactive</option>
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
