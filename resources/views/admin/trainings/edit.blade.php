@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Trainings</span>
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
        <small>Create Training</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.trainings.update', $trainings->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" value="{{$trainings->name}}" class="form-control" id="form_control_1" placeholder="Enter Test Name">
                                        <label>Training Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <div class="md-checkbox has-info">
                                            <input type="checkbox" id="checkbox35" class="md-check"
                                            @if($trainings->fee != null)
                                                checked
                                            @endif>
                                            <label for="checkbox35" style="color: #333;">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span>Fee</label>
                                            <input type="number" name="fee" value="{{$trainings->fee}}" class="form-control" disabled id="fee" placeholder="Enter Fee" value="{{old('fee')}}">
                                        </div>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="type">
                                            <option value="">Select type of training</option>
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ $type->id ==  $trainings->type_id ? 'selected' : '' }}>{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label>Type</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="active">
                                            <option value="">Select status of training</option>
                                            <option value="1" {{ $trainings->active = 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{ $trainings->active = 0 ? 'selected' : ''}}>Deactive</option>
                                        </select>
                                        <label>Status</label>
                                    </div>
                                    <div class="form-group form-md-line-input">
                                        <textarea name="description" class="summernote" placeholder="Description" >{!! $trainings->description !!}</textarea>
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
        document.getElementById('checkbox35').onchange = function() {
            document.getElementById('fee').disabled = !this.checked;
        };
    </script>
@endpush
