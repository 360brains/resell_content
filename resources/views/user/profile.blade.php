@extends('user.layouts.master')
@section('content')
    <section class="profile-content pt-5 pb-5">
        <div class="container">
            <div class="heading">
                <h4>Your Profile</h4>
            </div>
            <form action="{{ route('user.profile.edit.personal' ) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row pt-4">
                    <div class="col-md-4 ">
                        <div class="edit-profile shadow rounded">
                            <div class="text-center">
{{--                                <div class="qwerty position-relative">--}}
{{--                                    <img src="{{ url(auth()->user()->avatar) }}" alt="Avatar"--}}
{{--                                       id="imagePreview"  class="image rounded-circle avatar-preview">--}}
{{--                                    <div class="overlay rounded-circle d-none" id="user-img">--}}
{{--                                        <a href="#" class="icon-cam">--}}
{{--                                            <i class="fas fa-camera" id="upfile1"></i>--}}
{{--                                            <input type="file" id="file1" name="image" accept="image/*" capture style="display: none"/>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="container">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" disabled  class="imageUpload"  name="image" accept=".png, .jpg, .jpeg"/>
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url({{ url(auth()->user()->avatar) }})">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="pt-2">{{ auth()->user()->name }}</h2>
                                <p class="mt-3 m-0"><strong>{{ auth()->user()->country }} 4:04pm</strong></p>
                                <p><strong>Member since {{ auth()->user()->created_at }} </strong></p>
                                <button type="button" class="button button-sm button-primary mt-3 border-0 edit-profile-btn" id="edit"><i class="far fa-edit"></i> Edit Profile</button>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item input-with-label">
                                        <label for="full-name" class="input-item-label">Full Name</label>
                                        <input class="input-bordered" type="text" id="full-name" disabled name="name"
                                               value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item input-with-label">
                                        <label for="full-name" class="input-item-label">Gender</label>
                                        <select class="input-bordered" name="gender" disabled id="gender">
                                            <option value="">Select Gender</option>
                                            <option
                                                value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : ''}}>
                                                Male
                                            </option>
                                            <option
                                                value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : ''}}>
                                                Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-2">
                                    <div class="input-item input-with-label">
                                        <label for="email-address" class="input-item-label">Email Address</label>
                                        <input class="input-bordered" type="text" id="email-address" name="email"
                                               value="{{ auth()->user()->email }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <div class="input-item input-with-label">
                                        <label for="country" class="input-item-label">State</label>
                                        <input class="input-bordered" type="text" id="country"
                                               value="{{ auth()->user()->country }}" name="country" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <div class="input-item input-with-label">
                                        <label for="mobile-number" class="input-item-label">Mobile Number</label>
                                        <input class="input-bordered" type="text" id="mobile-number" name="contact"
                                               value="{{ auth()->user()->contact }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12 pt-2">
                                    {{--                                <div class="input-item input-with-label">--}}
                                    {{--                                    <label for="email-address" class="input-item-label">Address</label>--}}
                                    {{--                                    <input class="input-bordered" type="text" id="address" name="email" value="">--}}
                                    {{--                                </div>--}}
                                    <button class="button button-sm button-primary mt-3 border-0 float-right d-none" id="save">Save
                                        Changes
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="earn-badges mt-4 shadow rounded">
                            <h5 class="m-0 pb-2">Earned Badges</h5>
                            <div class="pt-2">
                                @forelse(auth()->user()->trainings as $training)
                                    <div class="clearfix">
                                        <div class="float-left earn-dec">
                                            <h6 class="m-0">{{ $training->name }}
                                                <small><span>{{ date('Y', strtotime($training->created_at)) }}</span></small>
                                            </h6>
                                            <p>{!! $training->description !!} </p>
                                        </div>
                                        <div class="float-right">
                                            <img width="24px" src="{{ asset($training->badge) }}" alt="">
                                        </div>
                                    </div>
                                    <hr class="m-0 mb-3">
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @push('scripts')
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });

            $("#edit").click(function() {
                $(this).addClass('disabled');
                $('#save').removeClass('d-none');
                $('#user-img').removeClass('d-none');
                $('#full-name').prop("disabled", false);
                $('#gender').prop("disabled", false);
                $('#country').prop("disabled", false);
                $('#mobile-number').prop("disabled", false);
                $('.imageUpload').prop("disabled", false);
            });
        </script>
    @endpush
@endsection


