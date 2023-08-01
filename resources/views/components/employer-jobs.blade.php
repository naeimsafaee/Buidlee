<div class="col-lg-12">
    <a class=" item" href="{{ route('single_job' , $job->id)  }}" target="_blank">

        <div class="inner-item">
            <div class="image-container">
                @if($job->employer->avatar)
                <img class="main-image" src="{{ Voyager::image($job->employer->avatar) }}">
                @else
                <img class="main-image" src="{{asset('assets/icon/profile.svg')}}">
                @endif

                <img class="icon" src="{{asset('assets/icon/home.svg')}}">
            </div>
            <div class="content">
                <h4>
                    {{ $job->title }}
                </h4>

                <div class="username">
                    @ {{ $job->employer->company_id }}
                </div>


            </div>
            <div class="details">
                <div>
                    <img src="{{asset('assets/icon/clock.svg')}}">
                    <span>{{ $job->Time }}</span>
                </div>
                <div>
                    <img src="{{asset('assets/icon/location_small.svg')}}">
                    @if($job->employer->location)
                        <span>
                        {{ $job->employer->location_name->name }}
                        </span>
                    @endif
                </div>
            </div>
            @if($job->promote_in_category )
                <img class="star" src="{{ asset('assets/icon/star.svg') }}">
            {{--@else
            <p  class="employ-result waiting" onclick="window.location='{{ route('employer_promote' , $job->id) }}'" style="color: black">
                promote
            </p>--}}
            @endif

        </div>

    </a>

</div>
