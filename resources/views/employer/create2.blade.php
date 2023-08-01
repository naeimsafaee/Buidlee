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
                <div class="row form-box inner-container">
                    <div class="col-lg-12 ">
                        <h1 id="title" class="title">
                            Create
                        </h1>
                    </div>
                    <div style="margin-bottom: 20px" class="col-lg-12">
                        <p class="text-center">
{{--                            {{ setting('promote.description') }}--}}
                            <b>
                                Base : will be promoted for 30 days
                                <br>
                                feature : will be promoted for 30 day + pinned at the top of the list
                                <br>
                                *** One time payment. No recurring charges. ***
                            </b>
                        </p>
                    </div>
                    @if($job)
                        @if(! $job->promote_in_home)
                            <div class="col-lg-12">
                                <a class="item items-space" href="{{ route('employer_promote1' , $id) }}">
                                    <div class="pricing-row inner-item flex-box">
                                        <div class="pricing-items">
                                            <h3>
                                                Base
                                            </h3>
                                            <p>
                                                Per month
                                            </p>
                                        </div>
                                        <div class="pricing-items">
                                            <h1>
                                                $ {{ setting('promote.price1') }}
                                            </h1>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endif
                        <div class="col-lg-12">
                            <a class="item items-space" href="{{ route('employer_promote2' , $id) }}">
                                <div class="pricing-row inner-item flex-box">
                                    <div class="pricing-items">
                                        <h3>
                                            Feature
                                        </h3>
                                        <p>
                                            Per month
                                        </p>
                                    </div>
                                    <div class="pricing-items">
                                        <h1>
                                            $ {{ setting('promote.price2') }}
                                        </h1>
                                    </div>

                                </div>
                            </a>
                        </div>

                    @else
                        <div class="col-lg-12">
                            <a class="item items-space" >
                                <div class="pricing-row inner-item flex-box">
                                    <div class="pricing-items">
                                        <h3>
                                            Base
                                        </h3>
                                        <p>
                                            Per month
                                        </p>
                                    </div>
                                    <div class="pricing-items">
                                        <h1>
                                            $ {{ setting('promote.price1') }}
                                        </h1>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <a class="item items-space" >
                                <div class="pricing-row inner-item flex-box">
                                    <div class="pricing-items">
                                        <h3>
                                            Feature
                                        </h3>
                                        <p>
                                            Per month
                                        </p>
                                    </div>
                                    <div class="pricing-items">
                                        <h1>
                                            $ {{ setting('promote.price2') }}
                                        </h1>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>

    </div>

@endsection


