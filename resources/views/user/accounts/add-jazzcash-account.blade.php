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
                                    <div class="card-head text-center">
                                        <h4 class="card-title mb-0">Add JazzCash Account</h4>
                                        <small>Please make sure the JazzCash account exists.</small>
                                    </div>

                                    <div class="input-item input-with-label pt-2">
                                        <label for="balance" class="input-item-label">JazzCash Number</label>
                                        <input class="input-bordered" type="text" id="iban" name="number"
                                               value="{{old('number')}}" placeholder="Enter JazzCash Phone Number">
                                    </div>

                                    <div class="input-item input-with-label pt-2">Account Holder</label>
                                        <input class="input-bordered" type="text" id="iban" name="holder"
                                               value="{{old('holder')}}" placeholder="Enter Account Holder Name">
                                    </div>

                                    <div class="input-item input-with-label pt-4">
                                        <button class="btn btn-success btn-block" name="action" value="jazzcash" type="submit">
                                            Submit
                                        </button>
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
    </section>

@endsection
