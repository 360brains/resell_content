<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-logo">
                    <h1>great Content</h1>
                    <ul>
                        <li><a href=""><i class="fas fa-globe"></i>&nbsp; US (International)/English </a></li>
                        <li><a href=""><i class="fas fa-question-circle"></i>&nbsp; Help & Support </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="freelancer">
                    <h4>Freelancer</h4>
                    <ul>
                        <li><a href="">categories</a></li>
                        <li><a href="">projects</a></li>
                        <li><a href="">contests</a></li>
                        <li><a href="">freelancers</a></li>
                        <li><a href="">enterprise</a></li>
                        <li><a href="">preferred freelancer</a></li>
                        <li><a href="">program</a></li>
                        <li><a href="">project management</a></li>
                        <li><a href="">local jobs</a></li>
                        <li><a href="">showcase</a></li>
                        <li><a href="">API for Developers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="freelancer">
                    <h4>About</h4>
                    <ul>
                        <li><a href="">about us</a></li>
                        <li><a href="">how it works</a></li>
                        <li><a href="">security</a></li>
                        <li><a href="">investors</a></li>
                        <li><a href="">enterprise</a></li>
                        <li><a href="">preferred freelancer</a></li>
                        <li><a href="">program</a></li>
                        <li><a href="">project management</a></li>
                        <li><a href="">local jobs</a></li>
                        <li><a href="">showcase</a></li>
                        <li><a href="">API for Developers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-2"></div>
        </div>
    </div>
</footer>




<div class="modal fade text-dark " id="login" tabindex="-1">
    <div class="modal-dialog  modal-dialog-sm modal-dialog-centered">
        <div class="modal-content pb-0">
            <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em
                    class="ti ti-close"></em></a>
            <div class="popup-body">
                <h4>great<span>Content</span></h4>
                <h3 class="font-weight-bold pb-2">Log into your account</h3>
                <form action="{{ route('login') }}" method="get">
                    @csrf
                    <div class="position-relative input-with-label">
                        <div class="form-group">
                            <lable>Email Address:</lable>
                            <input id="email" type="email"
                                   class="form-control input-bordered @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required
                                   autocomplete="email" autofocus
                                   placeholder="Enter Email Address">
                            <i class="fas fa-at input-at"></i>
                            @error('email')
                            <span class="invalid-feedback"
                                  role="alert"><strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <lable>Password:</lable>
                            <input type="password" class="form-control"
                                   placeholder="Enter Password ">
                            <i class="fas fa-lock input-lock"></i>
                        </div>
                        <ul class="float-right pb-2">
                            <li>
                                <a href="{{ route('user.voucher') }}" data-dismiss="modal"
                                   data-toggle="modal" data-target="#forgot"
                                   class="text-success ">Forgot password?</a>
                            </li>
                        </ul>
                        <button class="btn btn-block btn-success">SIGN IN <i
                                class="fas fa-arrow-circle-right"></i></button>
                        <div class="text-center pt-3">
                            <p>Don't have an account?
                                <a href="#" data-dismiss="modal"
                                   data-toggle="modal" data-target="#signup"
                                   class="text-success">SignUp</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .modal-content -->
</div><!-- .modal-dialog -->

<div class="modal fade text-dark" id="forgot" tabindex="-1">
    <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
        <div class="modal-content pb-0">
            <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em
                    class="ti ti-close"></em></a>
            <div class="popup-body">
                <h4>great<span>Content</span></h4>
                <h3 class="font-weight-bold pb-2">Recover Password</h3>
                <form action="#" method="get">
                    @csrf
                    <div class="position-relative input-with-label">
                        <lable>Email Address:</lable>
                        <input type="text" class="form-control" placeholder="Email Address">
                        <i class="fas fa-at input-at"></i>
                        <button class="btn btn-block btn-success mt-4">Recover <i
                                class="fas fa-arrow-circle-right"></i></button>
                        <div class="text-center pt-3">
                            <p>Don't have an account?
                                <a href="#" data-dismiss="modal"
                                   data-toggle="modal" data-target="#signup"
                                   class="text-success">SignUp</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .modal-content -->
</div><!-- .modal-dialog -->

<div class="modal fade text-dark" id="signup" tabindex="-1">
    <div class="modal-dialog modal-dialog-sm modal-dialog-centered">
        <div class="modal-content pb-0">
            <a href="#" class="modal-close" data-dismiss="modal" aria-label="Close"><em
                    class="ti ti-close"></em></a>
            <div class="popup-body">
                <h4>great<span>Content</span></h4>
                <h3 class="font-weight-bold pb-2">Create Your Free Account</h3>
                <form action="#" method="get">
                    @csrf
                    <div class="position-relative input-with-label">
                        <div class="form-group">
                            <lable>Full Name:</lable>
                            <input type="text" class="form-control" placeholder="Full Name">
                            <i class="far fa-user input-at"></i>
                        </div>
                        <div class="form-group">
                            <lable>Email Address:</lable>
                            <input type="text" class="form-control" placeholder="Email Address">
                            <i class="fas fa-at input-lock"></i>
                        </div>
                        <div class="form-group">
                            <lable>Password:</lable>
                            <input type="password" class="form-control" placeholder="Enter Password ">
                            <i class="fas fa-lock input-user"></i>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    I agree to the <a href="">Terms of Services</a> and <a href="">Privacy
                                        Policy</a>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-success mt-4">SIGN Up
                            <i class="fas fa-arrow-circle-right"></i>
                        </button>
                        <div class="text-center pt-3">
                            <p>Already have an account?
                                <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#login"
                                   class="text-success">Sign In</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- .modal-content -->
</div><!-- .modal-dialog -->


<!-- Scripts==================================================-->

<script src="{{ asset('user/assets/js/jquery.bundle49f7.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js/viewportchecker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/jQuery.style.switcher.js') }}"></script>
<script>
    $("#carousel").owlCarousel({
        autoplay: true,
        dots:true,
        loop: true,
        items: 1,
        dots: true,
        autoHeight: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        dots: true,

    });
</script>

