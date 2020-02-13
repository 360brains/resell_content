@extends('user.layouts.master')

@section('content')

    <section class="funds pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="funds-card mt-3 mb-3">
                    <form action="{{ route('user.update.account', $account->id ) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-head text-center">
                                    <h4 class="card-title">Edit Bank Account</h4>
                                </div>
                                <div class="input-item input-with-label">
                                    <label for="amount" class="input-item-label">Bank Name</label>
                                    <input class="input-bordered" type="text" id="bank" name="bank" value="{{$account->bank}}"  placeholder="Enter amount to withdraw">
                                </div>

                                <div class="input-item input-with-label pt-2">
                                    <label for="balance" class="input-item-label">Account Number <small>(IBAN)</small></label>
                                    <input class="input-bordered" type="text" id="iban" name="iban" value="{{$account->iban}}" placeholder="Enter IBAN Number">
                                </div>

                                <div class="input-item input-with-label pt-2">Account Holder</label>
                                    <input class="input-bordered" type="text" id="holder" name="holder" value="{{$account->holder}}" placeholder="Enter Account Holder Name">
                                </div>

                                <div class="input-item input-with-label pt-4">
                                    <button class="btn btn-success btn-block" name="action" value="bank" type="submit">Submit</button>
                                </div>

                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </div>
                <!-- .tab-pane -->
            </div>
        </div>
        <!-- .card-innr -->
    </div>
    </section>

@endsection
