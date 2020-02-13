@extends('user.layouts.master')

@section('content')

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="token-statistics card membership height-auto shadow-lg">
                        <div class="card-innr">
                            <div class="token-balance">
                                <div class="token-balance-text">
                                    <div class="countdown-clock" data-date="2019/04/05">
                                        <div class="shadow"><span class="countdown-time countdown-time-first">DURATION</span><span class="countdown-text">1 month</span></div>
                                        <div class="shadow"><span class="countdown-time">PRICE</span><span class="countdown-text">Rs.250</span></div>
                                    </div>
                                    <div class="text-center pt-5 pb-5">
                                        <img class="img-responsive" src="{{ asset('user/images/premium.png') }}" alt="">
                                    </div>
                                </div>
                                <button class="btn btn-block btn-dark">Buy Membership</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="token-statistics card membership height-auto shadow-lg">
                        <div class="card-innr">
                            <div class="token-balance">
                                <div class="token-balance-text">
                                    <div class="countdown-clock" data-date="2019/04/05">
                                        <div class="shadow"><span class="countdown-time countdown-time-first">DURATION</span><span class="countdown-text">1 month</span></div>
                                        <div class="shadow"><span class="countdown-time">PRICE</span><span class="countdown-text">Rs.250</span></div>
                                    </div>
                                    <div class="text-center pt-5 pb-5">
                                        <img src="{{ asset('user/images/premium.png') }}" alt="">
                                    </div>
                                </div>
                                <button class="btn btn-block btn-dark">Buy Membership</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="token-statistics card membership height-auto shadow-lg">
                        <div class="card-innr">
                            <div class="token-balance ">
                                <div class="token-balance-text">
                                    <div class="countdown-clock" data-date="2019/04/05">
                                        <div class="shadow"><span class="countdown-time countdown-time-first">DURATION</span><span class="countdown-text">1 month</span></div>
                                        <div class="shadow"><span class="countdown-time">PRICE</span><span class="countdown-text">Rs.250</span></div>
                                    </div>
                                </div>
                                <div class="text-center pt-5 pb-5">
                                    <img src="{{ asset('user/images/premium.png') }}" alt="">
                                </div>
                            </div>
                            <button class="btn btn-block btn-dark">Buy Membership</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .container -->
    </div>

@endsection

