<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>{{ setting('site.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/master.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/googooli.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/tweenmax.js')}}"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="194x194" href="{{asset('assets/favicon/favicon-194x194.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/favicon/android-chrome-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.pn')}}g">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}" color="#000000">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>
<body>
<div class="container-fluid">
    <div class="row main_panel_row">
        <div class="row">
            <div class="overlay"></div>
            @yield('modal')

            @include('header')

            @yield('content')

            @include('footer')


        </div>
    </div>
</div>
@yield('optional_footer')

<script src="{{asset('assets/js/index.js')}}"></script>
<script src="{{asset('assets/js/socialhover.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/master.js')}}"></script>


</body>
</html>
