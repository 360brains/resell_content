<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-logo">
                    <h1>great Content</h1>
                    <ul>
{{--                        <li><a href=""><i class="fas fa-globe"></i>&nbsp; US (International)/English </a></li>--}}
                        <li><a href="{{ route('user.help') }}"><i class="fas fa-question-circle"></i>&nbsp; Help & Support </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6">
                <div class="freelancer">
                    <h4>Freelancer</h4>
                    <ul>
                        <li><a href="">categories</a></li>
                        <li><a href="">projects</a></li>
                        <li><a href="">contests</a></li>
                        <li><a href="">freelancers</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6">
                <div class="freelancer">
                    <h4>About</h4>
                    <ul>
                        <li><a href="">about us</a></li>
                        <li><a href="">how it works</a></li>
                        <li><a href="">security</a></li>
                        <li><a href="">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6">
                <div class="freelancer">
                    <h4>Terms</h4>
                    <ul>
                        <li><a href="">privacy policy</a></li>
                        <li><a href="">terms and conditions</a></li>
                        <li><a href="">copyright policy</a></li>
                        <li><a href="">code of conduct</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6">
                <div class="freelancer">
                    <h4>Apps</h4>
                    <ul>
                        <li class="pb-2"><a href=""><img src="{{ asset('assets/img/google-play.svg') }}" alt=""></a></li>
                        <li><a href=""></a></li>
                    </ul>
                    <div class="footer-social">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href=""><i class="fab fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fab fa-youtube"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="footer-line">
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-3">
                    <strong>{{ number_format($footerUserCount) }}</strong>
                    <p>Registered Users</p>
                </div>
                <div class="col-md-4">
                    <strong>{{ number_format($footerJobsPosted) }}</strong>
                    <p>Total Jobs Posted</p>
                </div>
            </div>
        </div>
    </div>
</footer>


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
        autoHeight: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,

    });
</script>

