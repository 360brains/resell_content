<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="{{asset('admin/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler"> </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default"> {{ count(auth()->user()->unreadNotifications) }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>
                                <span class="bold">{{ count(auth()->user()->unreadNotifications) }} Pending</span> notifications</h3>
                            <a href="{{ route('admin.markRead') }}" class="float-right p-0 text-info">Mark as read</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                @forelse(auth()->user()->unreadNotifications as $notification)
                                    <li class=" margin-top-15" style="margin-left: 5px;">
                                            <span class="details bord ">
                                                <span class="label label-sm label-icon label-success">
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                                {!! $notification->data['message'] !!}
                                            </span>
                                    </li>
                                @empty
                                    <li>
                                        <a href="javascript:;">
                                        <span class="details">
                                            <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-plus"></i>
                                            </span> No unread Notifications. </span>
                                        </a>
                                    </li>
                                @endforelse
                                <li>
                                    <a class="text-center" href="{{ route('admin.notifications') }}">View all</a>
                                </li>

{{--                                <li>--}}
{{--                                    <a href="javascript:;">--}}
{{--                                        <span class="time">3 mins</span>--}}
{{--                                        <span class="details">--}}
{{--                                                    <span class="label label-sm label-icon label-danger">--}}
{{--                                                        <i class="fa fa-bolt"></i>--}}
{{--                                                    </span> Server #12 overloaded. </span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"  data-close-others="true">
                        <img alt="" class="img-circle" src="assets/layouts/layout/img/admin-icon.png" />
                        <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
{{--                        @admin('super')--}}
                        <li>
                            <a href="{{ route('admin.show') }}">
                                <i class="icon-user"></i>{{ucfirst(config('multiauth.prefix')) }}</a>
                        </li>
{{--                        @permitToParent('Role')--}}
                        <li>
                            <a href="{{ route('admin.roles') }}">
                                <i class="icon-user"></i> Roles</a>
                        </li>
{{--                        @endpermitToParent--}}
{{--                        @endadmin--}}
                        <li>
                            <a href="{{ route('admin.password.change') }}">
                                <i class="icon-user"></i> Change Password</a>
                        </li>

                        <li class="divider"> </li>

                        <li>
                            <a class="page_user_login_1.html" href="/admin/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-key"></i>
                                {{ __('Log Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
