@extends('user.layouts.master')
@section('content')
    <section class="refer pb-3">
        <div class="refer-banner position-relative">
            <img class="img-fluid" src="{{ asset('user/images/refer-banner.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="referal text-center shadow">
                        <h1>Earn with Referal</h1>
                        <p>Invite your friends & family and Get Rs.1000 for the current level</p>
                        <div class="copy-wrap mgb-0-5x"><span class="copy-feedback"></span><img class="link" width="24px" src="{{ asset('user/images/refer-2.png') }}" alt="">
                            <input type="text" class="copy-address shadow-sm" value="http://resellcontent.com/register?id={{auth()->user()->id}}" disabled>
                            <button class="copy-trigger copy-clipboard" data-clipboard-text="http://resellcontent.com/register?id={{auth()->user()->id}}"><img width="24px" src="{{ asset('user/images/refer-1.png') }}" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="steps text-center">
            <h2>Three Simple Steps</h2>
            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-4">
                        <img width="60px" class="pb-4" src="{{ asset('user/images/ic_link.svg') }}" alt="">
                        <p>Share the Link socially to get rewards</p>
                    </div>
                    <div class="col-md-4">
                        <img width="60px" class="pb-2" src="{{ asset('user/images/ic_profile.svg') }}" alt="">
                        <p>Your friend signs up to greatContent</p>
                    </div>
                    <div class="col-md-4">
                        <img width="60px" class="pb-4" src="{{ asset('user/images/ic_rupees.svg') }}" alt="">
                        <p>You get RS. 250 of their first amount</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



















