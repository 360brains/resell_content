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
                    <li class="topbar-nav-item relative" id="markAsRead" onclick="markNotificationAsRead()">
                        <a href="#" class="toggle-tigger"><i class="far fa-bell pr-2"><span class="badge badge-info position-absolute btn-absolute-right">{{ count(auth()->user()->unreadNotifications) }}</span></i></a>
                        <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">
                            <div class="user-status">
                                <h6 class="user-status-title d-flex notification-size user-status-balance">Notification</h6>
                            </div>
                            <ul class="user-links notification-content-size">
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    <li class="pt-0 pb-0 pl-4 pr-4" data-toggle="tooltip"  title="Hooray!" data-placement="bottom">{{ $notification->data['message'] }}</li><hr class="hr-m">
                                @empty
                                    <li class="pt-0 pb-0 pl-4 pr-4">No unread notification</li><hr>
                                @endforelse
                            </ul>
                        </div>
                    </li>
                    <li class="topbar-nav-item relative">
                    <a class="toggle-tigger user-thumb" href="#">
                            <img src="{{ url(auth()->user()->avatar) }}" alt="">
                        </a>
                    <div class="toggle-class dropdown-content  dropdown-content-right-img dropdown-arrow-right user-dropdown">
                            <div class="user-status">
                                <h6 class="user-status-title">Balance</h6>
                                <div class="user-status-balance">
                                    {{ auth()->user()->balance }}
                                    <small>PKR</small></div>
                            </div>
                        <ul class="user-links">
                            <li><a href="{{ route('withdraw.create') }}"><i class="ti ti-receipt"></i>Withdraw</a></li>
                        </ul>
                            <ul class="user-links">
                                <li><a href="{{ route('user.profile') }}"><i class="ti ti-id-badge"></i>My Profile</a></li>
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
                    <li><a href="{{ route('user.notifications') }}"><i class="far fa-bell "></i>&nbsp; Notifications</a></li>
                    <li><a href="{{ route('user.profile') }}"><em class="ikon ikon-user"></em> Profile</a></li>
                    <li class="has-dropdown page-links-all"><a class="drop-toggle" href="#"><em class="ikon ikon-exchange"></em> Brows</a>
                        <ul class="navbar-dropdown">

                            <li><a href="{{ route('pages.home') }}"> Home </a></li>
                            <li><a href="{{ route('pages.projects') }}"> Get Tasks </a></li>
                            <li><a href="{{ route('pages.home') }}"> How it Works </a></li>
                            <li><a href="{{ route('user.learn') }}"> Learn </a></li>
                            <li><a href="#"> Test </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- .navbar-innr -->
        </div>
        <!-- .container -->
    </div>
    <!-- .navbar -->
</div>
