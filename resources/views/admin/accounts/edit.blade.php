@extends('admin.layouts.master')

@section('content')

    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="javascript:;">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Accounts</span>
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
    <h3 class="page-title">Accounts
        <small>Create Account</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">

                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="{{ route('admin.accounts.update', $account->id) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="bank" value="{{$account->bank}}" class="form-control" id="form_control_1" placeholder="Enter Bank Name">
                                        <label>Bank Name</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="holder" value="{{$account->holder}}" class="form-control" id="mask_number form_control_1" placeholder="Enter Account Holder Name">
                                        <label>Account Holder</label>
                                    </div>

                                    <div class="form-group form-md-line-input">
                                        <input type="text" name="iban" value="{{$account->iban}}" class="form-control" id="mask_number form_control_1" placeholder="Enter IBAN Number" >
                                        <label>IBAN Number</label>
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
