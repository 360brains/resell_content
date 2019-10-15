<div class="topbar-wrap">
    <div class="topbar is-sticky">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="topbar-nav d-lg-none">
                    <li class="topbar-nav-item relative">
                        <a class="toggle-nav" href="#">
                            <div class="toggle-icon"><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span></div>
                        </a>
                    </li>
                    <!-- .topbar-nav-item -->
                </ul>
                <!-- .topbar-nav -->
                <a class="topbar-logo" href="{{ route('pages.home') }}"><img src="{{ asset('user/images/logo.png') }}" srcset="{{ asset('user/images/logo2x.png 2x') }}" alt="logo"></a>
                <ul class="topbar-nav">
                    <li class="topbar-nav-item relative"><span class="user-welcome d-none d-lg-inline-block">Welcome! {{ auth()->user()->name }}</span><a class="toggle-tigger user-thumb" href="#">
                            <img src="{{ url(auth()->user()->avatar) }}" alt="">
                        </a>
                        <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
                            <div class="user-status">
                                <h6 class="user-status-title">Token balance</h6>
                                <div class="user-status-balance">12,000,000 <small>TWZ</small></div>
                            </div>
                            <ul class="user-links">
                                <li><a href="{{ route('user.profile') }}"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                <li><a href="#"><i class="ti ti-infinite"></i>Referral</a></li>
                                <li><a href="activity.html"><i class="ti ti-eye"></i>Activity</a></li>
                            </ul>
                            <ul class="user-links bg-light">
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ti ti-power-off"></i>{{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- .topbar-nav-item -->
                </ul>
                <!-- .topbar-nav -->
            </div>
        </div>
        <!-- .container -->
    </div>
    <!-- .topbar -->
    <hr class="topbar-divider">
    <!-- separator hr -->
    <div class="navbar">
        <div class="container">
            <div class="navbar-innr">
                <ul class="navbar-menu">
                    <li><a href="{{ route('user.dashboard') }}"><em class="ikon ikon-dashboard"></em> Dashboard</a></li>
                    <li><a href="{{ route('user.tasks') }}"><em class="ikon ikon-distribution"></em> My Tasks</a></li>
                    <li><a href="{{ route('user.transactions') }}"><em class="ikon ikon-transactions"></em> Transactions</a></li>
                    <li><a href="{{ route('user.profile') }}"><em class="ikon ikon-user"></em> Profile</a></li>
                </ul>
                <ul class="navbar-btns">
                    <li><a href="kyc-application.html" class="btn btn-sm btn-outline btn-light"><em class="text-primary ti ti-files"></em><span>KYC Application</span></a></li>
                    <li class="d-none"><span class="badge badge-outline badge-success badge-lg"><em class="text-success ti ti-files mgr-1x"></em><span class="text-success">KYC Approved</span></span>
                    </li>
                </ul>
            </div>
            <!-- .navbar-innr -->
        </div>
        <!-- .container -->
    </div>
    <!-- .navbar -->
</div>
