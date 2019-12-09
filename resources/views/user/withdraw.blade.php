@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="card content-area">
                <div class="card-innr">
                    <div class="card-head">
                        <h4 class="card-title">Withdraw Request</h4>
                    </div>
                            <form action="{{ route('withdraw.store' ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="input-item input-with-label">
                                            <label for="balance" class="input-item-label">Available Balance</label>
                                            <input class="input-bordered" type="number" id="balance" name="balance" value="{{Auth::user()->balance}}">
                                        </div>
                                        @if(Auth::user()->balance < 500)
                                            <div class="alert alert-secondary" role="alert">
                                                You must have atleast 500 balance to make a withdraw request!
                                            </div>
                                        @else
                                        <div class="input-item input-with-label">
                                            <label for="amount" class="input-item-label">Amount</label>
                                            <input class="input-bordered" type="number" id="amount" name="amount" value="{{old('amount')}}"  placeholder="Enter amount to withdraw">
                                        </div>
                                            <div class="input-item input-with-label">
                                                <label class="input-item-label">
                                                    <h5 class="mgt-1-5x font-mid">Select payment method</h5>
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
                                        <div class="input-item input-with-label">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </form>
                            <!-- form -->
                        </div>
                        <!-- .tab-pane -->
                    </div>
                </div>
                <!-- .card-innr -->
            </div>

    <div class="page-content">
        <div class="container">
            <div class="card content-area">
                <div class="card-innr">
                    <div class="card-head">
                        <h4 class="card-title">Pending Requests</h4>
                    </div>
                    <table class="data-table table-bordered">
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
                        <!-- .data-item -->
                        </tbody>
                    </table>
                </div>
                <!-- .card-innr -->
            </div>
            <!-- .card -->
        </div>
        <!-- .container -->
    </div>

@endsection
