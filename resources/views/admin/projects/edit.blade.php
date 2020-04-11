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
                                        <label>Project Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="deadline" value="{{ $project->deadline }}" class="form-control datetime" id="form_control_1" placeholder="Time Awarded for task in hours">
                                        <label>Task Deadline <small>(in hours)</small></label>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="quantity" value="{{ $project->quantity }}" class="form-control" id="mask_number form_control_1" placeholder="Enter Number of Tasks">
                                                <label>Number of Tasks</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="words" value="{{ $project->words }}" class="form-control" id="form_control_1" placeholder="Enter Number of words for a Task" value="{{old('words')}}">
                                                <label>Total words</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="price" value="{{ $project->price }}" class="form-control" id="form_control_1" placeholder="Enter Price for a Task">
                                                <label>Price</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="points" value="{{ $project->points }}" class="form-control" id="form_control_1" placeholder="Enter Points for a Task">
                                                <label>Points</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select id="typeselector" class="form-control" id="form_control_1" name="type">
                                                    <option value="">Select type of project</option>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Type</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select class="form-control" id="form_control_1" name="level">
                                                    <option value="">Select User Level</option>
                                                    @foreach($levels as $level)
                                                        <option value="{{ $level->id }}" {{ $project->level_id == $level->id ? 'selected' : ''}}>{{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Level</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select class="form-control" id="form_control_1" name="category">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Category</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select class="form-control" id="form_control_1" name="active">
                                                    <option value="">Status</option>
                                                    <option value="1" {{ $project->active = 1 ? 'selected' : ''}}>Active</option>
                                                    <option value="0" {{ $project->active = 0 ? 'selected' : ''}}>Inactive</option>
                                                </select>
                                                <label>Project Status</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div id="divid" class="form-group form-md-line-input">
                                                <select class="form-control" name="template">
                                                    <option value="">Select Template for project</option>
                                                    @foreach($templates as $template)
                                                        <option value="{{ $template->id }}" {{ $project->template_id == $template->id ? 'selected' : ''}}>{{ $template->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Template</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="divid2">
                                                <div class="form-group form-md-line-input">
                                                    <input type="number" name="words" class="form-control" id="form_control_1" placeholder="Enter Number of words for a Task" value="{{ $project->words }}">
                                                    <label>Total words</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div id="divid3">
                                                <div class="form-group form-md-line-input">
                                                    <input type="number" name="duration" class="form-control" id="form_control_1" placeholder="Enter Video Duration" value="{{ $project->duration }}">
                                                    <label>Total duration</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div id="divid" class="form-group form-md-line-input">--}}
{{--                                        <select class="form-control" name="template">--}}
{{--                                            <option value="">Select Template for project</option>--}}
{{--                                            @foreach($templates as $template)--}}
{{--                                                <option value="{{ $template->id }}" {{ $project->template_id == $template->id ? 'selected' : ''}}>{{ $template->name }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                        <label>Project Template</label>--}}
{{--                                    </div>--}}

                                    <div class="row">
                                        <div class="form-group form-md-line-input">
                                            @foreach($trainings as $training)
                                                <div class="col-sm-6">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" name="trainings[]" value="{{ $training->id }}" id="checkbox{{$training->id}}" class="md-check"
                                                           @if (in_array($training->name, $projectTrainings))
                                                               checked
                                                            @endif >
                                                        <label for="checkbox{{$training->id}}">
                                                            <span class="inc"></span>
                                                            <span class="check"></span>
                                                            <span class="box"></span> {{ $training->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <br/><div class="form-group form-md-line-input">
                                        <div class="md-checkbox">
                                            <input type="checkbox" name="special" id="checkbox8" class="md-check"
                                                   @if ($project->special == 1)
                                                   checked
                                                @endif >
                                            <label for="checkbox8">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> For Special Users
                                            </label>
                                        </div>
                                    </div>

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
