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
                    Login Job Seeker
                </h1>
            </div>
            <div class="col-lg-12">
                <a href="{{ route('register_jobseeker') }}" class="register-link">
                    Don't have an account? <span>Register</span>
                </a>
            </div>
            <div class="col-lg-12">
                <div class="row  form-box">
                    <div class="item">
                        <form method="post" action="{{ route('login_jobseeker') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-row">
                                        <label>
                                            Username or Email
                                        </label>
                                        <input type="text" placeholder="Username or Email" name="username" value="{{ old('username') }}">
                                        <img src="{{asset('assets/icon/user-name.svg')}}">
                                    </div>
                                    @error('username')
                                    <span style="color: red">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-row">
                                        <label>
                                            Password
                                        </label>
                                        <input type="password" placeholder="Password" name="password">
                                        <img src="{{asset('assets/icon/pass.svg')}}">
                                    </div>
                                    @error('password')
                                    <span style="color: red">
                                    {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <a class="forget-pass" href="{{ route('forget_jobseeker') }}">
                                        Forgot password?
                                    </a>
                                </div>
                                <div class="col-lg-12">
                                    <button class="apply-btn">
                                        Login
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <a class="login Register-btn" href="{{ route('login_employer') }}">
                    Login as Employer
                </a>
            </div>
        </div>

    </div>

</div>

@endsection
