@extends('user.layouts.master')

@section('content')
    <section class="funds pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="funds-heading text-center">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <h5><a class="hvrcenter" href="">Withdraw</a></h5>
                            </div>
                            <div class="col-md-6">
                                <h5><a class="hvrcenter" href="">Deposit</a></h5>
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
                                        <input class="input-bordered form-control" type="number" aria-describedby="basic-addon1" id="amount" name="amount"
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
                            <table class="data-table table table-bordered">
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
    </section>
@endsection
