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

</head>
<body>
<div class="container-fluid">
    <div class="row main_panel_row">
        <div class="row">
            <div class="overlay"></div>


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
