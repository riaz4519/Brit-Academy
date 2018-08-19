{{--main header --}}
        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="stylesheet" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    {{--for external css--}}
    @yield('css')


    {{--middle header--}}
</head>
<body>

    {{--including navigation header--}}

    @include('.include.exam_controller_nav')
    {{--container--}}
    @yield('container')


    {{-- middle footer--}}
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('/js/bootstrap/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('/js/active.js')}}"></script>

    {{--for external script--}}
    @yield('script')

    {{--footer --}}
</body>
</html>