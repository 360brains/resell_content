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

                                <div>
                                    <small>Please make sure the JazzCash acoount exists.</small>
                                </div>

                                <div class="input-item input-with-label">
                                    <label for="balance" class="input-item-label">JazzCash Number</label>
                                    <input class="input-bordered" type="text" id="iban" name="iban" value="{{old('iban')}}" placeholder="Enter JazzCash Phone Number">
                                </div>

                                <div class="input-item input-with-label">Account Holder</label>
                                    <input class="input-bordered" type="text" id="iban" name="holder" value="{{old('holder')}}" placeholder="Enter Account Holder Name">
                                </div>

                                <div class="input-item input-with-label">
                                    <button class="btn btn-primary" name="action" value="jazzcash" type="submit">Submit</button>
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

@endsection
