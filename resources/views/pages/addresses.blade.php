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
            <div class="row ">
                <div class="col-lg-12">
                    <a class="logo-box form-logo" href="{{ route('home') }}">
                        <img class="form-logo" src="{{ asset('assets/icon/B&W.svg') }}">
                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="title">
                        Addresses
                    </h1>
                </div>
                <div class="col-lg-12">
                    <div class="row  form-box">
                        <div class="item">
                            <div class="row">

                                <div>
                                    <a class="donate-with-crypto"
                                       href="https://commerce.coinbase.com/checkout/6da189f179bc31">
                                        <span>Donate with Crypto</span>
                                    </a>
                                    <script src="https://commerce.coinbase.com/v1/checkout.js">
                                    </script>
                                </div>

                               {{-- @foreach($addresses as $key => $address)

                                    <div class="col-lg-12">
                                        <div class="input-row" style="display: flex;flex-direction: column;">
                                            <span style="text-align: center">
                                                {{ $key }}
                                            </span>
                                            <span style="text-align: center">
                                                {{ $address }}
                                            </span>
                                            <span style="text-align: center">
                                                {{ $pricing[$key]["amount"] }} {{ $key }}
                                            </span>
                                        </div>
                                    </div>

                                @endforeach--}}

                                <div class="col-lg-12">
                                    <button style="margin: auto;margin-bottom: 30px;margin-top: 30px;" onclick="check_trans()" id="check_text" class="apply-btn">
                                        Check
                                    </button>
                                </div>
                                <span style="text-align: center;color: red;" id="error_text"></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>

       /* function check_trans() {

            document.getElementById('check_text').innerText = "wait...";
            document.getElementById('error_text').innerText = "";

            $.ajax({
                "url": "{{ $is_category === true ? route('check_trans2' , $charge_code) : route('check_trans' , $charge_code) }}",
                "method": "GET",
                "data": {_token: "{{ csrf_token() }}"}
            }).done(function (data) {
                if (data === 200) {
                    document.getElementById('check_text').innerText = "done";
                    document.getElementById('error_text').innerText = "done";

                    window.location = "{{ route('employer_profile') }}";
                } else {
                    document.getElementById('check_text').innerText = "check";
                    document.getElementById('error_text').innerText = "not confirm";

                }
            });
        }
*/
    </script>

@endsection
