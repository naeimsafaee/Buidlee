@extends('index')
@section('modal')
    <div class="modal  fade modal-p-bottom" id="filter-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body py-5">
                    <h1>
                        Filter
                    </h1>
                    <form>
                        <div class="input-row">
                            <label>
                                Position Job
                            </label>
                            <div id="Position-Job" class="dropdown">
                                <div class="select">
                                    <span> Position Job</span>
                                    <div class="dropdown-arrow">
                                        <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="gender">
                                <ul class="dropdown-menu">

                                </ul>
                            </div>
                            <div id="Position-tag-row" class="tag-row">

                            </div>

                        </div>
                        <div class="input-row">
                            <label>
                                Benefits
                            </label>
                            <div id="Benefits" class="dropdown">
                                <div class="select">
                                    <span> Benefits </span>
                                    <div class="dropdown-arrow">
                                        <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="gender">
                                <ul class="dropdown-menu">

                                </ul>
                            </div>
                            <div id="Benefits-tag-row" class="tag-row">

                            </div>

                        </div>
                        <div class="input-row">
                            <label>
                                Type
                            </label>
                            <div id="Type" class="dropdown">
                                <div class="select">
                                    <span> Type </span>
                                    <div class="dropdown-arrow">
                                        <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                    </div>
                                </div>
                                <input type="hidden" name="gender">
                                <ul class="dropdown-menu">

                                </ul>
                            </div>
                            <div id="Type-tag-row" class="tag-row">

                            </div>

                        </div>
                        <div class="date-details-row">
                            <h5>
                                Date Posted
                            </h5>
                            @foreach(config('Constants.DATE_POSTED') as $key => $value)
                                <a onclick="document.getElementById('date_posted').value = {{ $key }};"
                                   class="first-choose date-details @if($loop->index == 0) active @endif">
                                    {{ $value }}
                                </a>
                            @endforeach

                            <input type="hidden" name="date_posted" id="date_posted"
                                   value="{{ array_keys(config('Constants.DATE_POSTED'))[0] }}"/>
                        </div>
                        <div class="date-details-row date-details-row-1">
                            <h5>
                                Sort By
                            </h5>
                            @foreach(config('Constants.DATE_POSTED_1') as $key => $value)
                                <a onclick="document.getElementById('date_posted_1').value = {{ $key }};"
                                   class="second-choose date-details @if($loop->index == 0) active @endif">
                                    {{ $value }}
                                </a>
                            @endforeach
                            <input type="hidden" name="date_posted_1" id="date_posted_1"
                                   value="{{ array_keys(config('Constants.DATE_POSTED_1'))[0] }}"/>

                        </div>
                        <div class="button-row">
                            <a class="submit " data-bs-dismiss="modal" onclick="run_ajax(false , true)">
                                Submit
                            </a>
                            <a data-bs-dismiss="modal" class="cancel">
                                Cancel
                            </a>
                            <a class="Reset" data-bs-dismiss="modal" onclick="reset_filter()">
                                Reset Filter
                            </a>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
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


    <div id="detail-content">
        <div id="white_div" style="display:none;width: 100%;height: 100%;position: absolute;margin-top: -10px;z-index: 1000;background-color: #fff;"></div>
        <div class=" item">

            <div class="inner-item">
                <div class="image-container">
                    <img class="main-image" id="main-image-modal" src="{{asset('assets/icon/profile.svg')}}">

                </div>
                <div class="content">
                    <div class="flex-box">
                        <a id="title_modal_link" target="_blank" style="width: 100%">
                            <h4 id="title_modal">

                            </h4>
                        </a>

                        @if(auth()->guard('jobseeker')->check())
                            <a id="apply-btn" class="apply-btn">
                                Apply
                            </a>
                        @elseif(auth()->guard('employer')->check() )
                            <a id="apply-btn" class="apply-btn">
                                Delete Job
                            </a>
                        @else
                            <a id="apply-btn" show="false" class="apply-btn" href="{{ route('login_jobseeker') }}">
                                Apply
                            </a>
                        @endif

                    </div>
                    <a class="username" id="username-modal">

                    </a>


                </div>
                <div class="details">

                    <div id="div_of_location_modal">
                        <img src="{{asset('assets/icon/location_small.svg')}}">
                        <span id="location-modal"></span>
                    </div>
                    {{--                    <div>--}}
                    {{--                        <img src="{{asset('assets/icon/remote.svg')}}">--}}
                    {{--                        <span>Remote</span>--}}
                    {{--                    </div>--}}
                    <div>
                        <img src="{{asset('assets/icon/clock2.svg')}}">
                        <span id="time-modal"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="tabs">
            <ul class="tabs-nav">
                <li><a href="#tab-1">Job
                        <span>

                        </span>
                    </a></li>
                <li><a href="#tab-2">Company
                        <span></span>
                    </a></li>
                <li><a href="#tab-3">Gallery
                        <span></span>
                    </a></li>
            </ul>
            <div class="tabs-stage">
                <section id="tab-1">
                    <h5 id="positions-modal-title">
                        Position Job
                    </h5>
                    <div class="tag-row" id="positions-modal">

                    </div>
                    <h5 id="benefit-modal-title">
                        Benefits
                    </h5>
                    <div class="tag-row" id="benefit-modal">

                    </div>
                    <h5 id="type-modal-title">
                        Type
                    </h5>
                    <div class="tag-row" id="type-modal">

                    </div>
                    <h5 id="skill-modal-title">
                        Skill
                    </h5>
                    <div class="tag-row" id="skill-modal">

                    </div>
                    <h5 id="salary_have_to_remove">
                        Salary
                    </h5>
                    <div class="tag-row" id="salary_have_to_remove_1">
                        <a class="tag-item" id="salary-modal">

                        </a>
                    </div>
                    <h5>
                        Job Description
                    </h5>
                    </br>
                    <p id="description-modal" style="white-space: pre-line;">

                    </p>
                </section>
                <section id="tab-2">
                    <h5>
                        Company Information
                    </h5>
                    <div class="main-details-items flex-box">
                        <div class="flex-box details-items">
                            <img src="{{asset('assets/icon/website.svg')}}">
                            Website
                        </div>
                        <h6>
                            <a id="website-modal" style="color:blue;">

                            </a>

                        </h6>

                    </div>
                    <div class="main-details-items flex-box">
                        <div class="flex-box details-items">
                            <img src="{{asset('assets/icon/seo.svg')}}">
                            CEO
                        </div>
                        <h6 id="ceo-modal">

                        </h6>

                    </div>
                    <div class="main-details-items flex-box">
                        <div class="flex-box details-items">
                            <img src="{{asset('assets/icon/company.svg')}}">
                            Company Size
                        </div>
                        <h6 id="company-size-modal">

                        </h6>
                    </div>
                    <div class="main-details-items flex-box" id="div_of_location_modal_1">
                        <div class="flex-box details-items">
                            <img src="{{asset('assets/icon/location2.svg')}}">
                            Location

                        </div>
                        <h6 id="location-modal-1">

                        </h6>

                    </div>
                    <div class="main-details-items flex-box">
                        <div class="flex-box details-items">
                            <img src="{{asset('assets/icon/telegram2.svg')}}">
                            Address

                        </div>
                        <h6 id="address-modal">

                        </h6>

                    </div>
                    <div class="main-details-items flex-box">
                        <div class="flex-box details-items">
                            <img src="{{asset('assets/icon/socail.svg')}}">
                            Social

                        </div>
                        <h6>
                            <a id="social-modal" style="color:blue;">

                            </a>

                        </h6>

                    </div>
                    <h5>
                        About Company
                    </h5>
                    <p id="about-emp-modal" style="white-space: pre-line;">


                    </p>
                </section>
                <section id="tab-3">
                    <div class="row" id="galley-modal">

                    </div>
                </section>
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
            <div class="bottom-googooli-container">
                <div>
                    <img class="ball rotating scaling ball_one" src="{{asset('assets/photo/blur_ball_one.png')}}">
                    <img class="ball rotating scaling ball_two" src="{{asset('assets/photo/blur_ball_two.png')}}">
                    <img class="ball rotating scaling ball_three" src="{{asset('assets/photo/blur_ball_three.png')}}">
                </div>

                <img class="line lineanim" src="{{asset('assets/icon/lines.svg')}}">
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="row heading">
                        <div class="col-lg-6">
                            <h1>{{ setting('home.title') }}</h1>
                            <h2>{{ setting('home.description') }}</h2>
                            <h5>{{ $jobs_count }} job opportunities waiting for you to apply</h5>


                            <div class="start-row">
                                <a class="scrollsomething button grow-on-hover" href="#jobs"
                                   style="z-index:-1">
                                    Start Now
                                </a>
                                @if(auth()->guard('employer')->check())
                                    <a class="company-button" href="{{ route('employer_create') }}">Company? Post a
                                        Job</a>
                                @else
                                    <a class="company-button" href="{{ route('register_employer') }}">Company? Post a
                                        Job</a>
                                @endif
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
                        </div>
                    </section>

                </div>
                <div id="jobs" class="col-lg-12">
                    <div class="main-content row justify-content-center">
                        <div class="row">
                            <div class="center-item col col-md-12 col-lg-6">
                                <form onsubmit="return run_ajax(event , true)">
                                    <div class="search-box">
                                        <img src="assets/icon/search.svg">
                                        <input type="search" placeholder="Search" id="search" name="search">

                                        {{--todo<div class="location">
                                            <img src="assets/icon/location.svg">
                                            <span>Location</span>
                                        </div>--}}
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="row layer2">
                            <div class="center-item col col-md-12 col-lg-6">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <div class="filter-box flex-box">
                                            <a class="Category-item">
                                                <img src="assets/icon/category.svg">
                                                <span>Job Category</span>
                                            </a>
                                            <div class="category-box-choose" id="selected_categories">

                                            </div>


                                        </div>
                                    </div>
                                    <div class=" item category-box ">
                                        <div class="inner-item">
                                            <h1>
                                                Categories
                                            </h1>
                                            <form onsubmit="return get_category(event)">
                                                <div class="search-box">
                                                    <img src="assets/icon/search.svg">
                                                    <input type="search" placeholder="Search" id="category_input"
                                                           name="category" oninput="get_category()">
                                                </div>
                                            </form>
                                            <div class="category-row" id="category-row">
                                                {{--@foreach($categories as $category)
                                                <a class="tag-item">
                                                    {{ $category->name }}
                                                </a>
                                                @endforeach--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row layer1">
                            <div class="center-item col col-md-12 col-lg-6">
                                <div class="row tabs-box justify-content-between">
                                    <div class="col-8 col-sm-6 col-md-6 col-lg-6 col-xl-8 tabs">
                                        <div class="row justify-content-between">

                                            @foreach(config('Constants.LEVELS') as $key => $level)
                                                <a class="level_items col-auto {{ $loop->index == 0 ? "active" : "" }}"
                                                   onclick="run_with_level({{ $key }}, {{ $loop->index }})">{{ $level }}</a>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="col-auto grow-on-hover">
                                        <a data-bs-toggle="modal" data-bs-target="#filter-modal">
                                            <img src="assets/icon/filter.svg">
                                            <span>Filter</span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="items-row layer1 row mainItemSearch">
                            <div class="center-item col col-md-12 col-lg-6">
                                <div class="row" id="all_data">
                                    {{--                                    @each('components.home_jobs' , $jobs , 'job')--}}
                                </div>
                            </div>
                            <div class="left-row col col-md-6 col-lg-6">
                                <div id="details-box" class="left-item-content">


                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="center-item col col-md-12 col-lg-6">
                                <div class="pagination" id="pagination">

                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>

    </div>

    <script>


        let filter_items = @json(\App\Models\Position::all());
        let Benefits_filter_items = @json(\App\Models\Benefits::all());
        let type_filter_items = @json(\App\Models\Type::all());


    </script>

@endsection

@section('optional_footer')
    <script>

        let page = 1;
        let level = {{ array_keys(config('Constants.LEVELS'))[0] }};
        let categoies_array = [];

        function run_with_level(_level, index) {
            if (level === _level)
                return;

            let items = document.getElementsByClassName('level_items');

            for (let i = 0; i < items.length; i++)
                items[i].classList.remove("active");

            items[index].classList.add("active");

            level = _level;
            run_ajax(false, true);
        }

        function get_category(e = false) {
            if (e)
                e.preventDefault();

            const category = document.getElementById("category_input").value;
            /*if (category.length === 0)
                return clear_category_data();*/

            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "{{ route('get_category') }}",
                "method": "GET",
                "headers": {
                    "cache-control": "no-cache",
                },
                "data": {name: category}
            }

            $.ajax(settings).done(function (response) {
                // console.log(response);

                clear_category_data();

                const data = response;

                if (data.length === 0)
                    return;

                for (let i = 0; i < data.length; i++) {

                    const category = data[i];

                    const template =
                        `<a class="tag-item category_item" onclick="set_category(${category.id}, '${category.name}')">
                            ${category.name}
                        </a>`;

                    $('#category-row').append(template).hide().fadeIn(300);
                }

                category_initFilterList();

            });
        }

        var active_category = [];

        function set_category(category_id, category_name) {
            if (active_category.indexOf(category_name) >= 0) {

            } else {

                active_category.push(category_name);
                $(".category-box-choose").append(
                    `<span class="tag" data-id="${category_id}"><img src="assets/icon/remove.svg">${category_name}</span>`
                ).fadeIn(300);
            }


            $(".tag").click(function () {
                $(this).fadeOut(300, function () {
                    active_category = active_category.filter(function (elem) {
                        return elem != category_name;
                    });
                    console.log('fade out done')
                    $(this).remove();

                    categoies_array = removeA(categoies_array, $(this).attr('data-id'));
                    run_ajax(false, true);

                    category_initFilterList()
                })
            });

            categoies_array.push(category_id);

            run_ajax(false, true);
        }

        function removeA(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax = arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        function reset_filter() {

            categoies_array = [];

            $("#Position-tag-row").empty();
            $("#Benefits-tag-row").empty();
            $("#Type-tag-row").empty();
            $("#date_posted").val("{{ array_keys(config('Constants.DATE_POSTED'))[0] }}");
            $("#date_posted_1").val("{{ array_keys(config('Constants.DATE_POSTED_1'))[0] }}");

            $(".date-details-row a").removeClass('active');

            $(".date-details-row a:first").addClass('active');
            $(".date-details-row-1 a:first").addClass('active');

            run_ajax(false, true)
        }

        function go_to_page(_page) {
            page = _page;
            run_ajax();
        }

        function run_ajax(e = false, needs_rest_page = false, callback = false) {
            if (e)
                e.preventDefault();
            if (needs_rest_page)
                page = 0;

            var data = new FormData();

            const positions = document.getElementsByName('Positions[]');
            const benefits = document.getElementsByName('Benefits[]');
            const types = document.getElementsByName('types[]');

            for (let i = 0; i < positions.length; i++) {
                data.append('positions[]', positions[i].value);
            }

            for (let i = 0; i < benefits.length; i++) {
                data.append('benefits[]', benefits[i].value);
            }

            for (let i = 0; i < types.length; i++) {
                data.append('types[]', types[i].value);
            }

            for (let i = 0; i < categoies_array.length; i++) {
                data.append('categories[]', categoies_array[i]);
            }

            data.append('date_posted', document.getElementById("date_posted").value);
            data.append('date_posted_1', document.getElementById("date_posted_1").value);


            const search = document.getElementById("search").value;
            if (search.length > 0)
                data.append('search', search);

            data.append('page', page + "");
            data.append('level', level + "");

            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "{{ route('search') }}",
                "method": "POST",
                "headers": {
                    "cache-control": "no-cache",
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": data
            }

            $.ajax(settings).done(function (response) {
                // console.log(response);

                clear_data();

                response = JSON.parse(response);

                const data = response.data;

                if (data.length === 0) {
                    const paginate = $("#pagination");

                    paginate.empty();
                    return;
                }

                let template = "";

                for (let i = 0; i < data.length; i++) {

                    const job = data[i];

                    template +=
                        `<div class="col-lg-12">
                                    <div class="item" data-id="${job.id}" data-index="${i}">
                                        <div class="inner-item">
                                            <div class="image-container">
                                                <img class="main-image" src="${job.employer.avatar ? '/storage/' + job.employer.avatar : 'assets/icon/profile.svg'}">
                                                <img class="icon" src="{{asset('assets/icon/home.svg')}}">
                                            </div>
                                            <div class="content">
                                                <h4>
                                                    ${job.title}
                                                </h4>
                                                <a class="username">
                                                    @ ${job.employer.company_id}
                                                </a>
                                            </div>
                                            <div class="details">

                                             ${job.crypto == 1 ? ` <div class="crypto">
                                                    <img src="{{asset('assets/icon/bitcoin.svg')}}">
                                                    <span>We pay in crypto</span>
                                                </div>` : ``}

                                                <div>
                                                    <img src="{{ asset('assets/icon/clock.svg') }}">
                                                    <span>${job.Time}</span>
                                                </div>
                                                <div>
                                                    ${job.employer.location_name != null ? "<img src=\"{{ asset('assets/icon/location_small.svg') }}\">\n" +
                            "                                                    <span>" + job.employer.location_name.name + "</span>" : ""}
                                                </div>
                                            </div>
                                            {{--${(job.promote_in_home == "1" || job.promote_in_category == "1") ? '<img class="star" src="{{ asset('assets/icon/star.svg') }}">' : ""}--}}
                                            ${( job.promote_in_category == "1") ? '<img class="star" src="{{ asset('assets/icon/star.svg') }}">' : ""}
                                        </div>
                                    </div>
                                </div>`;

                }

                $('#all_data').html(template);


                var data_id_item = -1;
                var data_id_index = -1;
                var data_id_this_item;

                $('body').click(function (event) {
                    if (!$(event.target).closest('#all_data').length && !$(event.target).is('#all_data') && !$(event.target).closest('#detail-content').length) {

                        if (data_id_this_item.hasClass('active')) {
                            $(".center-item").removeClass('active');
                            $(".items-row").removeClass('active');
                            data_id_this_item.removeClass('active');
                            $(".left-row").hide();
                            $("#detail-content").hide();
                            setDetailBoxSize()
                        }
                    }

                });


                $('.items-row .item').click(function () {

                    // var mainItemParent = $(".mainItemSearch");

                    let item = $(this);
                    data_id_this_item = $(this);

                    data_id_index = $(this).attr('data-index');


                    data_id = item.attr('data-id');
                    if ($(window).width() > 950) {

                        if (!$('.center-item').hasClass('active')) {

                            $(".center-item").toggleClass('active');
                            $(".center-item .item").removeClass('active');
                            $(".items-row").removeClass('active');
                            setTimeout(function () {
                                item.toggleClass('active');
                                $(".left-row").show();
                                $("#detail-content").show();
                                setDetailBoxSize()

                            }, 400)

                            get_job(data_id);

                        } else {
                            if (item.hasClass('active')) {
                                $(".center-item").removeClass('active');
                                $(".items-row").removeClass('active');
                                item.removeClass('active');
                                $(".left-row").hide();
                                $("#detail-content").hide();
                                setDetailBoxSize()
                            } else {
                                $(".center-item .item").removeClass('active');
                                item.addClass('active')
                                get_job(data_id);

                            }
                        }

                    } else {
                        window.open("{{ route('single_job') }}/" + data_id);
                    }


                });

                initial_page_number(response.last_page, response.current_page);

            });

        }

        function initial_page_number(last, current) {

            const paginate = $("#pagination");

            paginate.empty();

            for (let i = 0; i < last; i++) {
                const template = `<a onclick="go_to_page(${i + 1})" ${(i + 1) == current ? 'style="border: 1px solid var(--color-primary) !important;"' : ""}>${i + 1}</a>`;
                paginate.append(template).hide().fadeIn(300);
            }

            const template = `<div>${current} of ${last}</div>`;
            paginate.append(template).hide().fadeIn(300);

        }

        function clear_data() {
            $('#all_data').empty();
        }

        function clear_category_data() {
            $('#category-row').empty();
        }

        $(document).ready(function () {
            $("#apply-btn").click(function () {

                var applybtn = $(this);
                // console.log(applybtn.attr("show"));

                if (applybtn.attr("show") == "true") {
                    $('#apply-modal').modal('show');

                    $("#apply-modal .submit").click(function () {
                        $('#apply-modal').modal('hide');
                        applybtn.addClass("grey")
                        applybtn.html("Applied")
                    });
                }

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

        // ------------category
        $(".Category-item").click(function (e) {
            $(".category-box").toggle()
            e.stopPropagation();
        });

        $(".category-box").click(function (e) {
            e.stopPropagation();
        });

        $(document).click(function () {
            $(".category-box").hide()

        });

        $(document).ready(function () {
            category_initFilterList()
        });

        function category_initFilterList() {

            $(".category-row a").click(function (element) {


                $(".category-box-choose").append(
                    `<span class="tag"><img src="assets/icon/remove.svg">${element.target.innerText}</span>`
                ).fadeIn(300)


                $(".tag").click(function (element) {
                    $(this).fadeOut(300, function () {
                        console.log('fade out done')
                        $(this).remove();
                        category_initFilterList();

                        run_ajax(false, true, false);
                    })
                });

            });

        }

        function clear_job() {
            $("#positions-modal-title").hide();
            $("#benefit-modal-title").hide();
            $("#skill-modal-title").hide();
            $("#type-modal-title").hide();

            $("#positions-modal").empty();
            $("#benefit-modal").empty();
            $("#skill-modal").empty();
            $("#type-modal").empty();
            $("#galley-modal").empty();

            $("#description-modal").empty();
            $("#salary_have_to_remove_1").empty();
            $("#title_modal").empty();
            $("#username-modal").empty();
            $("#location-modal").empty();
            $("#time-modal").empty();
            $("#main-image-modal").hide();

        }

        function get_job(job_id) {

            $("#white_div").show();

            clear_job();

            $.ajax({
                "url": "{{ route('single_job_home') }}/" + job_id,
                "method": "GET",
                "data": {_token: "{{ csrf_token() }}"}
            }).done(function (data) {
                // console.log(data.is_apply);
                // response = JSON.parse(response);

                $("#white_div").fadeOut();

                const employer = data.employer;

                @if(auth()->guard('jobseeker')->check())
                if (data.is_apply) {

                    $("#apply-btn").addClass("grey").attr("show", false).text("Applied");

                } else {

                    $("#apply-btn").removeClass("grey").attr("show", true).text("Apply");

                }
                @endif

                    @if(auth()->guard('employer')->check())
                if (data.is_job) {

                    $("#apply-btn").removeClass("grey").attr("show", false).text("Delete job").attr("href", "{{ route('delete_job') }}/" + data.id);

                } else {

                    $("#apply-btn").css("display", "none");
                }
                @endif


                if (employer.avatar)
                    $("#main-image-modal").attr("src", "/storage/" + employer.avatar).show();
                else
                    $("#main-image-modal").attr("src", "{{asset('assets/icon/profile.svg')}}").show();

                $("#title_modal").text(data.title);
                $("#title_modal_link").attr("href", "{{ route('single_job') }}/" + data.id).attr('target','_blank');
                $("#username-modal").text("@" + employer.company_id);
                $("#website-modal").text(employer.website).attr("href", employer.website);
                $("#ceo-modal").text(employer.ceo);
                $("#address-modal").text(employer.address);
                $("#social-modal").text(employer.social).attr("href", employer.social);
                $("#about-emp-modal").text(employer.about);

                $("#company-size-modal").text(employer.size.name);

                if (employer.location_name != null) {
                    $("#div_of_location_modal_1").show();
                    $("#div_of_location_modal").show();

                    $("#location-modal-1").text(employer.location_name.name);
                    $("#location-modal").text(employer.location_name.name);
                } else {
                    $("#div_of_location_modal_1").hide();
                    $("#div_of_location_modal").hide();
                }


                $("#time-modal").text("Posted " + data.Time);
                if (data.salary_from) {
                    $("#salary_have_to_remove").show();
                    $("#salary-modal").show();
                } else {
                    $("#salary_have_to_remove").hide();
                    $("#salary-modal").hide();
                }

                $("#salary-modal").text(`$${data.salary_from} - $${data.salary_to} ${data.salary_period}`);
                $("#description-modal").append(data.about);

                if (data.positions.length > 0)
                    $("#positions-modal-title").show();

                for (let i = 0; i < data.positions.length; i++) {
                    const position = data.positions[i];

                    const template = `  <a class="tag-item">
                                            ${position.name}
                                        </a>`
                    $("#positions-modal").append(template).hide().fadeIn(300);
                }


                if (data.benefits.length > 0)
                    $("#benefit-modal-title").show();

                for (let i = 0; i < data.benefits.length; i++) {
                    const benefit = data.benefits[i];

                    const template = `  <a class="tag-item">
                                            ${benefit.name}
                                        </a>`
                    $("#benefit-modal").append(template).hide().fadeIn(300);
                }


                if (data.types.length > 0)
                    $("#type-modal-title").show();

                for (let i = 0; i < data.types.length; i++) {
                    const type = data.types[i];

                    const template = `  <a class="tag-item">
                                            ${type.name}
                                        </a>`
                    $("#type-modal").append(template).hide().fadeIn(300);
                }


                if (data.skills.length > 0)
                    $("#skill-modal-title").show();

                for (let i = 0; i < data.skills.length; i++) {
                    const skill = data.skills[i];

                    const template = `  <a class="tag-item">
                                            ${skill.name}
                                        </a>`
                    $("#skill-modal").append(template).hide().fadeIn(300);
                }


                for (let i = 0; i < employer.galleries.length; i++) {
                    const gallery = employer.galleries[i];

                    const template = `  <div class="padding-item col-lg-6 col-md-6">
                                            <a class="image-item">
                                                <img src="/storage/${gallery.file}">
                                            </a>
                                        </div>`

                    $("#galley-modal").append(template).hide().fadeIn(300);
                }


            });
        }

        let data_id = -1

        run_ajax(false, true);

        get_category(false);

        function apply_job() {
            $.ajax(
                {
                    "url": "{{ route('jobseeker_apply') }}/" + data_id,
                    "method": "POST",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                    }
                }
            ).done(function (response) {
                // console.log(response);
                location.reload();
            });


        }


    </script>

@endsection
