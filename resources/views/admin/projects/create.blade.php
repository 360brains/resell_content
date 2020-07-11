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

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="points" class="form-control" id="form_control_1" placeholder="Enter Points for a Task" value="{{old('points')}}">
                                                <label>Points</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="deadline" class="form-control" id="form_control_1" placeholder="Time Awarded for task in hours" value="{{old('deadline')}}">
                                                <label>Task Deadline <small>(in hours)</small></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="quantity" class="form-control" id="mask_number form_control_1" placeholder="Enter Number of Tasks" value="{{old('quantity')}}">
                                                <label>Number of Tasks</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <input type="number" name="price" class="form-control" id="form_control_1" placeholder="Enter Price for a Task" value="{{old('price')}}">
                                                <label>Price</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select id="typeselector" class="form-control" name="type">
                                                    <option value="">Select type of project</option>
                                                    @foreach($types as $type)
                                                        <option value="{{$type->id}}" {{old('type')==$type->id?'selected':''}}>{{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Type</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select class="form-control" name="level">
                                                    <option value="">Select User Level for the project</option>
                                                    @foreach($levels as $level)
                                                        <option value="{{ $level->id }}" {{old('level')==$level->id?'selected':''}}>{{ $level->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Level</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select class="form-control" name="category">
                                                    <option value="">Select Category of project</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{old('category')==$category->id?'selected':''}}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Category</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-md-line-input">
                                                <select class="form-control" name="active">
                                                    <option value="">Status</option>
                                                    <option value="1" selected>Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                <label>Status</label>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div id="divid" class="form-group form-md-line-input">
                                                <select class="form-control" name="template">
                                                    <option value="">Select Template for project</option>
                                                    @foreach($templates as $template)
                                                        <option value="{{ $template->id }}" {{old('template')==$template->id?'selected':''}}>{{ $template->name }}</option>
                                                    @endforeach
                                                </select>
                                                <label>Project Template</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="divid2">
                                                <div class="form-group form-md-line-input">
                                                    <input type="number" name="words" class="form-control" id="form_control_1" placeholder="Enter Number of words for a Task" value="{{old('words')}}">
                                                    <label>Total words</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-25">
                                        <div class="col-sm-6">
                                            <div id="divid3">
                                                <div class="form-group form-md-line-input">
                                                    <input type="number" name="duration" class="form-control" id="form_control_1" placeholder="Enter Video Duration" value="{{old('duration')}}">
                                                    <label>Total duration</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group form-md-line-input">
                                            <h4 class="margin-bottom-20">Trainings required for this project</h4>
                                            @foreach($trainings as $training)
                                                <div class="col-sm-6">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" name="trainings[]" value="{{ $training->id }}" {{old('trainings[]')==$training->id?'checked':''}} id="checkbox{{$training->id}}" class="md-check">
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
                                            <input type="checkbox" name="special" id="checkbox8" class="md-check">
                                            <label for="checkbox8">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> For Special Users
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="clearfix mt-4 float-right text-right">
                                                <button type="button" id="add-button" class="btn btn-success float-right btn-sm shadow-sm">+</button>
                                                <button type="button" id="remove-button" class="btn btn-danger float-right btn-sm shadow-sm ml-1" disabled="disabled">-</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="dynamic-field-1" class="form-group form-md-line-input dynamic-field">
                                                <label for="field" class="font-weight-bold">Sub description </label>
                                                <input type="text" id="field" class="form-control" name="subdescriptions[]" />
                                            </div>
                                            </div>
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
@push('scripts')
    <script>
        'use strict'
        $(document).ready(function() {
            var buttonAdd = $("#add-button");
            var buttonRemove = $("#remove-button");
            var className = ".dynamic-field";
            var count = 0;
            var field = "";
            var maxFields = 20;

            function totalFields() {
                return $(className).length;
            }

            function addNewField() {
                count = totalFields() + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.children("label").text("Sub description  " + count);
                field.find("input").val("");
                $(className + ":last").after($(field));
            }

            function removeLastField() {
                if (totalFields() > 1) {
                    $(className + ":last").remove();
                }
            }

            function enableButtonRemove() {
                if (totalFields() === 2) {
                    buttonRemove.removeAttr("disabled");
                    buttonRemove.addClass("shadow-sm");
                }
            }

            function disableButtonRemove() {
                if (totalFields() === 1) {
                    buttonRemove.attr("disabled", "disabled");
                    buttonRemove.removeClass("shadow-sm");
                }
            }

            function disableButtonAdd() {
                if (totalFields() === maxFields) {
                    buttonAdd.attr("disabled", "disabled");
                    buttonAdd.removeClass("shadow-sm");
                }
            }

            function enableButtonAdd() {
                if (totalFields() === (maxFields - 1)) {
                    buttonAdd.removeAttr("disabled");
                    buttonAdd.addClass("shadow-sm");
                }
            }

            buttonAdd.click(function() {
                addNewField();
                enableButtonRemove();
                disableButtonAdd();
            });

            buttonRemove.click(function() {
                removeLastField();
                disableButtonRemove();
                enableButtonAdd();
            });
        });
    </script>
@endpush
