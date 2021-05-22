<!DOCTYPE html>
<html lang="zxx" class="js">
@include('user.includes.head')

<body class="page-user">

@include('user.includes.header')

@yield('content')

@include('user.includes.footer')
@include('user.includes.script')
@include('user.includes.notifications')
@stack('scripts')
</body>
</html>
