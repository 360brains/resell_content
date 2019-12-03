@extends('user.layouts.master')

@section('content')
    <section class="profile-content pt-5 pb-5">
        <div class="container">
            <div class="heading">
                <h4>Your Profile</h4>
            </div>
            <div class="row pt-4">
                <div class="col-md-4 ">
                    <div class="edit-profile shadow rounded">
                        <div class="text-center">
                            <img class="rounded-circle pt-3" src="{{ url(auth()->user()->avatar) }}" alt="">
                            <h2>{{ auth()->user()->name }}</h2>
                            <p class="mt-3 m-0"><strong>{{ auth()->user()->country }} 4:04pm</strong></p>
                            <p ><strong >Member since {{ auth()->user()->created_at }} </strong></p>
                            <button class="btn-success btn-sm mt-3 border-0 edit-profile-btn" onclick="disableEdit()" id="edit"><i class="far fa-edit"></i> Edit Profile</button>
                        </div>
                    </div>
                    <div class="linked-accounts mt-4 shadow rounded">
                        <h5 class="m-0">Linked Accounts</h5>
                        <hr>
                        <div class="social">
                            <ul>
                                <li><a href=""><i class="fab fa-facebook-square"></i>&nbsp;&nbsp; Facebook</a></li>
                                <li><a href=""><i class="fab fa-google"></i>&nbsp;&nbsp; Google</a></li>
                                <li><a href=""><i class="fab fa-linkedin"></i>&nbsp;&nbsp; LinkedIn</a></li>
                                <li><a href=""><i class="fas fa-plus"></i>&nbsp;&nbsp; Twitter</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="edit-profile p-5 shadow rounded">
                        <h4>Personal Information</h4>
                        <hr>
                        <form action="{{ route('user.profile.edit.personal' ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="full-name" class="input-item-label">First Name</label>
                                    <input class="input-bordered" type="text" id="full-name" name="name" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="full-name" class="input-item-label">Last Name</label>
                                    <input class="input-bordered" type="text" id="full-name" name="name" value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item input-with-label">
                                    <label for="email-address" class="input-item-label">Email Address</label>
                                    <input class="input-bordered" type="text" id="email-address" name="email" value="{{ auth()->user()->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="country" class="input-item-label">State</label>
                                    <input class="input-bordered" type="text" id="country" value="{{ auth()->user()->country }}" name="country">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item input-with-label">
                                    <label for="mobile-number" class="input-item-label">City</label>
                                    <input class="input-bordered" type="text" id="mobile-number" name="contact" value="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-item input-with-label">
                                    <label for="email-address" class="input-item-label">Address</label>
                                    <input class="input-bordered" type="text" id="email-address" name="email" value="">
                                </div>
                                <button class="btn-success btn-sm mt-3 border-0 float-right d-none" id="save">Save Changes</button>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="earn-badges mt-4 shadow rounded">
                        <h5 class="m-0 pb-2">Earn Badges</h5>
                        <div class="pt-2">
                            <div class="clearfix">
                                <div class="float-left">
                                    <h6 class="m-0">Adobe Certified <small><span>2019</span></small></h6>
                                    <p>Adobe Certified Associate. An Adobe Certified Associate (ACA).</p>
                                </div>
                                <div class="float-right">
                                    <img src="{{ asset('user/images/badge.png') }}" alt="">
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="float-left">
                                    <h6 class="m-0">Microsoft Certified <small><span>2016</span></small></h6>
                                    <p>Adobe Certified Associate. An Adobe Certified Associate (ACA).</p>
                                </div>
                                <div class="float-right">
                                    <img src="{{ asset('user/images/badge.png') }}" alt="">
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix">
                                <div class="float-left">
                                    <h6 class="m-0">GreatContent Certified <small><span>2014</span></small></h6>
                                    <p>Adobe Certified Associate. An Adobe Certified Associate (ACA).</p>
                                </div>
                                <div class="float-right">
                                    <img src="{{ asset('user/images/badge.png') }}" alt="">
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
