<!DOCTYPE html>
<html lang="zxx" class="js">
@include('user.n-includes.head')

<body>
<style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
<div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="{{ asset('front/images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
<div class="preloader">
    <div class="preloader-body">
        <div class="preloader-item">
            <svg width="40" height="40" viewbox="0 0 40 40">
                <polygon class="rect" points="0 0 0 40 40 40 40 0"></polygon>
            </svg>
        </div>
    </div>
</div>
@if(Route::current()->getName() === 'pages.home')
    @include('user.n-includes.header')
    @else
    @include('user.n-includes.inner-header')
@endif

@yield('content')

@include('user.n-includes.footer')
@include('user.n-includes.script')
@include('user.n-includes.notifications')

</body>
</html>
