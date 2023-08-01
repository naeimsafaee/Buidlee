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
                            <form method="post"
                                  @if(url()->current() == route('forget_jobseeker'))action="{{ route('forget_jobseeker') }}"
                                  @else action="{{ route('forget_employer') }}" @endif>
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-row">
                                            <label>
                                                email
                                            </label>
                                            <input type="text" placeholder="email" name="email">
                                            <img src="{{asset('assets/icon/user-name.svg')}}">
                                        </div>
                                        @error('email')
                                        <span style="color: red">
                                    {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="apply-btn">
                                            Reset Password
                                        </button>
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
