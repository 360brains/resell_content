@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="card content-area">
                <div class="card-innr">
                            <form action="{{ route('user.profile.edit.personal' ) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="input-item input-with-label">
                                            <label for="balance" class="input-item-label">Available Balance</label>
                                            <input class="input-bordered" type="number" id="balance" name="balance" disabled value="{{Auth::user()->balance}}">
                                        </div>
                                        <div class="input-item input-with-label">
                                            <label for="amount" class="input-item-label">Amount</label>
                                            <input class="input-bordered" type="number" id="amount" name="amount" placeholder="Enter amount to withdraw">
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
                        <h4 class="card-title">Notifications</h4></div>
                    <table class="data-table dt-init user-tnx">
                        <thead>
                        <tr class="data-item data-head">
                            <th class="data-col dt-tnxno">Sr No.</th>
                            <th class="data-col dt-amount">Name</th>
                            <th class="data-col dt-usd-amount">Message</th>
                            <th class="data-col dt-account">Date</th>
                            {{--                            <th class="data-col dt-type">--}}
                            {{--                                <div class="dt-type-text">Type</div>--}}
                            {{--                            </th>--}}
                            {{--                            <th class="data-col"></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td colspan="5">No Notifications Found</td></tr>
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
