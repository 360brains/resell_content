@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="card content-area">
                <div class="card-innr">
                    <div class="card-head">
                        <h4 class="card-title">Add Bank Account</h4>
                    </div>
                    <form action="{{ route('user.store.account' ) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">

                                <div class="input-item input-with-label">
                                    <label for="amount" class="input-item-label">Bank Name</label>
                                    <input class="input-bordered" type="text" id="bank" name="bank" value="{{old('bank')}}"  placeholder="Enter amount to withdraw">
                                </div>

                                <div class="input-item input-with-label">
                                    <label for="balance" class="input-item-label">Account Number <small>(IBAN)</small></label>
                                    <input class="input-bordered" type="text" id="iban" name="iban" value="{{old('iban')}}">
                                </div>

                                <div class="input-item input-with-label">
                                    <label for="balance" class="input-item-label">Account Number <small>(IBAN)</small></label>
                                    <input class="input-bordered" type="text" id="iban" name="iban" value="{{old('iban')}}">
                                </div>


                                <div class="input-item input-with-label">
                                    <label for="account" class="input-item-label">Account (IBAN) Number</label>
                                    <input class="input-bordered" type="text" id="iban" name="iban" value="{{old('iban')}}" placeholder="Enter account number">
                                </div>
                                <div class="input-item input-with-label">
                                    <label for="account" class="input-item-label">Account Holder</label>
                                    <input class="input-bordered" type="text" id="holder" name="holder" value="{{old('holder')}}" placeholder="Enter Account Holder">
                                </div>
                                <div class="input-item input-with-label">
                                    <label for="account" class="input-item-label">Bank Name</label>
                                    <input class="input-bordered" type="text" id="bank" name="bank" value="{{old('bank')}}" placeholder="Enter Bank Name">
                                </div>
                                <div class="input-item input-with-label">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
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
