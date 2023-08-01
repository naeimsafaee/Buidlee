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
                            <b>
                                {{ setting('job.job_pay') }}
                            </b>
                        </p>
                    </div>
                    <div class="col-lg-12">
                        <a class="item items-space" href="{{ route('pay__job' , $id) }}">
                            <div class="pricing-row inner-item flex-box">
                                <div class="pricing-items">
                                    <h3>
                                        Create Job
                                    </h3>
                                  {{--  <p>
                                        Per month
                                    </p>--}}
                                </div>
                                <div class="pricing-items">
                                    <h1>
                                        $ {{ setting('job.job_price') }}
                                    </h1>
                                </div>

                            </div>
                        </a>
                    </div>


                </div>
            </div>

        </div>

    </div>

@endsection


