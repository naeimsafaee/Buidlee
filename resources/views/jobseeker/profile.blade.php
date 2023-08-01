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
            <div class="row inner-container">
                <div class="col-lg-12 ">
                    <div class="item title-item">
                        <div class="inner-item">

                            <div class="title-image image-container">
                                <div class=" avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="avatarPicture" accept=".png, .jpg, .jpeg"/>
                                        @if($jobseeker->avatar)
                                            <label for="imageUpload" class="inner-image-box">
                                                <img style="width: 100%;height: 100%" id="profile_image" src="{{ Voyager::image($jobseeker->avatar) }}">
                                            </label>
                                        @else
                                            <label for="imageUpload" class="inner-image-box">
                                                <img id="profile_image" src="{{asset('assets/icon/cloud.svg')}}">
                                            </label>
                                        @endif
                                    </div>

                                </div>
                                <labal class="inner-image-box flex-box">
                                    <div id="imagePreview" style=";"></div>
                                </labal>
                            </div>

                            <div class="content">
                                <h4>
                                    {{ $jobseeker->name }}
                                </h4>
                                <div class="email">
                                    @ {{ $jobseeker->username }}
                                </div>
{{--                                <a class="edit flex-box">--}}
{{--                                    Edit Profile--}}
{{--                                    <img src="{{asset('assets/icon/edit.svg')}}">--}}
{{--                                </a>--}}

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row  form-box inner-container">

                        <div class="col-lg-12">
                            <div class="item">
                                <form method="post" action="{{ route('jobseeker_profile') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Full Name
                                                </label>
                                                <input type="text" placeholder="Full Name" name="name"
                                                       value="{{ $jobseeker->name }}">
                                                <img src="{{asset('assets/icon/user-name.svg')}}">
                                                <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Your Position/Job Title
                                                </label>
                                                <input type="text" placeholder="HR" name="job_title"
                                                       value="{{ $jobseeker->job_title }}">
                                                <img src="{{asset('assets/icon/lastname.svg')}}">
                                                <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Contact Email
                                                </label>
                                                <input type="text" placeholder="Email" name="email"
                                                       value="{{ $jobseeker->email }}">
                                                <img src="{{asset('assets/icon/calender.svg')}}">
                                                <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                            @error('email')
                                            <span style="color: red">
                                            {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Gender
                                                </label>
                                                <div class="dropdown">
                                                    <div class="select">
                                                        <span>{{ $jobseeker->gender }}</span>
                                                        <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="gender" id=gender_input value="{{ $jobseeker->gender }}">
                                                    <ul class="dropdown-menu">
                                                        <li onclick="all_gender_to_input('male')">male</li>
                                                        <li onclick="all_gender_to_input('female')">female</li>
                                                    </ul>
                                                    <script>
                                                        function all_gender_to_input(value){
                                                            document.getElementById('gender_input').value = value;
                                                        }
                                                    </script>

                                                </div>

                                                <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                        </div>

                                        <div class=" col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row ">
                                                <label class="padding-item">
                                                    Upload CV
                                                </label>
                                                <div class="row">
                                                    <div class="padding-item col-lg-8 col-md-7 col-sm-8 col-12">
                                                        <div style="margin: 0" class="input-row">
                                                            <input type="text" @if(!$jobseeker->cv)placeholder="Upload CV"@endif disabled>
                                                            <input name="cv" type="file" id="upload" placeholder="" hidden value="{{ $jobseeker->cv }}">
                                                            <label class="upload" for="upload">
                                                                Browse File
                                                            </label>
                                                            <img src="{{asset('assets/icon/pass.svg')}}">
                                                            <div id="file-upload-filename">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @error('cv')
                                                    <span style="color: #ff0000">{{ $message }}</span>
                                                    @enderror
                                                    <div class="padding-item col-lg-4 col-md-5 col-sm-4 col-12">
                                                        <a class="remove-btn" href="{{ route('delete_cv') }}">
                                                            Remove CV
                                                        </a>

                                                    </div>
                                                    @if($jobseeker->cv)
                                                        <a href="{{ Storage::url($jobseeker->cv) }}" style="padding: 10px 0 0 10px; color: blue" >
                                                            Uploaded CV
                                                        </a>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>


                                        <div class="padding-item col-lg-12">
                                            <button class="apply-btn">
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="login Register-btn" href="{{ route('jobseeker_change_password') }}">
                        Change Password
                    </a>
                </div>
            </div>

        </div>

    </div>

@endsection
@section('optional_footer')
    <script>

        document.getElementById('imageUpload').addEventListener('change', upload_file, false);

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

                        const token =  "{{ csrf_token() }}";

                        form.append("_token" , token);

                        form.append(evt.target.name, theFile);

                        console.log(form.get('_token'));

                        var settings = {
                            "async": true,
                            "crossDomain": true,
                            "url": "{{ route('jobseeker_avatar') }}",
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

        // ------------------------
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });

/*
        $(".register-row input").blur(function () {
            var inputVal = $(this).val();
            if (inputVal == '') {
                $(this).parent().addClass("active")
                $(this).addClass("active")
            } else {
                $(this).parent().removeClass("active")
                $(this).removeClass("active")

            }
        });*/
        var input = document.getElementById('upload');
        var infoArea = document.getElementById('file-upload-filename');

        input.addEventListener('change', showFileName);

        function showFileName(event) {

            // the change event gives us the input it occurred in
            var input = event.srcElement;

            // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
            var fileName = input.files[0].name;

            // use fileName however fits your app best, i.e. add it into a div
            infoArea.textContent = fileName;
        }

        $('.remove-btn').click(function () {
            infoArea.textContent = "";
        });
        /*Dropdown Menu*/
        // $('.dropdown').click(function () {
        //     $(this).attr('tabindex', 1).focus();
        //     $(this).toggleClass('active');
        //     if ($(this).hasClass('active')) {
        //         $(this).find('.dropdown-menu').slideToggle(300);
        //     } else {
        //         $(this).find('.dropdown-menu').hide(20);
        //     }
        // });
        // $('.dropdown').focusout(function () {
        //     $(this).removeClass('active');
        //     $(this).find('.dropdown-menu').hide(20);
        // });

        // $('.dropdown .dropdown-menu li').click(function () {
        //     $(this).parents('.dropdown').find('span').text($(this).text());
        //     $(this).parents('.dropdown').find('span').css("color", "#323232")
        //     $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
        // });



    </script>
    <script>

        var avatarPicture = [];
        var avatarIndex = -1;


        $(function () {
            $("#sortableImgThumbnailPreview").sortable({
                connectWith: ".RearangeBox",


                start: function (event, ui) {
                    $(ui.item).addClass("dragElemThumbnail");
                    ui.placeholder.height(ui.item.height());

                },
                stop: function (event, ui) {
                    $(ui.item).removeClass("dragElemThumbnail");
                }
            });
            $("#sortableImgThumbnailPreview-code").sortable({
                connectWith: ".RearangeBox",


                start: function (event, ui) {
                    $(ui.item).addClass("dragElemThumbnail");
                    ui.placeholder.height(ui.item.height());

                },
                stop: function (event, ui) {
                    $(ui.item).removeClass("dragElemThumbnail");
                }
            });

            $("#sortableImgThumbnailPreview-code").disableSelection();
        });

       /* document.getElementById('imageUpload').addEventListener('change', handleFileSelect_avatar, false);

        function handleFileSelect_avatar(evt) {

            var files = evt.target.files;
            for (var i = 0, f; f = files[i]; i++) {

                if (!f.type.match('image.*')) {
                    continue;
                }

                var reader = new FileReader();
                UploadStep2Profileavatar("avatar", files[0]);

                reader.readAsDataURL(f);
            }
        }

        function handleFileSelectcode(evt) {

            var files = evt.target.files;

            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    continue;
                }
                var reader = new FileReader();
                reader.readAsDataURL(f);
            }
        }

        function UploadStep2Profileavatar(typeOfpic, input) {

            // var _token = $("input[name='_token']").val();
            var typeofUpload; // 0 = meli code Picture , 1 = first page picture

            // console.log(_token);

            var data = new FormData();
            var formdataLength = 0;
            var form = new FormData();
            // form.append("_token", _token);
            var settings;


            for (var pair of data.entries()) {
                console.log(pair[0] + ":" + pair[1]);
            }

            form.append('avatarPicture', input);

            settings = {
                "async": true,
                "crossDomain": true,
                "url": "{{ route('jobseeker_avatar') }}",
                "method": "POST",
                "headers": {
                    "cache-control": "no-cache",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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

        }

*/
    </script>

@endsection
