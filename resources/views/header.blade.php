<div class="mobile-menu mobile">
    <a class="logo-box" href="{{ route('home') }}">
{{--        <img src="{{  \Illuminate\Support\Facades\Storage::url(json_decode(setting('site.logo'))[0]->download_link) }}" class="logo">--}}
    </a>
    <img src="{{asset('assets/icon/cancel.svg')}}" class="close">
  {{--  <a href="{{ route('home') }}">
        Find Job
    </a>
    <a>
        Package
    </a>--}}
    {{ menu('header') }}

</div>
<div class="col-lg-12">
    <nav class="flex-box navbar ">
        <div class="left-nav flex-box">
            <img src="{{asset('assets/icon/menu.svg')}}" class="mobile-menu-icon mobile">
            <a class="logo-box" href="{{ route('home') }}">
{{--                <img src="{{  \Illuminate\Support\Facades\Storage::url(json_decode(setting('site.logo'))[0]->download_link) }}" class="logo web">--}}
            </a>

            <ul class="web">
                {{ menu('header' , 'components.header') }}
            </ul>
        </div>
        @if(auth()->guard('employer')->check())
            <div class="flex-box">
                <a class=" flex-box left-nav-item" href="{{ route('employer_create') }}">
                    <img src="{{asset('assets/icon/create.svg')}}">
                    <h5>Create </h5>
                </a>
                <a class=" flex-box left-nav-item" href="{{ route('employer_requests') }}">
                    <img src="{{asset('assets/icon/request.svg')}}">
                    <h5>Requests</h5>
                </a>
                <a class=" flex-box left-nav-item" href="{{ route('employer_profile') }}">
                    <div class="account">
                        @if(auth()->guard('employer')->user()->avatar )
                            <img src="{{ Voyager::image(auth()->guard('employer')->user()->avatar) }}">
                        @else
                            <img src="{{asset('assets/icon/profile.svg')}}">
                        @endif
                    </div>
                    <h5> Account</h5>
                </a>
                <a class=" flex-box left-nav-item" href="{{ route('logout') }}">
                    <img src="{{asset('assets/icon/logout.svg')}}">
                </a>
            </div>
        @elseif(auth()->guard('jobseeker')->check())
            <div class="flex-box">
                <a class=" flex-box left-nav-item" href="{{ route('jobseeker_requests') }}">
                    <img src="{{asset('assets/icon/request.svg')}}">
                    <h5>Requests</h5>
                </a>
                <a class=" flex-box left-nav-item" href="{{ route('jobseeker_profile') }}">
                    <div class="account">
                        @if(auth()->guard('jobseeker')->user()->avatar)
                            <img src="{{ Voyager::image(auth()->guard('jobseeker')->user()->avatar) }}">
                        @else
                            <img src="{{asset('assets/icon/profile.svg')}}">
                        @endif
                    </div>
                    <h5> Account</h5>
                </a>
                <a class=" flex-box left-nav-item" href="{{ route('logout') }}">
                    <img src="{{asset('assets/icon/logout.svg')}}">
                </a>
            </div>

        @else
            <a href="{{ route('login') }}">
                <img src="{{asset('assets/icon/login.svg')}}">
                <h5> Login and Register</h5>
            </a>
        @endif
    </nav>
</div>
