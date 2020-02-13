<!DOCTYPE html>
<html lang="zxx" class="js">
@include('user.includes.head')

<body class="page-user">
<div class="Loader"></div>



@include('user.includes.header')


@yield('content')


@include('user.includes.footer')
@include('user.includes.script')
@include('user.includes.notifications')


</body>
</html>
