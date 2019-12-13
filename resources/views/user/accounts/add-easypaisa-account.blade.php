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
                                        <h4 class="card-title mb-0">Add EasyPaisa Account</h4>
                                        <small>Please make sure the EasyPaisa account exists.</small>
                                    </div>

                                    <div class="input-item input-with-label">
                                        <label for="balance" class="input-item-label">EasyPaisa Number</label>
                                        <input class="input-bordered" type="text" id="iban" name="number"
                                               value="{{old('number')}}" placeholder="Enter EasyPaisa Phone Number">
                                    </div>

                                    <div class="input-item input-with-label pt-2">Account Holder</label>
                                        <input class="input-bordered" type="text" id="iban" name="holder"
                                               value="{{old('holder')}}" placeholder="Enter Account Holder Name">
                                    </div>

                                    <div class="input-item input-with-label pt-4">
                                        <button class="btn btn-success btn-block" name="action" value="easypaisa" type="submit">
                                            Submit
                                        </button>
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
