@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Memberships</span>
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
    <h3 class="page-title">Memberships
        <small>Create Memberships</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.memberships.update', $membership->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" value="{{$membership->name}}" class="form-control" id="form_control_1" placeholder="Enter Test Name">
                                        <label>Membership Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="price" value="{{$membership->price}}" class="form-control" id="mask_number form_control_1" placeholder="Enter Fee">
                                        <label>Membership Price</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="number" name="duration" value="{{$membership->duratrion}}" class="form-control" id="mask_number form_control_1" placeholder="Enter Duration for Membership" value="{{old('duration')}}">
                                        <label>Membership Duration <small>(in months)</small></label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="file" name="image" class="form-control" id="mask_number form_control_1" value="{{old('image')}}">
                                        <label>Membership Badge</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <textarea name="description" class="summernote" placeholder="Description" >{!! $membership->description !!}</textarea>
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
