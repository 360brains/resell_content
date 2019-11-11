@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="main-content col-lg-8">
                    <div class="content-area card">
                        <div class="card-innr">
                            <div class="card-head">
                                <h4 class="card-title">Profile Details</h4></div>
                            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#personal-data">Personal Data</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Settings</a></li>
                                <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#password">Password</a></li>
                            </ul>
                            <!-- .nav-tabs-line -->
                            <div class="tab-content" id="profile-details">
                                <div class="tab-pane fade show active" id="personal-data">
                                    <form action="{{ route('user.profile.edit.personal' ) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="full-name" class="input-item-label">Full Name</label>
                                                    <input class="input-bordered" type="text" id="full-name" name="name" value="{{ auth()->user()->name }}">
                                                </div>
                                                <!-- .input-item -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="email-address" class="input-item-label">Email Address</label>
                                                    <input class="input-bordered" type="text" id="email-address" name="email" value="{{ auth()->user()->email }}" disabled>
                                                </div>
                                                <!-- .input-item -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="country" class="input-item-label">Country</label>
                                                    <input class="input-bordered" type="text" id="country" value="{{ auth()->user()->country }}" name="country">
                                                </div>
                                                <!-- .input-item -->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="mobile-number" class="input-item-label">Mobile Number</label>
                                                    <input class="input-bordered" type="text" id="mobile-number" name="contact" value="{{ auth()->user()->contact }}">
                                                </div>
                                                <!-- .input-item -->
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="gender" class="input-item-label">Gender</label>
                                                    <select class="select-bordered select-block" name="gender" id="gender">
                                                        <option value="">Gender</option>
                                                        <option value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                        <option value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                    </select>
                                                </div>
                                                <!-- .input-item -->
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="image" class="input-item-label">Select Image</label>
                                                    <input class="input-bordered" type="file" id="image" name="image">
                                                </div>
                                                <!-- .input-item -->
                                            </div>

                                            <!-- .col -->
                                        </div>
                                        <!-- .row -->
                                        <div class="gaps-1x"></div>
                                        <!-- 10px gap -->
                                        <div class="d-sm-flex justify-content-between align-items-center">
                                            <button class="btn btn-primary">Update Profile</button>
                                            <div class="gaps-2x d-sm-none"></div><span class="text-success"><em class="ti ti-check-box"></em> All Changes are saved</span></div>
                                    </form>
                                    <!-- form -->
                                </div>
                                <!-- .tab-pane -->
                                <div class="tab-pane fade" id="settings">
                                    <div class="pdb-1-5x">
                                        <h5 class="card-title card-title-sm text-dark">Security Settings</h5> </div>
                                    <div class="input-item">
                                        <input type="checkbox" class="input-switch input-switch-sm" id="save-log" checked>
                                        <label for="save-log">Save my Activities Log</label>
                                    </div>
                                    <div class="input-item">
                                        <input type="checkbox" class="input-switch input-switch-sm" id="pass-change-confirm">
                                        <label for="pass-change-confirm">Confirm me through email before password change</label>
                                    </div>
                                    <div class="pdb-1-5x">
                                        <h5 class="card-title card-title-sm text-dark">Manage Notification</h5> </div>
                                    <div class="input-item">
                                        <input type="checkbox" class="input-switch input-switch-sm" id="latest-news" checked>
                                        <label for="latest-news">Notify me by email about sales and latest news</label>
                                    </div>
                                    <div class="input-item">
                                        <input type="checkbox" class="input-switch input-switch-sm" id="activity-alert" checked>
                                        <label for="activity-alert">Alert me by email for unusual activity.</label>
                                    </div>
                                    <div class="gaps-1x"></div>
                                    <div class="d-flex justify-content-between align-items-center"><span></span><span class="text-success"><em class="ti ti-check-box"></em> Setting has been updated</span></div>
                                </div>
                                <!-- .tab-pane -->
                                <div class="tab-pane fade" id="password">
                                    <form action="{{ route('user.profile.edit.password' ) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="old-pass" class="input-item-label">Old Password</label>
                                                    <input class="input-bordered" type="password" id="old-pass" name="old_password">
                                                </div>
                                                <!-- .input-item -->
                                            </div>
                                            <!-- .col -->
                                        </div>
                                        <!-- .row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="new-pass" class="input-item-label">New Password</label>
                                                    <input class="input-bordered" type="password" id="new-pass" name="new_password">
                                                </div>
                                                <!-- .input-item -->
                                            </div>
                                            <!-- .col -->
                                            <div class="col-md-6">
                                                <div class="input-item input-with-label">
                                                    <label for="confirm-pass" class="input-item-label">Confirm New Password</label>
                                                    <input class="input-bordered" type="password" id="confirm-pass" name="confirm_password">
                                                </div>
                                                <!-- .input-item -->
                                            </div>
                                            <!-- .col -->
                                        </div>
                                        <!-- .row -->
                                        <div class="note note-plane note-info pdb-1x"><em class="fas fa-info-circle"></em>
                                            <p>Password should be minmum 8 letter and include lower and uppercase letter.</p>
                                        </div>
                                        <div class="gaps-1x"></div>
                                        <!-- 10px gap -->
                                        <div class="d-sm-flex justify-content-between align-items-center">
                                            <button class="btn btn-primary">Update</button>
                                            <div class="gaps-2x d-sm-none"></div><span class="text-success"><em class="ti ti-check-box"></em>  Changed Password</span>
                                        </div>
                                    </form>
                                </div>

                                <!-- .tab-pane -->
                            </div>
                            <!-- .tab-content -->
                        </div>
                        <!-- .card-innr -->

                    </div>
                    <div class="content-area card">
                        <div class="card-innr">
                            <div class="card-head">
                                <h4 class="card-title">Two-Factor Verification</h4></div>
                            <p>Two-factor authentication is a method for protection your web account. When it is activated you need to enter not only your password, but also a special code. You can receive this code by in mobile app. Even if third person will find your password, then can't access with that code.</p>
                            <div class="d-sm-flex justify-content-between align-items-center pdt-1-5x"><span class="text-light ucap d-inline-flex align-items-center"><span class="mb-0"><small>Current Status:</small></span> <span class="badge badge-disabled ml-2">Disabled</span></span>
                                <div class="gaps-2x d-sm-none"></div>
                                <button class="order-sm-first btn btn-primary">Enable 2FA</button>
                            </div>
                        </div>
                        <!-- .card-innr -->
                    </div>
                </div>
                <div class="aside sidebar-right col-lg-4">


                    <div class="account-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Your Account Status</h6>
                            <ul class="btn-grp">
                                <li><a href="#" class="btn btn-auto btn-xs btn-success">Email Verified</a></li>
                                <li><a href="#" class="btn btn-auto btn-xs btn-warning">KYC Pending</a></li>
                            </ul>
                            <div class="gaps-2-5x"></div>
                            <h6 class="card-title card-title-sm">Receiving Wallet</h6>
                            <div class="d-flex justify-content-between"><span><span>0x39deb3.....e2ac64rd</span> <em class="fas fa-info-circle text-exlight" data-toggle="tooltip" data-placement="bottom" title="1 ETH = 100 TWZ"></em></span><a href="#" data-toggle="modal" data-target="#edit-wallet" class="link link-ucap">Edit</a></div>
                        </div>
                    </div>
                    <div class="referral-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Earn with Referral</h6>
                            <p class=" pdb-0-5x">Invite your friends &amp; family and Get <strong><span class="text-primary">10 points</span> for the current level.</strong></p>
                            <div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><em class="fas fa-link"></em>
                                <input type="text" class="copy-address" value="{{ route('pages.home') }}/{{auth()->user()->id}}" disabled>
                                <button class="copy-trigger copy-clipboard" data-clipboard-text="{{ route('pages.home') }}"><em class="ti ti-files"></em></button>
                            </div>
                            <!-- .copy-wrap -->
                        </div>
                    </div>
                    <div class="kyc-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Add Bank Account</h6>
                            <p>Add bank Account that you would like to use for your future transactions.</p>
                            <a href="#" class="btn btn-primary btn-block">Add Account</a>
                            <h5 class="card-title card-title-sm pt-3">Previous Accounts</h5>
                            <h6>hfghfhf</h6>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
