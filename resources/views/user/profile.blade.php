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
                    <div class="referral-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Deposit Funds</h6>
                            <p>You can deposit funds to use in future.<br><small><b>NOTE: Deposited funds are added to Balance.</b></small></p>
                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#pay-online">Deposit Funds</a>

                            <!-- .copy-wrap -->
                        </div>
                    </div>
                    <div class="kyc-info card">
                        <div class="card-innr">
                            <h6 class="card-title card-title-sm">Add Bank Account</h6>
                            <p>Add bank Account that you would like to use for your future transactions.</p>
                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#pay-online">Add Account</a>
                            <h5 class="card-title card-title-sm pt-3">Previous Accounts</h5>
                            @forelse(auth()->user()->accounts as $account)
                                <h6>{{ $account->bank }} <small> ( {{ $account->holder }} )</small>
                                </h6>
                                <h6>{{ $account->iban }}
                                    <a class="float-right" href="{{ route('user.remove.account', $account->id) }}">Remove</a>
                                    <a class="float-right pr-2" href="{{ route('user.edit.account', $account->id) }}">Edit</a>
                                </h6>

                                <hr>
                            @empty
                                <h6>No Accounts</h6>
                            @endforelse
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="pay-online" tabindex="-1">
        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
            <div class="modal-content pb-0">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="popup-body">
                    <h4 class="popup-title">Add account for future transactions</h4>
                    <p>You can choose any of following payment method. You will be able to use these accounts for future references.</p>
                    <h5 class="mgt-1-5x font-mid">Select payment method:</h5>
                    <form action="{{ route('user.add.account') }}" method="get">
                        @csrf
                    <ul class="pay-list guttar-20px">
                        <li class="pay-item">
                            <input type="radio" class="pay-check" name="option" value="easypaisa" id="pay-coin">
                            <label class="pay-check-label" for="pay-coin"><img src="images/telenor-pakistan-easypaisa-logo.png" alt="pay-logo"></label></li>
                        <li class="pay-item">
                            <input type="radio" class="pay-check" name="option" value="jazzcash" id="pay-coinpay">
                            <label class="pay-check-label" for="pay-coinpay"><img src="images/JazzCash_logo.png" alt="pay-logo"></label>
                        </li>
                        <li class="pay-item">
                            <input type="radio" class="pay-check" name="option" value="bank" id="pay-paypal">
                            <label class="pay-check-label" for="pay-paypal"><img src="images//Bank-Free-Download-PNG.png" alt="pay-logo"></label>
                        </li>
                    </ul>
{{--                    <div class="pdb-2-5x pdt-1-5x">--}}
{{--                        <input type="checkbox" class="input-checkbox input-checkbox-md" id="agree-term-3">--}}
{{--                        <label for="agree-term-3">I hereby agree to the <strong>Membership purchase aggrement</strong>.</label>--}}
{{--                    </div>--}}
                        <ul class="d-flex flex-wrap align-items-center guttar-30px">
                            <li><button class="btn btn-primary"> Process to Pay <em class="ti ti-arrow-right mgl-2x"></em></button>
                            </li>
                            <li class="pdt-1x pdb-1x"><a href="{{ route('user.voucher') }}" class="link link-primary">Make Manual Payment</a></li>
                        </ul>
                    </form>

                    <div class="gaps-2x"></div>
                    <div class="gaps-1x d-none d-sm-block"></div>
                    <div class="note note-plane note-light mgb-1x"><em class="fas fa-info-circle"></em>
                        <p class="text-light">You will automatically redirect for payment after you click on process to pay.</p>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- Modal End -->


    <div class="modal fade" id="deposit" tabindex="-1">
        <div class="modal-dialog modal-dialog-md modal-dialog-centered">
            <div class="modal-content pb-0">
                <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em class="ti ti-close"></em></a>
                <div class="popup-body">
                    <h4 class="popup-title">Choose method to deposit funds</h4>
                    <p>You can choose any of following payment method. Deposited funds will be added to your balance as soon as it is approved by the admin.</p>
                    <h5 class="mgt-1-5x font-mid">Select payment method:</h5>
                    <form action="{{ route('user.deposit.funds') }}" method="get">
                        @csrf
                        <ul class="pay-list guttar-20px">
                            <li class="pay-item">
                                <input type="radio" class="pay-check" name="option" value="easypaisa" id="easypaisa">
                                <label class="pay-check-label" for="easypaisa"><img src="images/telenor-pakistan-easypaisa-logo.png" alt="pay-logo"></label>
                            </li>
                            <li class="pay-item">
                                <input type="radio" class="pay-check" name="option" value="jazzcash" id="jazzcash">
                                <label class="pay-check-label" for="jazzcash"><img src="images/JazzCash_logo.png" alt="pay-logo"></label>
                            </li>
                            <li class="pay-item">
                                <input type="radio" class="pay-check" name="option" value="bank" id="bank">
                                <label class="pay-check-label" for="bank"><img src="images//Bank-Free-Download-PNG.png" alt="pay-logo"></label>
                            </li>
                        </ul>
                        {{--                    <div class="pdb-2-5x pdt-1-5x">--}}
                        {{--                        <input type="checkbox" class="input-checkbox input-checkbox-md" id="agree-term-3">--}}
                        {{--                        <label for="agree-term-3">I hereby agree to the <strong>Membership purchase aggrement</strong>.</label>--}}
                        {{--                    </div>--}}
                        <ul class="d-flex flex-wrap align-items-center guttar-30px">
                            <li><button class="btn btn-primary"> Process to Pay <em class="ti ti-arrow-right mgl-2x"></em></button>
                            </li>
                            <li class="pdt-1x pdb-1x"><a href="{{ route('user.voucher') }}" class="link link-primary">Make Manual Payment</a></li>
                        </ul>
                    </form>

                    <div class="gaps-2x"></div>
                    <div class="gaps-1x d-none d-sm-block"></div>
                    <div class="note note-plane note-light mgb-1x"><em class="fas fa-info-circle"></em>
                        <p class="text-light">You will automatically redirect for payment after you click on process to pay.</p>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- Modal End -->


@endsection
