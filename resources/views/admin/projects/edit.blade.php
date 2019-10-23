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
                <span>Edit</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b><i class="fa fa-backward"></i> Back</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Projects
        <small>Edit Project</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.projects.update', $project->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" value="{{ $project->name }}" class="form-control" id="form_control_1" placeholder="Enter Project Name">
                                        <label for="form_control_1">Project Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="quantity" value="{{ $project->quantity }}" class="form-control" id="mask_number form_control_1" placeholder="Enter Number of Tasks">
                                        <label for="form_control_1">Number of Tasks</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="price" value="{{ $project->price }}" class="form-control" id="form_control_1" placeholder="Enter Price for a Task">
                                        <label>Price</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" id="form_control_1" name="type">
                                            <option value="">Select type of project</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="form_control_1">Project Type</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="deadline" value="{{ $project->deadline }}" class="form-control datetime" id="form_control_1" placeholder="Give a deadline">
                                        <label for="form_control_1">Project Deadline</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" id="form_control_1" name="category">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="form_control_1">Project Category</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" id="form_control_1" name="level">
                                            <option value="">Select User Level</option>
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}" {{ $project->level_id == $level->id ? 'selected' : ''}}>{{ $level->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="form_control_1">Project Level</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" id="form_control_1" name="active">
                                            <option value="">Status</option>
                                            <option value="1" {{ $project->active = 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ $project->active = 0 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                        <label for="form_control_1">Project Status</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="trainings[]" multiple="multiple">
                                            @foreach($trainings as $training)
                                                    <option
                                                        @if (in_array($training->name, $projectTrainings))
                                                        selected
                                                        @endif
                                                        value="{{ $training->id }}">{{$training->name }}
                                                    </option>
                                            @endforeach
                                        </select>
                                        <label>Trainings Required  <small>(Can Select Multiple Trainings)</small></label>
                                    </div>


{{--                                        @foreach($project->trainings as $projectTraining)--}}
{{--                                            @if($projectTraining->name == $training->name)--}}
{{--                                                <option value="{{ $training->id }}" selected="selected">{{$training->name }}</option>--}}
{{--                                                @break--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}



                                    <div class="portlet-body form">
                                        <div class="form-body">
                                            <div class="form-group last">
                                                <textarea name="description" class="summernote" cols="30" rows="10">{!! $project->description !!}</textarea>
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
