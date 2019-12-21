@extends('user.layouts.master')

@section('content')
    <section class="funds pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 ">
                    <div class="funds-heading text-center">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <h5><a class="hvrcenter active" href="{{ route('withdraw.create') }}">Withdraw</a></h5>
                            </div>
                            <div class="col-md-6">
                                <h5><a class="hvrcenter" href="#" data-toggle="modal"
                                       data-target="#deposit2">Deposit</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="funds-card mt-3 mb-3">
                        <div class="withdraw-blnc text-center">
                            <h1>Rs. {{Auth::user()->balance}}</h1>
                            <h4 class="pt-3">Available Balance</h4>
                        </div>
                        <form action="{{ route('withdraw.store' ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if(Auth::user()->balance < 500)
                                <div class="alert alert-secondary" role="alert">
                                    You must have atleast 500 balance to make a withdraw request!
                                </div>
                            @else

                                <div class="input-item input-with-label pt-2">
                                    <label for="amount" class="input-item-label">
                                        <h5>Amount</h5>
                                    </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rs</span>
                                        </div>
                                        <input class="input-bordered form-control" type="number"
                                               aria-describedby="basic-addon1" id="amount" name="amount"
                                               value="{{old('amount')}}" placeholder="Enter amount to withdraw">
                                    </div>
                                </div>
                                <div class="input-item input-with-label  position-relative">
                                    <i class="fas custom-arrow fa-chevron-down"></i>
                                    <label class="input-item-label">
                                        <h5>Select payment method</h5>
                                    </label>
                                    <select class=" input-bordered" name="account">
                                        @forelse(auth()->user()->accounts as $account)
                                            <option value="{{ $account->id }}">
                                                <h6>{{ $account->bank }}</h6>&emsp;
                                                <h6>{{ $account->iban }} {{ $account->holder }}</h6>
                                            </option>
                                        @empty
                                            <option>
                                                <h5>No Accounts added. <a href="">Add Account</a></h5>
                                            </option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="clearfix pt-2">
                                    <p class="float-left">Transaction Fee</p>
                                    <p class="float-right">Rs. 0</p>
                                </div>
                                <div class="input-item input-with-label">
                                    <button class="btn btn-success btn-block" type="submit">Continue</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

            <div class="card p-4">
                <div class="card-innr">
                    <div class="card-head">
                        <h4 class="card-title pb-3">Pending Requests</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table-sm table table-bordered">
                            <thead>
                            <tr class="data-item ">
                                <th>Account (IBAN) Number</th>
                                <th>Account Holder</th>
                                <th>Bank Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($withdrawRequests as $withdrawRequest)
                                <tr>
                                    <td>{{$withdrawRequest->iban}}</td>
                                    <td>{{$withdrawRequest->holder}}</td>
                                    <td>{{$withdrawRequest->bank}}</td>
                                    <td>{{$withdrawRequest->amount}}</td>
                                    <td>{{$withdrawRequest->status}}</td>
                                    <td>{{date('d-M-y h:i',strtotime($withdrawRequest->created_at))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal fade" id="deposit2" tabindex="-1">
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
                                    <label class="pay-check-label" for="easypaisa"><img src="{{ asset('user/images/telenor-pakistan-easypaisa-logo.png') }}" alt="pay-logo"></label>
                                </li>
                                <li class="pay-item">
                                    <input type="radio" class="pay-check" name="option" value="jazzcash" id="jazzcash">
                                    <label class="pay-check-label" for="jazzcash"><img src="{{ asset('user/images/JazzCash_logo.png') }}" alt="pay-logo"></label>
                                </li>
                                <li class="pay-item">
                                    <input type="radio" class="pay-check" name="option" value="bank" id="bank">
                                    <label class="pay-check-label" for="bank"><img src="{{ asset('user/images/Bank-Free-Download-PNG.png') }}" alt="pay-logo"></label>
                                </li>
                            </ul>
                            {{--                    <div class="pdb-2-5x pdt-1-5x">--}}
                            {{--                        <input type="checkbox" class="input-checkbox input-checkbox-md" id="agree-term-3">--}}
                            {{--                        <label for="agree-term-3">I hereby agree to the <strong>Membership purchase aggrement</strong>.</label>--}}
                            {{--                    </div>--}}
                            <ul class="d-flex flex-wrap align-items-center guttar-30px">
                                <li><button class="btn btn-primary"> Process to Pay <em class="ti ti-arrow-right mgl-2x"></em></button>
                                </li>
                                <li class="pdt-1x pdb-1x pl-2"><a href="{{ route('user.voucher') }}" class="link link-primary">Make Manual Payment</a></li>
                            </ul>
                        </form>

                        <div class="gaps-2x"></div>
                        <div class="gaps-1x d-none d-sm-block"></div>
                        <div class="note note-plane note-light mgb-1x">
                            <p><em class="fas fa-info-circle"></em> You will automatically redirect for payment after you click on process to pay.</p>
                        </div>
                    </div>
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- Modal End -->
    </section>
@endsection
