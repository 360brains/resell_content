@extends('user.layouts.master')
@section('content')

    <section class="setting pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div>
                        <ul class="nav d-block nav-pills" role="tablist">
                            <li><a class="nav-link active" data-toggle="pill" href="#account">Account</a></li>
                            <li><a class="nav-link" data-toggle="pill" href="#security">Security</a></li>
                            <li><a class="nav-link" data-toggle="pill" href="#notifications">Notifications</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="setting-card shadow">
                        <div class="tab-content">
                            <div id="account" class="account p-4 tab-pane active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Payment & Financials</h5>
                                        <hr>
                                        <h6>Payment Methods <a href="#"  data-toggle="modal" data-target="#pay-online"><i class="fas fa-plus-circle payment-model"></i></a></h6>
                                        <div class=" table-responsive">
                                            <table class="table table-bordered table-sm">
                                                <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Account Title</th>
                                                    <th>Account Number</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse(auth()->user()->accounts as $account)
                                                <tr>
                                                    <td>{{ $account->bank }}</td>
                                                    <td>{{ $account->holder }}</td>
                                                    <td>{{ $account->iban }}

                                                        <a title="Remove Account" class="d-none float-right remove-d-none pl-2"  aria-label="Close" href="{{ route('user.remove.account', $account->id) }}"><i class="far fa-times-circle"></i></a>
                                                        <a title="Edit Account" class="d-none float-right remove-d-none" href="{{ route('user.edit.account', $account->id) }}"><i class="far fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <h6>No Accounts</h6>
                                                @endforelse
                                                </tbody>
                                            </table>
                                                <button class="btn btn-success float-right" id="manage-btn" onclick="visible()">Manage Accounts</button>
                                            <button class="btn btn-success float-right d-none" id="save-btn" onclick="redo()">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="security" class="security p-4 tab-pane fade">
                                <form action="{{ route('user.profile.edit.password' ) }}" method="post">
                                    @csrf
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
                                                       placeholder="Enter password" name="old_password">
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
                                                           placeholder="Enter password"name="new_password">
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
                                                           placeholder="Enter password" name="confirm_password">
                                                    <p class="pt-2">8 character or longer, Combine upper and lowercase letters and
                                                        numbers.</p>
                                                    <button class="btn btn-sm btn-success float-right">Save Changes
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <hr>--}}
                                    </div>
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="mt-4">--}}
{{--                                            <div class="row">--}}
{{--                                                <div class="col-md-3">--}}
{{--                                                    <p>Phone Verification</p>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-9">--}}
{{--                                                    <div class="clearfix">--}}
{{--                                                        <div class="float-left">--}}
{{--                                                            <p>Your phone is verified. Click edit to change your phone--}}
{{--                                                                number.</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="float-right">--}}
{{--                                                            <button class="btn btn-sm btn-success float-right">Edit--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                <div class="clearfix">--}}
{{--                                                    --}}{{--                                                    <div class="float-left">--}}
{{--                                                    --}}{{--                                                        <input type="text" class="form-control"  placeholder="Enter Phone Number">--}}
{{--                                                    --}}{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                    <div class="float-right">--}}
{{--                                                    --}}{{--                                                        <button class="btn btn-sm btn-success float-right">Verify</button>--}}
{{--                                                    --}}{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                                </form>
                            </div>

                            <div id="notifications" class="notification p-4 pb-5 tab-pane fade">
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
                                        <div class="col-md-4 w-70">
                                            <h6>Type</h6>
                                            <ul>
                                                <li>Task Update</li>
                                                <li>Support Notification</li>
                                                <li>Withdraw</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 w-30">
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
                            <li><button class="btn btn-primary"> Process to add account <em class="ti ti-arrow-right mgl-2x"></em></button>
                            </li>
                        </ul>
                    </form>
                    <div class="gaps-2x"></div>
                    <div class="gaps-1x d-none d-sm-block"></div>
                    <div class="note note-plane note-light mgb-1x pt-3">
                        <p><em class="fas fa-info-circle"></em> You will automatically redirect for process  to add account after you click on process to pay.</p>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- Modal End -->

@endsection
