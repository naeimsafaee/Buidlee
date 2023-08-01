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
            <div class="row inner-container">

                <div class="col-lg-12">
                    <div class="row  form-box inner-container">

                        <div class="col-lg-12">
                            <div class="item">
                                <form method="post" action="{{ route('jobseeker_change_password') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            @error('old_password')
                                            @if($message)
                                            <div class="input-row register-row active">
                                                <label>
                                                    Old-Password
                                                </label>
                                                <input class="active" type="password" placeholder="Old-Password" name="old_password">
                                                <img src="{{asset('assets/icon/pass.svg')}}">
                                                <p class="red">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                                @else
                                                    <div class="input-row register-row">
                                                        <label>
                                                            Old-Password
                                                        </label>
                                                        <input type="password" placeholder="Old-Password" name="old_password">
                                                        <img src="{{asset('assets/icon/pass.svg')}}">
                                                        <p class="red" style="color: white">
                                                            requierd
                                                        </p>
                                                @endif
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
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
                                            @error('password2')
                                            @if($message)
                                            <div class="input-row register-row active">
                                                <label>
                                                    Re-try Password
                                                </label>
                                                <input class="active" type="password" placeholder="Re-try Password" name="password2" id="password2">
                                                <img src="{{asset('assets/icon/pass.svg')}}">
                                                <p class="red">
                                                    {{ $message }}
                                                </p>
                                            </div>
                                            @enderror
                                            @else
                                                <div class="input-row register-row">
                                                    <label>
                                                        Re-try Password
                                                    </label>
                                                    <input type="password" placeholder="Re-try Password" name="password2" id="password2">
                                                    <img src="{{asset('assets/icon/pass.svg')}}">
                                                    <p class="red" style="color:white">
                                                        requierd
                                                    </p>
                                                </div>
                                            @endif
                                                <span id="message"></span>

                                        </div>

                                        <div class="padding-item col-lg-12">
                                            <div class="button-row">
                                                <button class="submit ">
                                                    Submit
                                                </button>
                                                <button data-bs-dismiss="modal" class="cancel">
                                                    Cancel
                                                </button>

                                            </div>

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
 /*       $( ".register-row input" ).blur(function() {
            var inputVal =  $( this ).val();
            if (inputVal == '') {
                $( this ).parent().addClass("active")
                $( this ).addClass("active")
            }else{
                $( this ).parent().removeClass("active")
                $( this ).removeClass("active")

            }
        });*/


    </script>
@endsection
