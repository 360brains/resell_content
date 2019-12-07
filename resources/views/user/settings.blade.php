@extends('user.layouts.master')
@section('content')

    <section class="setting pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div>
                        <ul class="nav d-block" role="tablist">
                            <li><a data-toggle="pill" href="#account">Account</a></li>
                            <li><a data-toggle="pill" href="#security">Security</a></li>
                            <li><a data-toggle="pill" href="#notification">Notifications</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="setting-card shadow">
                        <div class="tab-content">
                            <div id="account" class="account p-4 tab-pane active">

                            </div>

                            <div id="security" class="security p-4 tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Change Password</h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="security-input" for="pswd">Current Password:</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" id="pswd"
                                                       placeholder="Enter password" name="pswd">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="security-input" for="newpswd">New Password:</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" id="newpswd"
                                                           placeholder="Enter password" name="pswd">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="security-input" for="confpswd">Confirm
                                                        Password:</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" id="confpswd"
                                                           placeholder="Enter password" name="pswd">
                                                    <p>8 character or longer, Combine upper and lowercase letters and
                                                        numbers.</p>
                                                    <button class="btn btn-sm btn-success float-right">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mt-4">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p>Phone Verification</p>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="clearfix">
                                                        <div class="float-left">
                                                            <p>Your phone is verified. Click edit to change your phone
                                                                number.</p>
                                                        </div>
                                                        <div class="float-right">
                                                            <button class="btn btn-sm btn-success float-right">Edit
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{--                                                <div class="clearfix">--}}
                                                    {{--                                                    <div class="float-left">--}}
                                                    {{--                                                        <input type="text" class="form-control"  placeholder="Enter Phone Number">--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="float-right">--}}
                                                    {{--                                                        <button class="btn btn-sm btn-success float-right">Verify</button>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="notification" class="notification p-4 pb-5 tab-pane fade">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Notifications</h5>
                                        <hr>
                                    </div>
                                </div>
                                <div class="notifiaction-area">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p class="pt-4">For important updates certain notifications cannot be disabled</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h6>Type</h6>
                                            <ul>
                                                <li>Task Update</li>
                                                <li>Support Notification</li>
                                                <li>Withdraw</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 ">
                                            <h6>Email</h6>
                                            <form>
                                                <input type="checkbox" id="fruit1">
                                                <label for="fruit1"></label>
                                                <input type="checkbox" id="fruit2">
                                                <label for="fruit2"></label>
                                                <input type="checkbox" id="fruit3">
                                                <label for="fruit3"></label>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>Enable/Disable Sound</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="switch">
                                            <div class="d-inline-flex ">
                                                <input type="checkbox" class="input-switch input-switch-sm" id="CheckBox_13">
                                                <label for="CheckBox_13"></label>
                                                <i class="fas fa-volume-up"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn btn-success float-right">Save Changes</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
