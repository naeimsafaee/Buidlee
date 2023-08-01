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
                        Register Job Seeker
                    </h1>
                </div>
                <div class="col-lg-12">
                    {{-- <a href="#" class="register-link">
                         Don't have an account? <span>Register</span>
                     </a>--}}
                </div>
                <div class="col-lg-12">
                    <div class="row  form-box inner-container">
                        <div class="item">
                            <form method="post" action="{{ route('register_jobseeker') }}">
                                @csrf
                                <div class="row">
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('username')
                                        @if($message)
                                            <div class="input-row register-row active">
                                                <label>
                                                    Username
                                                </label>
                                                <input class="active" type="text" placeholder="Username" name="username"
                                                       value="{{ old('username') }}">
                                                <img src="{{asset('assets/icon/user-name.svg')}}">
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            @enderror
                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Username
                                                </label>
                                                <input type="text" placeholder="Username" name="username"
                                                       value="{{ old('username') }}">
                                                <img src="{{asset('assets/icon/user-name.svg')}}">
                                                <p class="red" style="color: white">
                                                    required
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('name')
                                        @if($message)

                                            <div class="input-row register-row active">
                                                <label>
                                                    Full Name
                                                </label>
                                                <input class="active" type="text" placeholder="Full Name" name="name"
                                                       value="{{ old('name') }}">
                                                <img src="{{asset('assets/icon/lastname.svg')}}">
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            @enderror
                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Full Name
                                                </label>
                                                <input type="text" placeholder="Full Name" name="name"
                                                       value="{{ old('name') }}">
                                                <img src="{{asset('assets/icon/lastname.svg')}}">
                                                <p class="red" style="color: white">
                                                    Required!
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('email')
                                        @if($message)

                                            <div class="input-row register-row active">
                                                <label>
                                                    Contact Email
                                                </label>
                                                <input type="text" placeholder="Email" name="email"
                                                       value="{{ old('email') }}" class="active">
                                                <img src="{{asset('assets/icon/calender.svg')}}">
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                            </div>

                                            @enderror
                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Contact Email
                                                </label>
                                                <input type="text" placeholder="Email" name="email"
                                                       value="{{ old('email') }}">
                                                <img src="{{asset('assets/icon/calender.svg')}}">
                                                <p class="red" style="color: white">
                                                    required
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="input-row register-row active">
                                            <label>
                                                Gender
                                            </label>
                                            <div class="dropdown">
                                                <div class="select">
                                                    @if(old('gender'))
                                                        <span>{{ old('gender') }} </span>
                                                    @else
                                                        <span>Gender </span>
                                                    @endif
                                                    <div class="dropdown-arrow">
                                                        <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="gender" id=gender_input
                                                       value="{{ old('gender') }}">
                                                <ul class="dropdown-menu">
                                                    <li onclick="all_gender_to_input('male')">male</li>
                                                    <li onclick="all_gender_to_input('female')">female</li>
                                                </ul>
                                                <script>
                                                    function all_gender_to_input(value) {
                                                        document.getElementById('gender_input').value = value;
                                                    }
                                                </script>
                                            </div>
                                            @error('gender')
                                            @if($message)
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            @else
                                                <p style="color: white">
                                                    Required!
                                                </p>
                                            @endif
                                        </div>


                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('password')
                                        @if($message)

                                            <div class="input-row register-row active">
                                                <label>
                                                    Password
                                                </label>
                                                <input class="active" type="password" placeholder="Password"
                                                       name="password" id="password">
                                                <img src="{{asset('assets/icon/pass.svg')}}">
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                            </div>

                                            @enderror
                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Password
                                                </label>
                                                <input type="password" placeholder="Password" name="password"
                                                       id="password">
                                                <img src="{{asset('assets/icon/pass.svg')}}">
                                                <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('re_try_Password')
                                        @if($message)
                                            <div class="input-row register-row active">
                                                <label>
                                                    Re-try Password
                                                </label>
                                                <input class="active" type="password" placeholder="Re-try Password"
                                                       name="re_try_Password"
                                                       id="password2">
                                                <img src="{{asset('assets/icon/pass.svg')}}">
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            <span id="message"></span>
                                            @enderror
                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Re-try Password
                                                </label>
                                                <input type="password" placeholder="Re-try Password"
                                                       name="re_try_Password"
                                                       id="password2">
                                                <img src="{{asset('assets/icon/pass.svg')}}">
                                                <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                            <span id="message"></span>
                                        @endif
                                    </div>

                                    <div class="padding-item col-lg-12">
                                        <button class="apply-btn">
                                            Register
                                        </button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="login Register-btn" href="{{ route('register_employer') }}">
                        Register as Employer
                    </a>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('optional_footer')

    <script>

        $('#password, #password2').on('keyup', function () {
            if ($('#password').val() == $('#password2').val()) {
                $('#message').hide();
            } else
                $('#message').show().html('passwords does not match').css('color', 'red');

        });

    </script>
    <script>
        // $(".register-row input").blur(function () {
        //     var inputVal = $(this).val();
        //     if (inputVal == '') {
        //         $(this).parent().addClass("active")
        //         $(this).addClass("active")
        //     } else {
        //         $(this).parent().removeClass("active")
        //         $(this).removeClass("active")
        //
        //     }
        // });


        /*Dropdown Menu*/
        /* $('.dropdown').click(function () {
             $(this).attr('tabindex', 1).focus();
             $(this).toggleClass('active');
             if ($(this).hasClass('active')) {
                 $(this).find('.dropdown-menu').slideToggle(300);
             }else {
                 $(this).find('.dropdown-menu').hide(20);
             }
         });*/
        $('.dropdown').focusout(function () {
            $(this).removeClass('active');
            $(this).find('.dropdown-menu').hide(20);

        });

        $('.dropdown .dropdown-menu li').click(function () {
            $(this).parents('.dropdown').find('span').text($(this).text());
            $(this).parents('.dropdown').find('span').css("color", "#323232")
            $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
        });
    </script>
@endsection
