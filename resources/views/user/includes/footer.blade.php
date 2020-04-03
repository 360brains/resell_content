<footer>
    <div class="container">
        <div class="row p-custom">
            <div class="col-md-4">
                <div class="footer-logo">
                    <p class="footer-creative-title">About Us</p>
                    <div class="footer-creative-divider"></div>
                    <div class="footer-detail">
                    <p>At ResellContent, you can pick from hundreds of projects each day. Our authors are free to determine how a lot or little they would like to put in writing. Forget hunting through categorized ads, looking for the next patron, or awaiting payments. At ResellContent, payment is speedy and reliable.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="footer-logo">
                    <p class="footer-creative-title">Quick Links</p>
                    <div class="footer-creative-divider"></div>
                    <div class="footer-detail">
                        <ul class="list-marked-1">
                            <li><i class="fas fa-caret-right"></i><a href="{{ route('user.tasks') }}">My Projects</a></li>
                            <li><i class="fas fa-caret-right"></i><a href="{{ route('user.transactions') }}">Transactions</a></li>
                            <li><i class="fas fa-caret-right"></i><a href="{{ route('user.projects') }}">Browse Projects</a></li>
                            <li><i class="fas fa-caret-right"></i><a href="{{ route('user.help') }}">Help & Support </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="footer-logo">
                    <p class="footer-creative-title">CONTACT US</p>
                    <div class="footer-creative-divider"></div>
                    <div class="footer-detail contact-info">
                        <ul class="list-marked-1 list-end">
                            <li>
                                <div>
                                    <i class="fas fa-mobile-alt"></i>
                                    <span class="detail"><a href="tel: +92 313 7270000 ">+92 (313) 7270000</a></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <i class="far fa-envelope"></i>
                                    <span class="detail"><a href="mailto:info@sunztech.com">info@sunztech.com</a></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <i class="fas fa-map-marker-alt"></i>
                                <span class="detail">House #958، St-12, Main bazar Muhammadabad, Faisalabad, Punjab</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
        <div class="footer-bottom">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="data-bottom">
                    <strong>{{ number_format($footerUserCount) }}</strong>
                    <p>Registered Users</p>

                    <strong>{{ number_format($footerJobsPosted) }}</strong>
                    <p>Total Jobs Posted</p>
                </div>
                </div>
            </div>
        </div>
        </div>
</footer>

<script src="{{ asset('user/assets/js/jquery.bundle49f7.js') }}"></script>
<script src="{{ asset('user/assets/js/script49f7.js') }}"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('user/assets/js/plugins/timer/source/jquery.vtimer.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/js/owl.carousel.min.js') }}"></script>






