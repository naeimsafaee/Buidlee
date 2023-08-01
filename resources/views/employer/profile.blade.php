@extends('index')
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
                                @if($employer->avatar)
                                    <img class="main-image" src="{{ Voyager::image($employer->avatar) }}">
                                @else
                                    <img class="main-image" src="{{asset('assets/icon/profile.svg')}}">
                                @endif
                            </div>
                            <div class="content">
                                <h4>
                                    {{ $employer->company_name }}
                                </h4>
                                <a class="username">
                                    @ {{ $employer->company_id }}
                                </a>
                                <a class="edit flex-box" href="{{ route('employer_edit_profile') }}">
                                    Edit Profile
                                    <img src="{{asset('assets/icon/edit.svg')}}">
                                </a>


                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div id="tabs" class="tabs">
                        <ul class="tabs-nav">
                            <li><a href="#tab-1">Overview

                                </a></li>
                            <li><a href="#tab-2">Jobs {{ count($employer->jobs) }}
                                </a></li>
                            <li><a href="#tab-3">Gallery
                                </a></li>
                        </ul>
                        <div id="tabs-stage" class="tabs-stage">
                            <section class="inner-tabs-stage" id="tab-1">
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
                                                        <a style="color: blue" target="_blank" href="{{ strpos($employer->website, 'http') === false ? 'http://' . $employer->website : $employer->website  }}">

                                                            {{ $employer->website }}
                                                        </a>
                                                    </h6>

                                                </div>
                                                <div class="main-details-items flex-box">
                                                    <div class="flex-box details-items">
                                                        <img src="{{asset('assets/icon/seo.svg')}}">
                                                        CEO

                                                    </div>
                                                    <h6>
                                                        {{ $employer->ceo }}

                                                    </h6>

                                                </div>
                                                <div class="main-details-items flex-box">
                                                    <div class="flex-box details-items">
                                                        <img src="{{asset('assets/icon/company.svg')}}">
                                                        Company Size

                                                    </div>
                                                    <h6>
                                                        @if($employer->company_size)
                                                        {{ $employer->size->name }}
                                                        @endif

                                                    </h6>

                                                </div>
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
                                                        {{ $employer->address }}
                                                    </h6>

                                                </div>
                                                <div class="main-details-items flex-box">
                                                    <div class="flex-box details-items">
                                                        <img src="{{asset('assets/icon/socail.svg')}}">
                                                        Social

                                                    </div>
                                                    <h6>
                                                        <a href="{{ strpos($employer->social, 'http') === false ? 'http://' . $employer->social : $employer->social  }}" target="_blank" style="color:blue;">
                                                            {{ $employer->social }}
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
                                            {!! $employer->about !!}

                                        </p>
                                    </div>
                                </div>


                            </section>

                            <section id="tab-2">
                                <div class="row">
                                    @each('components.employer-jobs' , $employer->jobs , 'job')

                                </div>


                            </section>
                            <section id="tab-3" class="inner-tabs-stage">
                                <div class="row">
                                    <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">

                                        <label for="galleryPicture" class="upload-image">
                                            Upload Video And photo
                                        </label>
                                        <input type="file" id="galleryPicture"  name="galleryPicture" accept=".png, .jpg, .jpeg" hidden >

                                    </div>
                                    @foreach($employer->galleries as $gallery)
                                    <div class="padding-item col-lg-4 col-md-4 col-sm-6 col-12">
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

            </div>

        </div>

    </div>

@endsection

@section('optional_footer')
    <script>

        console.log('hi');
        document.getElementById('galleryPicture').addEventListener('change', upload_file, false);

        function upload_file(evt) {

            var files = evt.target.files;

            // Loop through the FileList and render image files as thumbnails.
            for (var i = 0, f; f = files[i]; i++) {

                // Only process image files.
                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();

                // Closure to capture the file information.
                reader.onload = (function (theFile) {
                    return function (e) {
                        // Render thumbnail.

                        $("#profile_image").attr("src",e.target.result).css("width", "100%");

                        var form = new FormData();
                        form.append("_token", "{{ csrf_token() }}");

                        form.append(evt.target.name, theFile);

                        console.log("a" + evt.target.name);

                        var settings = {
                            "async": true,
                            "crossDomain": true,
                            "url": "{{ route('gallery_submit') }}",
                            "method": "POST",
                            "headers": {
                                "cache-control": "no-cache",
                            },
                            "processData": false,
                            "contentType": false,
                            "mimeType": "multipart/form-data",
                            "data": form
                        }

                        $.ajax(settings).done(function (response) {
                            console.log(response);

                            // location.reload();
                        });

                    };
                })(f);

                // Read in the image file as a data URL.
                reader.readAsDataURL(f);
            }
        }

    </script>

    <script>
        $("a.item").click(function(e){
            if($(e.target).hasClass("employ-result")){

                event.preventDefault();


            }else{
                window.location.href = $(this).attr('href');
            }


        });
    </script>


@endsection
