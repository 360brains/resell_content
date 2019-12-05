{{--<div class="topbar-wrap">--}}
{{--    <div class="topbar is-sticky">--}}
{{--        <div class="container">--}}
{{--            <div class="d-flex justify-content-between align-items-center">--}}
{{--                <ul class="topbar-nav d-lg-none">--}}
{{--                    <li class="topbar-nav-item relative">--}}
{{--                        <a class="toggle-nav" href="#">--}}
{{--                            <div class="toggle-icon"><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span><span class="toggle-line"></span></div>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <!-- .topbar-nav-item -->--}}
{{--                </ul>--}}
{{--                <!-- .topbar-nav -->--}}
{{--                <a class="topbar-logo" href="{{ route('pages.home') }}"><img src="{{ asset('user/images/logo.png') }}" srcset="{{ asset('user/images/logo2x.png 2x') }}" alt="logo"></a>--}}
{{--                <ul class="topbar-nav">--}}
{{--                    <li class="topbar-nav-item relative" id="markAsRead" onclick="markNotificationAsRead()">--}}
{{--                        <a href="#" class="toggle-tigger"><i class="far fa-bell pr-2"><span class="badge badge-info position-absolute btn-absolute-right">{{ count(auth()->user()->unreadNotifications) }}</span></i></a>--}}
{{--                        <div class="toggle-class dropdown-content dropdown-content-right dropdown-arrow-right user-dropdown">--}}
{{--                            <div class="user-status">--}}
{{--                                <h6 class="user-status-title d-flex notification-size user-status-balance">Notification</h6>--}}
{{--                            </div>--}}
{{--                            <ul class="user-links notification-content-size">--}}
{{--                                @forelse(auth()->user()->unreadNotifications as $notification)--}}
{{--                                    <a href="{{route('user.notifications')}}"><li class="pt-0 pb-0 pl-4 pr-4" data-toggle="tooltip"  title="Click for details!" data-placement="bottom">{{ $notification->data['message'] }}</li><hr class="hr-m"></a>--}}
{{--                                @empty--}}
{{--                                    <li class="pt-0 pb-0 pl-4 pr-4">No unread notification</li><hr>--}}
{{--                                @endforelse--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="topbar-nav-item relative">--}}
{{--                    <a class="toggle-tigger user-thumb" href="#">--}}
{{--                            <img src="{{ url(auth()->user()->avatar) }}" alt="">--}}
{{--                        </a>--}}
{{--                    <div class="toggle-class dropdown-content  dropdown-content-right-img dropdown-arrow-right user-dropdown">--}}
{{--                            <div class="user-status">--}}
{{--                                <h6 class="user-status-title">Balance</h6>--}}
{{--                                <div class="user-status-balance">--}}
{{--                                    {{ auth()->user()->balance }}--}}
{{--                                    <small>PKR</small></div>--}}
{{--                            </div>--}}
{{--                        <ul class="user-links">--}}
{{--                            <li><a href="{{ route('withdraw.create') }}"><i class="ti ti-receipt"></i>Withdraw Funds</a></li>--}}
{{--                        </ul>--}}
{{--                        <ul class="user-links">--}}
{{--                            <li><a href="#" data-toggle="modal" data-target="#deposit"><i class="ti ti-package"></i>Deposit Funds</a></li>--}}
{{--                        </ul>--}}
{{--                            <ul class="user-links">--}}
{{--                                <li><a href="{{ route('user.profile') }}"><i class="ti ti-id-badge"></i>My Profile</a></li>--}}
{{--                            </ul>--}}
{{--                            <ul class="user-links bg-light">--}}
{{--                                <li><a href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        <i class="ti ti-power-off"></i>{{ __('Logout') }}--}}
{{--                                    </a>--}}
{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <!-- .topbar-nav-item -->--}}
{{--                </ul>--}}
{{--                <!-- .topbar-nav -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- .container -->--}}
{{--    </div>--}}
{{--    <!-- .topbar -->--}}
{{--    <hr class="topbar-divider">--}}
{{--    <!-- separator hr -->--}}
{{--    <div class="navbar">--}}
{{--        <div class="container">--}}
{{--            <div class="navbar-innr">--}}
{{--                <ul class="navbar-menu">--}}
{{--                    <li><a href="{{ route('user.dashboard') }}"><em class="ikon ikon-dashboard"></em> Dashboard</a></li>--}}
{{--                    <li><a href="{{ route('user.tasks') }}"><em class="ikon ikon-distribution"></em> My Tasks</a></li>--}}
{{--                    <li><a href="{{ route('user.transactions') }}"><em class="ikon ikon-transactions"></em> Transactions</a></li>--}}
{{--                    <li><a href="{{ route('user.notifications') }}"><i class="far fa-bell "></i>&nbsp; Notifications</a></li>--}}
{{--                    <li><a href="{{ route('user.profile') }}"><em class="ikon ikon-user"></em> Profile</a></li>--}}
{{--                    <li class="has-dropdown page-links-all"><a class="drop-toggle" href="#"><em class="ikon ikon-exchange"></em> Brows</a>--}}
{{--                        <ul class="navbar-dropdown">--}}

{{--                            <li><a href="{{ route('pages.home') }}"> Home </a></li>--}}
{{--                            <li><a href="{{ route('pages.projects') }}"> Get Tasks </a></li>--}}
{{--                            <li><a href="{{ route('pages.home') }}"> How it Works </a></li>--}}
{{--                            <li><a href="{{ route('user.learn') }}"> Learn </a></li>--}}
{{--                            <li><a href="{{ route('user.memberships') }}"> Memberships </a></li>--}}
{{--                            <li><a href="#"> Test </a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <!-- .navbar-innr -->--}}
{{--        </div>--}}
{{--        <!-- .container -->--}}
{{--    </div>--}}
{{--    <!-- .navbar -->--}}
{{--</div>--}}
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light p-0 d-flex">
        <a class="navbar-brand" href="{{ route('pages.home') }}">great<span style="color: #07b107; font-weight: 500;">Content</span> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"user/dashboard") == 'true' ? 'nav-active' : ''}}"
                       href="{{ route('user.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvrcenter
                    {{strpos((request()->path()),"user/tasks") == 'true' ? 'nav-active' : ''}}"
                       href="{{ route('user.tasks') }}">My Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"user/transactions") == 'true' ? 'nav-active' : ''}}"
                       href="{{ route('user.transactions') }}">Transactions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvrcenter
                        {{strpos((request()->path()),"projects") == 'true' ? 'nav-active' : ''}}"
                       href="{{ route('pages.projects') }}">Browser Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"user/learn") == 'true' ? 'nav-active' : ''}}" href="{{ route('user.learn') }}">Learn</a>
                </li>
                <!-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li> -->
            </ul>
            <form action="">
                <div class="input-group">
                    <input class="form-control border-right-0  search-input" placeholder="Search">
                    <span class="input-group-append">
                            <button class="btn search-button" type="button">
                                <img  src="{{ asset('user/images/logo123.png')}}" alt="ds"></button>
                        </span>
                </div>
            </form>
            @guest
            @else
                <div class="notification pl-4">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">
                        <ul class="nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('user/images/notification_icon.png') }}" width="20px" alt="">
                                    <!-- <i class="fa fa-bell"></i> -->
                                </a>
                                <ul class="dropdown-menu notification-menu">
                                    <li class="head">
                                        <div class="clearfix">
                                            <h5 class="float-left"><strong>Notifications</strong></h5>
                                            <a href="" class="float-right p-0">Mark all as read</a>
                                        </div>
                                    </li>
                                        <ul >
                                            @forelse(auth()->user()->unreadNotifications as $notification)
                                                <a href="{{route('user.notifications')}}"><li class="pt-0 pb-0 pl-4 pr-4" data-toggle="tooltip"  title="Click for details!" data-placement="bottom">{{ $notification->data['message'] }}</li><hr class="m-0"></a>
                                            @empty
                                                <li class="pt-0 pb-0 pl-4 pr-4">No unread notification</li><hr>
                                            @endforelse
                                        </ul>
                                    <li class="footer text-center">
                                        <a href="">View All</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="user-img pl-3">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">
                        <ul class="nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ url(auth()->user()->avatar) }}" alt="">
                                    <!-- <i class="fa fa-bell"></i> -->
                                </a>
                                <ul class="dropdown-menu user-img-menu ">
                                   <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                                   <li><a class="dropdown-item" href="#">Refer & Get upto Rs. 250</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href="{{ route('user.settings') }}">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Help and Support</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            @endguest
        </div>
    </nav>
</div>
