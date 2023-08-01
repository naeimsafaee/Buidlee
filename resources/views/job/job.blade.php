@extends('index')
@section('modal')
    <div class="modal  fade modal-p-bottom" id="apply-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body py-5">
                    <h1>
                        {{setting('apply.apply_prompt') }}
                    </h1>
                    <p>
                        {{setting('apply.apply_prompt_text') }}
                    </p>

                    <div class="button-row">
                        <a id="apply-btn-accept" class="submit " onclick="apply_job()">
                            Send Request
                        </a>
                        <a data-bs-dismiss="modal" class="cancel">
                            Cancel
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal  fade modal-p-bottom" id="apply-modal-accept">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body py-5">
                    <h1>
                        {{ setting('apply.apply_success_prompt') }}
                    </h1>
                    <p>
                        {{setting('apply.apply_success_prompt_text') }}
                    </p>

                    <div class="button-row">
                        <a class="submit">
                            Done
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
@section('content')

    <div class="col-lg-12">
        <div class="container">
            <div class="top-googooli-container">
                <img class="ball ball_one" src="{{asset('assets/photo/blur_ball_one.png')}}">
                <img class="ball ball_two" src="{{asset('assets/photo/blur_ball_two.png')}}">
                <img class="ball ball_three" src="{{asset('assets/photo/blur_ball_three.png')}}">
                <img class="line lineanim" src="{{asset('assets/icon/lines.svg')}}">
            </div>

            <div class="row inner-container">
                <div class="col-lg-12">
                    <div class="item title-item">
                        <div class="inner-item">
                            <div class="title-image image-container">
                                @if($job->employer->avatar)
                                    <img class="main-image" src="{{ Voyager::image($job->employer->avatar) }}">
                                @else
                                    <img class="main-image" src="{{asset('assets/icon/profile.svg')}}">
                                @endif
                            </div>
                            <div class="content">
                                <h4>
                                    {{ $job->title }}
                                </h4>
                                <a class="username">
                                    @ {{ $job->employer->company_id }}
                                </a>

                                @if(auth()->guard('jobseeker')->check())

                                    @if($job->is_apply)
                                        <a class="apply-btn grey">
                                            applied
                                        </a>
                                    @else
                                        <a id="apply-btn" class="apply-btn">
                                            Apply
                                        </a>
                                    @endif

                                @elseif(auth()->guard('employer')->check() && $job->is_job)
                                    <a class="apply-btn" href="{{ route('delete_job' , $job->id) }}">
                                        Delete Job
                                    </a>
                                @elseif(auth()->guard('employer')->check())

                                @else
                                    <a class="apply-btn" href="{{ route('login_jobseeker') }}">
                                        Apply
                                    </a>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>


                <div class="col-lg-12">
                    <div id="tabs" class="tabs">
                        <ul class="tabs-nav">
                            <li><a href="#tab-1">Job

                                </a></li>
                            <li><a href="#tab-2">Company
                                </a></li>
                            <li><a href="#tab-3">Gallery
                                </a></li>
                        </ul>
                        <div class="tabs-stage">
                            <section id="tab-1">
                                <h5>
                                    Position Job
                                </h5>
                                <div class="tag-row">

                                    @foreach($job->positions as $position)
                                        <a class="tag-item">
                                            {{ $position->name }}
                                        </a>
                                    @endforeach

                                </div>
                                @if(count($job->benefits) > 0)
                                    <h5>
                                        Benefits
                                    </h5>
                                    <div class="tag-row">
                                        @foreach($job->benefits as $benefit)
                                            <a class="tag-item">
                                                {{ $benefit->name }}
                                            </a>
                                        @endforeach

                                    </div>
                                @endif
                                <h5>
                                    Type
                                </h5>
                                <div class="tag-row">
                                    @foreach($job->types as $type)
                                        <a class="tag-item">
                                            {{ $type->name }}
                                        </a>
                                    @endforeach

                                </div>
                                @if(count($job->skills) > 0)
                                    <h5>
                                        Skill
                                    </h5>
                                    <div class="tag-row">
                                        @foreach($job->skills as $skill)
                                            <a class="tag-item">
                                                {{ $skill->name }}
                                            </a>
                                        @endforeach

                                    </div>
                                @endif
                                @if($job->salary_from)
                                    <h5>
                                        Salary
                                    </h5>
                                    <div class="tag-row">
                                        <a class="tag-item">
                                            $ {{ $job->salary_from }}
                                            -
                                            $ {{ $job->salary_to }}
                                            Per
                                            {{ $job->salary_period }}
                                        </a>


                                    </div>
                                @endif
                                <h5>
                                    Job Description
                                </h5>
                                </br>
                                <p style="white-space: pre-line;">
                                    {!! $job->about !!}
                                </p>

                            </section>
                            <section id="tab-2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5>
                                            Company Information
                                        </h5>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">

                                                <div class="main-details-items flex-box">
                                                    <div class="flex-box details-items">
                                                        <img src="{{asset('assets/icon/website.svg')}}">
                                                        Website

                                                    </div>

                                                    <h6>
                                                        <a style="color:blue;"
                                                           href="{{ strpos($job->employer->website, 'http') === false ? 'http://' . $job->employer->website : $job->employer->website  }}"
                                                           target="_blank">
                                                            {{ $job->employer->website }}
                                                        </a>
                                                    </h6>

                                                </div>
                                                <div class="main-details-items flex-box">
                                                    <div class="flex-box details-items">
                                                        <img src="{{asset('assets/icon/seo.svg')}}">
                                                        CEO

                                                    </div>
                                                    <h6>
                                                        {{ $job->employer->ceo }}
                                                    </h6>

                                                </div>
                                                @if($employer->company_size)

                                                    <div class="main-details-items flex-box">

                                                        <div class="flex-box details-items">
                                                            <img src="{{asset('assets/icon/company.svg')}}">
                                                            Company Size

                                                        </div>
                                                        <h6>
                                                            {{ $employer->size->name }}

                                                        </h6>

                                                    </div>
                                                @endif

                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                @if($employer->location)

                                                    <div class="main-details-items flex-box">
                                                        <div class="flex-box details-items">
                                                            <img src="{{asset('assets/icon/location2.svg')}}">
                                                            Location

                                                        </div>
                                                        <h6>
                                                            {{ $employer->location_name->name }}
                                                        </h6>

                                                    </div>
                                                @endif

                                                <div class="main-details-items flex-box">
                                                    <div class="flex-box details-items">
                                                        <img src="{{asset('assets/icon/telegram2.svg')}}">
                                                        Address

                                                    </div>
                                                    <h6>
                                                        {{ $job->employer->address }}
                                                    </h6>

                                                </div>
                                                <div class="main-details-items flex-box">
                                                    <div class="flex-box details-items">
                                                        <img src="{{asset('assets/icon/socail.svg')}}">
                                                        Social

                                                    </div>
                                                    <h6>
                                                        <a style="color:blue;"
                                                           href="{{ strpos($job->employer->social, 'http') === false ? 'http://' . $job->employer->social : $job->employer->social }}"
                                                           target="_blank">
                                                            {{ $job->employer->social }}
                                                        </a>
                                                    </h6>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <h5>
                                            About Company
                                        </h5>
                                        <p style="white-space: pre-line;">
                                            {!! $job->employer->about !!}

                                        </p>
                                    </div>
                                </div>


                            </section>
                            <section id="tab-3">
                                <div class="row">
                                    @foreach($employer->galleries as $gallery)
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <a class="image-item">
                                                <img src="{{ Voyager::image($gallery->file) }}">
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                {{--
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h3 class="title-items">
                                                Recommended Job
                                            </h3>
                                        </div>
                                        <div class="col-lg-12">
                                            <a class=" item">

                                                <div class="inner-item">
                                                    <div class="image-container">
                                                        <img class="main-image" src="{{asset('assets/photo/tesla.png')}}">
                                                        <img class="icon" src="{{asset('assets/icon/home.svg')}}">
                                                    </div>
                                                    <div class="content">
                                                        <h4>
                                                            Senior Project Manager (Software)
                                                        </h4>
                                                        <div class="username">
                                                            @tesla
                                                        </div>


                                                    </div>
                                                    <div class="details">
                                                        <div>
                                                            <img src="{{asset('assets/icon/clock.svg')}}">
                                                            <span>4 Hours ago</span>
                                                        </div>
                                                        <div>
                                                            <img src="{{asset('assets/icon/location_small.svg')}}">
                                                            <span>New York</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                --}}

                @if(auth()->guard('employer')->check())
                    @if( ! ($job->promote_in_home || $job->promote_in_category))
                        <a class="apply-btn" style="position: relative; right: 0px;"
                           href="{{ route('employer_promote' , $job->id) }} }}">
                            promote
                        </a>
                    @endif
                @endif
            </div>

        </div>


    </div>


@endsection

@section('optional_footer')
    <script>
        $(document).ready(function () {
            $("#apply-btn").click(function () {
                var applybtn = $(this)
                $('#apply-modal').modal('show');
                $("#apply-modal .submit").click(function () {
                    $('#apply-modal').modal('hide');
                    applybtn.addClass("grey")
                    applybtn.html("Applied")
                });

            });
        });
        $(document).ready(function () {
            $("#apply-btn-accept").click(function () {
                var applybtn = $(this)
                $('#apply-modal-accept').modal('show');
                $("#apply-modal-accept .submit").click(function () {
                    $('#apply-modal-accept').modal('hide');
                    applybtn.addClass("grey")
                    applybtn.html("Applied")
                });

            });
        });


        // Show the first tab by default
        $('.tabs-stage section').hide();
        $('.tabs-stage section:first').show();
        $('.tabs-nav li:first').addClass('tab-active');

        // Change tab class and display content
        $('.tabs-nav a').on('click', function (event) {
            event.preventDefault();
            $('.tabs-nav li').removeClass('tab-active');
            $(this).parent().addClass('tab-active');
            $('.tabs-stage section').hide();
            $($(this).attr('href')).show();
        });

        function apply_job() {
            $.ajax(
                {
                    "url": "{{ route('jobseeker_apply') }}/" + {{ $job->id }},
                    "method": "POST",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                    }
                }
            ).done(function (response) {
                console.log(response);
                // location.reload();
            });

        }

    </script>

@endsection
