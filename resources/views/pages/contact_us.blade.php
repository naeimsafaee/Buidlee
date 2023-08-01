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
                    <div class="row  form-box inner-container">
                        <div class="col-lg-12 ">
                            <form method="post" action="{{ route('contact_us') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="input-row">
                                            <label>
                                                Telegram ID
                                            </label>
                                            <input type="text" placeholder="Telegram ID" name="name" value="{{ old('name') }}">
                                            <img src="{{asset('assets/icon/user-name.svg')}}">
                                        </div>
                                        @error('name')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        <div class="input-row">
                                            <label>
                                                Email
                                            </label>
                                            <input  placeholder="Email" name="email" value="{{ old('email') }}">
                                            <img src="{{asset('assets/icon/calender.svg')}}">

                                        </div>
                                        @error('email')
                                        <span style="color: red">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="input-row">
                                            <label>
                                                Massage
                                            </label>
                                            <textarea type="password" placeholder="Massage" name="message">{{ old('message') }}</textarea>
                                            <img class="textarea-img" src="{{asset('assets/icon/skills.svg')}}">
                                            @error('message')
                                            <span style="color: red">
                                            {{ $message }}
                                        </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button class="apply-btn">
                                            send massage
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>

                </div>

            </div>

@endsection
