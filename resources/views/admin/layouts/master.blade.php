<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- BEGIN HEAD -->
@include('admin.includes.head')
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">

<div id="app">
    <!-- BEGIN HEADER -->
@include('admin.includes.header')
<!-- END HEADER -->

    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->

    <div class="page-container">
        <!-- START sidebar here -->
    @include('admin.includes.sidebar')
    <!-- END sidebar here -->

        <!-- START content here -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!-- END content here -->

        <!-- END content here -->
    </div>
    <!-- END content here -->
</div>

</div>
<!-- START footer here -->
@include("admin.includes.footer")
<!-- END footer here -->
@include('admin.includes.notifications')
@include('admin.includes.script')
@stack('scripts')

</body>
</html>
