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
                        Login and Register
                    </h1>
                </div>
                <div class="col-lg-12">
                    <div class="row inner-container">
                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="item ">
                                <div class="form-details flex-box">
                                    <img src="{{asset('assets/icon/employer.svg')}}">
                                    <h2>
                                        Employer
                                    </h2>
                                    <a class="apply-btn" href="{{ route('login_employer') }}">
                                        Login
                                    </a>
                                    <a class="Register-btn" href="{{ route('register_employer') }}">
                                        Register
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="item ">
                                <div class="form-details flex-box">
                                    <img src="{{asset('assets/icon/Seeker.svg')}}">
                                    <h2>
                                        Job Seeker
                                    </h2>
                                    <a class="apply-btn" href="{{ route('login_jobseeker') }}">
                                        Login
                                    </a>
                                    <a class="Register-btn" href="{{ route('register_jobseeker') }}">
                                        Register
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection


