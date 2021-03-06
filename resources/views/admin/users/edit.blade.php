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
                <span>Edit</span>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right open">
                <a href="{{ url()->previous() }}" class="btn red btn-sm" > <b><i class="fa fa-backward"></i> Back</b></a>
            </div>
        </div>

    </div>
    <h3 class="page-title">Users
        <small>Edit User</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.users.update', $users->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="name" class="form-control" id="form_control_1" placeholder="Enter User Name" value="{{$users->name}}">
                                        <label>User Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="gender">
                                            <option value="">Select Gender of User</option>
                                            <option value="Male" {{$users->gender == 'Male' ? 'selected':''}}>Male</option>
                                            <option value="Female" {{$users->gender == 'Female' ? 'selected':''}}>Female</option>
                                        </select>
                                        <label>Gender</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="email" name="email" class="form-control" id="form_control_1" placeholder="Enter Email-Adress" value="{{$users->email}}">
                                        <label>Email-Address</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="password" class="form-control" id="form_control_1" placeholder="Enter Password">
                                        <label>password</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="contact" class="form-control" id="form_control_1" placeholder="Enter Contact Number" value="{{$users->contact}}">
                                        <label>Contact No.</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <select class="form-control" name="active">
                                            <option value="">Status</option>
                                            <option value="1" {{$users->active == '1' ? 'selected':''}}>Active</option>
                                            <option value="0" {{$users->active == '0' ? 'selected':''}}>Deactive</option>
                                        </select>
                                        <label>Status</label>
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
