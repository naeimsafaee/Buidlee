@extends('auth.index')
@section('content')

    <div class="col-lg-12">
        <div class="container login-container">
            <div class="top-googooli-container">
                <img class="ball ball_one" src="{{asset('assets/photo/blur_ball_one.png')}}">
                <img class="ball ball_two" src="{{asset('assets/photo/blur_ball_two.png')}}">
                <img class="ball ball_three" src="{{asset('assets/photo/blur_ball_three.png')}}">
                <img class="line lineanim" src="{{asset('assets/icon/lines.svg')}}">
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <a class="logo-box form-logo" href="{{ route('home') }}">
                        <img class="form-logo" src="{{ asset('assets/icon/B&W.svg') }}">

                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="title">
                        Forget Password
                    </h1>
                </div>
                <div class="col-lg-12">
                    <div class="row  form-box">
                        <div class="item">
                            <form method="post" action="{{ route('login_employer') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>An Email was sent to your address containing a link.</p>
                                        <p>Please visit your inbox to continue the process.</p>
                                    <div class="col-lg-12">
                                        <a class="apply-btn" href="{{ route('home') }}">
                                            Back To Home
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
