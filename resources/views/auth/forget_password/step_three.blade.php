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
                            <form method="post" action="{{ route('forget') }}">
                                @csrf
                                <input type="hidden" name="reset_link" value="{{ $reset_link }}"/>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-row">
                                            <label>
                                                Password
                                            </label>
                                            <input type="password" placeholder="Password" name="password" id="password">
                                            <img src="{{asset('assets/icon/pass.svg')}}">
                                        </div>
                                        @error('password')
                                        <span style="color: red">
                                    {{ $message }}
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-row">
                                            <label>
                                                Re-Enter Password
                                            </label>
                                            <input type="password" placeholder="Re-try Password" name="password2" id="password2">
                                            <img src="{{asset('assets/icon/pass.svg')}}">
                                        </div>
                                    </div>
                                    <span id="message" style="color: red"></span>
                                    @error('password2')
                                    <span style="color: red">
                                    {{ $message }}
                                    </span>
                                    @enderror

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
@section('optional_footer')
<script>

    $('#password, #password2').on('keyup', function () {
        if ($('#password').val() == $('#password2').val()) {
            $('#message').hide();
        } else
            $('#message').show().html('passwords does not match').css('color', 'red');

    });

</script>
@endsection
