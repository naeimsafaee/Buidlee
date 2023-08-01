<div class="col-lg-12">
    <section class=" footer flex-box ">
        <div class="left-item flex-box">
            <div>
                <h6>© 2021 FindJob.com, All rights reserved.</h6>

            </div>
            {{ menu('footer' , 'components.footer') }}
        </div>
        <div class=" social-icons">
            @if(setting('social.twitter'))
                <a href="{{ setting('social.twitter') }}">
                    <img src="{{asset('assets/icon/twitter.svg')}}">
                </a>
            @endif
            @if(setting('social.discord'))
                <a href="{{ setting('social.discord') }}">
                    <img src="{{asset('assets/icon/discord.svg')}}">
                </a>
            @endif
            @if(setting('social.telegram'))
                <a href="{{ setting('social.telegram') }}">
                    <img src="{{asset('assets/icon/telegram.svg')}}">
                </a>
            @endif

        </div>
    </section>

</div>
