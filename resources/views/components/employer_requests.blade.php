@if($request)
    <div class="col-lg-12">
        <div class="item items-space">
            <div class=" inner-item ">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="flex-box">
                            <div class="image-container">
                                @if($request->jobseeker->avatar)
                                    <img class="main-image" src="{{ Voyager::image($request->jobseeker->avatar) }}">
                                @else
                                    <img class="main-image" src="{{asset('assets/icon/profile.svg')}}">

                                @endif
                            </div>
                            <div class="inner-details">
                                <h4>
                                    {{ $request->jobseeker->name }}
                                </h4>
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
                            </div>
                        </div>
                    </div>
                    <div class="flex-box flex-end col-lg-6 col-md-6 col-sm-12 col-12">
                        @if($request->status == 'waiting')
                            <div class="dropdown">
                                <div class="select">
                                    <span>Wating</span>

                                    <div class="dropdown-arrow">
                                        <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="gender">
                                <ul class="dropdown-menu">
                                    <li data-id="{{ $request->id }}">Accept</li>
                                    <li data-id="{{ $request->id }}">Reject</li>
                                </ul>
                            </div>
                        @elseif($request->status == 'accept')
                            <a class="download upload-image">Accepted</a>
                        @else
                            <a class="download Reset">Rejected</a>
                        @endif
                        <a class="submit download" target="_blank" href="{{ Storage::url($request->jobseeker->cv) }}">
                            Download CV
                        </a>
                    </div>
                </div>

            </div>
        </div>
        @if($request->job && $request->job->title)
            <p class="job-details">
                {{ $request->job->title }}
            </p>
        @endif
    </div>
@endif
