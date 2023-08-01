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
            <div class="row items-row inner-container">
                <div class="col-lg-12">
                    <h1 id="title" class="title">
                        Requests
                    </h1>
                </div>

                @if(count($jobseeker->requests) > 0)

                    @each('components.jobseeker_requests' , $jobseeker->requests , 'request')
                @else
                    <div class="col-lg-12">
                        <h5 class="job-details" style="text-align: center">
                            No Request Found
                        </h5>
                    </div>
                @endif


            </div>

        </div>

    </div>

@endsection
