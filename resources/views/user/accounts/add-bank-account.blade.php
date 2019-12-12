@extends('user.layouts.master')

@section('content')

    <section class="funds pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="funds-card mt-3 mb-3">
                        <form action="{{ route('user.store.account' ) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-head">
                                        <h4 class="text-center">Add Bank Account</h4>
                                    </div>
                                    <div class="input-item input-with-label">
                                        <label for="amount" class="input-item-label">Bank Name</label>
                                        <input class="input-bordered" type="text" id="bank" name="bank"
                                               value="{{old('bank')}}"
                                               placeholder="Enter amount to withdraw">
                                    </div>

                                    <div class="input-item input-with-label">
                                        <label for="balance" class="input-item-label">Account Number
                                            <small>(IBAN)</small></label>
                                        <input class="input-bordered" type="text" id="iban" name="iban"
                                               value="{{old('iban')}}"
                                               placeholder="Enter IBAN Number">
                                    </div>
cvf
                                    <div class="input-item input-with-label">
                                        <lable>Account Holder</lable>
                                        <input class="input-bordered" type="text" id="holder" name="holder"
                                               value="{{old('holder')}}"
                                               placeholder="Enter Account Holder Name">
                                    </div>

                                    <div class="input-item input-with-label pt-2">
                                        <button class="btn btn-success btn-block" name="action" value="bank" type="submit">
                                            Submit
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
