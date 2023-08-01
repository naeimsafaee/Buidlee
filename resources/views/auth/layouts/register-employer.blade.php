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
                        Register Employer
                    </h1>
                </div>
                <div class="col-lg-12">
                    {{--  <a href="#" class="register-link">
                          Don't have an account? <span>Register</span>
                      </a>--}}
                </div>
                <div class="col-lg-12">
                    <div class="row  form-box inner-container">
                        <div class="item">
                            <form method="post" action="{{ route('register_employer') }}">
                                @csrf
                                <div class="row">
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('name')
                                        @if($message)

                                            <div class="input-row register-row active">
                                                <label>
                                                    Full Name
                                                </label>
                                                <input type="text" placeholder="Full Name" name="name"
                                                       value="{{ old('name') }}" class="active">
                                                <img src="{{asset('assets/icon/user-name.svg')}}">
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
                                                <img src="{{asset('assets/icon/user-name.svg')}}">
                                                <p class="red" style="color: white">
                                                    requierd
                                                </p>
                                            </div>

                                        @endif
                                    </div>


                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">

                                        @error('job_title')
                                        @if($message)
                                            <div class="input-row register-row active">
                                                <label>
                                                    Your Position / Job Title
                                                </label>
                                                <input type="text" placeholder="HR" name="job_title"  value="{{ old('job_title') }}"
                                                       class="active">
                                                <img src="{{asset('assets/icon/lastname.svg')}}">
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            @enderror

                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Your Position / Job Title
                                                </label>
                                                <input type="text" placeholder="HR" name="job_title"
                                                       value="{{ old('job_title') }}">
                                                <img src="{{asset('assets/icon/lastname.svg')}}">
                                                <p class="red" style="color: white">
                                                    Job title is required.
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
                                        <div class="input-row register-row">
                                            <label>
                                                Company Size
                                            </label>
                                            <div class="dropdown">
                                                <div class="select">
                                                    @if(old('company_size'))
                                                        <span>{{ old('company_size') }}</span>
                                                    @else
                                                        <span>company size</span>
                                                    @endif
                                                    <div class="dropdown-arrow">
                                                        <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                    </div>
                                                </div>
                                                <input type="hidden" id="input_of_company_size" name="company_size"
                                                       value="{{ old('company_size') }}">
                                                <ul class="dropdown-menu">
                                                    @foreach($sizes as $size)
                                                        <li onclick="set_company_size_to_input({{ $size->id }})">{{ $size->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <script>
                                                function set_company_size_to_input(id) {
                                                    document.getElementById('input_of_company_size').value = id;
                                                }
                                            </script>

                                            <p class="red">
                                                Job title is required.
                                            </p>
                                        </div>
                                        @error('company_size')
                                        <span style="color: red">
                                    {{ $message }}
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('company_name')
                                        @if($message)
                                        <div class="input-row register-row active">
                                            <label>
                                                Company Name
                                            </label>
                                            <input type="text" placeholder="Company Name " name="company_name"
                                                   value="{{ old('company_name') }}" class="active">
                                            <img src="{{asset('assets/icon/company-name.svg')}}">
                                            <p class="red">
                                                {{ $message }}

                                            </p>
                                        </div>
                                        @enderror
                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Company Name
                                                </label>
                                                <input type="text" placeholder="Company Name " name="company_name"
                                                       value="{{ old('company_name') }}" >
                                                <img src="{{asset('assets/icon/company-name.svg')}}">
                                                <p class="red" style="color: white">
                                                    required
                                                </p>
                                            </div>

                                        @endif
                                    </div>
                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('company_id')
                                        @if( $message )
                                        <div class="input-row register-row active">
                                            <label>
                                                Company ID / Username
                                            </label>
                                            <input type="text" placeholder="Company ID " name="company_id"
                                                   value="{{ old('company_id') }}" class="active">
                                            <img src="{{asset('assets/icon/company-id.svg')}}">
                                            <p class="red">
                                                {{ $message }}
                                            </p>
                                        </div>
                                        @enderror
                                        @else
                                            <div class="input-row register-row">
                                                <label>
                                                    Company ID / Username
                                                </label>
                                                <input type="text" placeholder="Company ID " name="company_id"
                                                       value="{{ old('company_id') }}">
                                                <img src="{{asset('assets/icon/company-id.svg')}}">
                                                <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>

                                        @endif
                                    </div>


                                    <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                        @error('password')
                                        @if($message)

                                        <div class="input-row register-row active">
                                            <label>
                                                Password
                                            </label>
                                            <input class="active" type="password" placeholder="Password" name="password" id="password">
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
                                            <input type="password" placeholder="Password" name="password" id="password">
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
                                            <input class="active" type="password" placeholder="Re-try Password" name="re_try_Password"
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
                                            <input type="password" placeholder="Re-try Password" name="re_try_Password"
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
                    <a class="login Register-btn" href="{{ route('register_jobseeker') }}">
                        Register as job seeker
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
        /*
                $('.dropdown').click(function () {
                    $(this).attr('tabindex', 1).focus();
                    $(this).toggleClass('active');
                    if ($(this).hasClass('active')) {
                        $(this).find('.dropdown-menu').slideToggle(300);
                    }else {
                        $(this).find('.dropdown-menu').hide(20);
                    }
                });
        */
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
