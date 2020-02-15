<!doctype html>
<html lang="en">

<!-- BEGIN HEAD -->
@include('user.includes.head')
<!-- END HEAD -->
<body>

<div id="app">
    <!-- BEGIN HEADER -->
    @include('includes.header')
    <div class="clearfix"></div>
    @yield('content')
    <div class="clearfix"></div>
</div>
@include("includes.footer")
@include('includes.notifications')
@include('includes.script')
@stack('scripts')

</body>
</html>
