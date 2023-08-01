<div class="col-lg-12">
    <div class=" item ">

        <div class="inner-item">
            <div class="image-container">
                @if($job->employer->avatar)
                    <img class="main-image" src="{{ Voyager::image($job->employer->avatar) }}">
                @else
                    <img class="main-image" src="{{asset('assets/icon/profile.svg')}}">
                @endif                <img class="icon" src="{{asset('assets/icon/home.svg')}}">
            </div>
            <div class="content">
                <h4>
                    {{ $job->title }}
                </h4>
                <a class="username">
                    @ {{ $job->employer->company_id }}
                </a>


            </div>
            <div class="details">
                <div class="crypto">
                    <img src="{{asset('assets/icon/bitcoin.svg')}}">
                    <span>We pay in crypto</span>
                </div>
                <div>
                    <img src="{{asset('assets/icon/clock.svg')}}">
                    <span>4 Hours ago</span>
                </div>
                <div>
                    <img src="{{asset('assets/icon/location_small.svg')}}">
                    <span>{{ $job->employer->location }}</span>
                </div>
            </div>
            <img class="star" src="{{asset('assets/icon/star.svg')}}">
        </div>
    </div>

</div>
