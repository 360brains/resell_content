<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light p-0 d-flex">
        <a class="navbar-brand" href="{{ route('pages.home') }}">great<span style="color: #07b107; font-weight: 500;">Content</span>
        </a>
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
                        {{strpos((request()->path()),"user/projects") == 'true' ? 'nav-active' : ''}}"
                       href="{{ route('user.projects') }}">Browser Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvrcenter
                     {{strpos((request()->path()),"user/learn") == 'true' ? 'nav-active' : ''}}"
                       href="{{ route('user.learn') }}">Learn</a>
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
                                <img src="{{ asset('user/images/logo123.png')}}" alt="ds"></button>
                        </span>
                </div>
            </form>
            @guest
            @else
                <div class="notification pl-4">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent"
                         style="display: unset !important;">
                        <ul class="nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('user/images/notification_icon.png') }}" width="20px" alt="">
                                    <!-- <i class="fa fa-bell"></i> -->
                                </a>

                                <div class="dropdown-menu">
                                    <div class="notification-caret">
                                        <ul class="notification-menu">
                                            <li class="head">
                                                <div class="clearfix">
                                                    <h5 class="float-left"><strong>Notifications</strong></h5>
                                                    <a href="" class="float-right p-0">Mark all as read</a>
                                                </div>
                                            </li>
                                            <ul>
                                                @forelse(auth()->user()->unreadNotifications as $notification)
                                                    <a href="{{route('user.notifications')}}">
                                                        <li class="pt-0 pb-0 pl-4 pr-4" data-toggle="tooltip"
                                                            title="Click for details!"
                                                            data-placement="bottom">{{ $notification->data['message'] }}</li>
                                                        <hr class="m-0">
                                                    </a>
                                                @empty
                                                    <li class="pt-0 pb-0 pl-4 pr-4">No unread notification</li>
                                                    <hr>
                                                @endforelse
                                            </ul>
                                            <li class="footer text-center">
                                                <a href="">View All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="user-img pl-3">
                    <div class=" collapse navbar-collapse" id="navbarSupportedContent"
                         style="display: unset !important;">
                        <ul class="nav">
                            <li class="nav-item dropdown">
                                <a class="p-0 nav-link text-light" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ url(auth()->user()->avatar) }}" alt="">
                                    <!-- <i class="fa fa-bell"></i> -->
                                </a>
                                <ul class="dropdown-menu user-img-menu ">
                                    <li><a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.refer') }}">Refer & Get upto Rs.
                                            250</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href="{{ route('user.settings') }}">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Help and Support</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
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
