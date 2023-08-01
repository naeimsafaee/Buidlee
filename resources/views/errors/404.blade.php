@extends('index')
@section('content')

<div class="col-lg-12">
    <div class="container login-container">
        <div class="top-googooli-container">
            <img class="ball ball_one" src="{{asset('assets/photo/blur_ball_one.png')}}">
            <img class="ball ball_two" src="{{asset('assets/photo/blur_ball_two.png')}}">
            <img class="ball ball_three" src="{{asset('assets/photo/blur_ball_three.png')}}">
            <img class="line lineanim" src="{{asset('assets/icon/lines.svg')}}">
        </div>
        <div class="row  inner-container">
            <div class="col-lg-12">
                <h1 class="title">
                    404
                </h1>
            </div>
            <div class="col-lg-12">
                <h3 class="text-center error">
                    Page Not Found
                </h3>
            </div>
            <div class="col-lg-12">
                <a class="login Register-btn" href="{{ route('home') }}">
                    Back to home page
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
