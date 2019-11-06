@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="card content-area">
                <div class="card-innr">
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
                                            <input class="input-bordered" type="number" id="amount" name="amount" placeholder="Enter amount to withdraw">
                                        </div>
                                        <div class="input-item input-with-label">
                                            <label for="account" class="input-item-label">Account</label>
                                            <input class="input-bordered" type="text" id="account" name="account" value="{{old('account')}}" placeholder="Enter account number">
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
                            <th>Account</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($withdrawRequests as $withdrawRequest)
                        <tr>
                            <td>{{$withdrawRequest->account}}</td>
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
