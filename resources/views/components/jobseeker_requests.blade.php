@if($request && $request->job)
<div class="col-lg-12">
    <div class=" item"  onclick="window.location='{{ route('single_job' ,$request->job->id ) }}'">

        <div class="inner-item">
            <div class="image-container">
                @if($request->employer->avatar)
                    <img class="main-image" src="{{ Voyager::image($request->employer->avatar) }}">
                @else
                    <img class="main-image" src="{{asset('assets/icon/profile.svg')}}">

                @endif
                <img class="icon" src="{{asset('assets/icon/home.svg')}}">
            </div>
            <div class="content">
                <h4>
                    {{ $request->job->title }}
                </h4>
                <a class="username" href="{{ route('single_job' ,$request->job->id ) }}">
                    @ {{ $request->employer->company_id }}
                </a>


            </div>
            <div class="details">
                <div>
                    <img src="{{asset('assets/icon/clock.svg')}}">
                    <span>{{ $request->time }}</span>
                </div>
                <div>
                    @if($request->employer->location)
                        <img src="{{asset('assets/icon/location_small.svg')}}">
                        <span>{{ $request->employer->location_name->name }}</span>
                    @endif
                </div>
            </div>
            @if($request->status == 'waiting')
                <p class="employ-result waiting">
                    Waiting
                </p>
            @elseif($request->status == 'accept')
                <p class="employ-result Accepted ">
                    Accepted
                </p>
            @elseif($request->status == 'reject')
                <p class="employ-result red ">
                    Reject
                </p>
            @endif

            @if($request->description)
                <div class="inner-item content-details">
                    <h5>
                        Employer Message
                    </h5>
                    <p>
                        {{ $request->description }}
                    </p>
                </div>
            @endif
        </div>
    </div>

</div>
@endif
