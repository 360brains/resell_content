@extends('user.layouts.master')
@section('content')
    <section class="refer pb-3">
        <div class="refer-banner">
            <img class="img-fluid" src="{{ asset('user/images/refer-banner.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="offset-2 col-md-8 offset-2">
                    <div class="referal text-center shadow">
                        <h1>Earn with Referal</h1>
                        <p>Invite your friends & family and Get Rs.1000 for the current level</p>
                        <div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><img class="link" width="24px" src="{{ asset('user/images/refer-2.png') }}" alt="">
                            <input type="text" class="copy-address shadow-sm" value="http://cvf.sunztech.com/login?id={{auth()->user()->id}}" disabled>
                            <button class="copy-trigger copy-clipboard" data-clipboard-text="{{ route('pages.home') }}"><img width="24px" src="{{ asset('user/images/refer-1.png') }}" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="steps text-center mt-4">
            <h2>Three Simple Steps</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <p>Share the Link socially to get rewards</p>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </section>
@endsection



















