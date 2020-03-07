@extends("layouts.master")

@section("content")
    <div class="browse-img" style="background-image:url({{ asset('assets/img/about-us.png') }});background-size: 100% 100%;">
        <h1>About Us</h1>
    </div>
    <section class="about-us pt-5 pb-5">
        <div class="container">
            <div class="about-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Who We Are</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae congue purus, sit
                            amet placerat mi. Etiam lacinia mauris eu leo pellentesque semper. Sed rhoncus quam et
                            euismod volutpat. Fusce eget dui ex. In eu eros sed augue commodo aliquet. Sed dictum metus
                            ut turpis viverra pretium. Aenean tincidunt enim ac risus ornare, sed auctor velit rhoncus.
                            Fusce ut metus vel risus bibendum scelerisque. Quisque eu sapien lacus. Aliquam porttitor
                            augue nec sollicitudin venenatis. Donec augue tellus, molestie in lacinia sed, facilisis at
                            turpis. Praesent purus dui, iaculis ac condimentum ut, interdum id libero. Praesent id arcu
                            pharetra, porta ligula at, tempor magna. Vestibulum ante ipsum primis in faucibus orci
                            luctus et ultrices posuere cubilia Curae; Donec in purus porta orci gravida finibus et sed
                            libero. Etiam tincidunt sapien vitae odio laoreet efficitur.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2>Our Mission</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae congue purus, sit
                            amet placerat mi. Etiam lacinia mauris eu leo pellentesque semper. Sed rhoncus quam et
                            euismod volutpat. Fusce eget dui ex. In eu eros sed augue commodo aliquet. Sed dictum metus
                            ut turpis viverra pretium. Aenean tincidunt enim ac risus ornare, sed auctor velit rhoncus.
                            Fusce ut metus vel risus bibendum scelerisque. Quisque eu sapien lacus. Aliquam porttitor
                            augue nec sollicitudin venenatis. Donec augue tellus, molestie in lacinia sed, facilisis at
                            turpis. Praesent purus dui, iaculis ac condimentum ut, interdum id libero. Praesent id arcu
                            pharetra, porta ligula at, tempor magna. Vestibulum ante ipsum primis in faucibus orci
                            luctus et ultrices posuere cubilia Curae; Donec in purus porta orci gravida finibus et sed
                            libero. Etiam tincidunt sapien vitae odio laoreet efficitur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="our-progress pt-4">
            <div class="prog-img">
                <img class="img-fluid w-100" src="{{ asset('assets/img/about-us2.png') }}" alt="">
            </div>
            <div class="prog-area">
                <div class="prog-prec">
                    <h4>Writing Projects</h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%;border-radius: 5px" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span>50%</span></div>
                    </div>
                </div>
                <div class="prog-prec">
                    <h4>Video Projects</h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%;border-radius: 5px" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span>50%</span></div>
                    </div>
                </div>
                <div class="prog-prec">
                    <h4>Total Jobs Posted</h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%;border-radius: 5px" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span>50%</span></div>
                    </div>
                </div>
                <div class="prog-prec">
                    <h4>Total User</h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%;border-radius: 5px" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><span>50%</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-end  text-center pt-5">
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/about1.png') }}" alt="">
                    <h2>Success Gurantee</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt eleifend risus a aliquet. Nam at condimentum dui, et consectetur lacus. Aliquam erat volutpat.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/about2.png') }}" alt="">
                    <h2>No Hidden Charges</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt eleifend risus a aliquet. Nam at condimentum dui, et consectetur lacus. Aliquam erat volutpat.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/about3.png') }}" alt="">
                    <h2>24/7 Availablity</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tincidunt eleifend risus a aliquet. Nam at condimentum dui, et consectetur lacus. Aliquam erat volutpat.
                    </p>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
