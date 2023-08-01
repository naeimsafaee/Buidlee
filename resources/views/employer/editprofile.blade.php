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
                                        <label for="imageUpload" class="inner-image-box">
                                            <img id="profile_image" src="{{asset('assets/icon/cloud.svg')}}">
                                        </label>
                                    </div>

                                </div>
                                <labal class="inner-image-box flex-box">
                                    <div id="imagePreview" style=";"></div>
                                </labal>
                            </div>

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
                                                form.append("_token", "{{ csrf_token() }}");

                                                form.append(evt.target.name, theFile);

                                                console.log("a" + evt.target.name);

                                                var settings = {
                                                    "async": true,
                                                    "crossDomain": true,
                                                    "url": "{{ route('employer_avatar') }}",
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

                            <div class="content">
                                <h4>
                                    {{ $employer->name }}
                                </h4>
                                <div class="username">
                                    {{ "@" . $employer->company_id }}
                                </div>
                                {{--    <a class="edit flex-box">
                                        Edit Profile
                                        <img src="{{asset('assets/icon/edit.svg')}}">
                                    </a>--}}

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row  form-box inner-container">

                        <div class="col-lg-12">
                            <div class="item">
                                <form method="post" action="{{ route('employer_edit_profile') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Company name
                                                </label>
                                                <input type="text" placeholder="Company name" name="company_name"
                                                       value="{{ $employer->company_name }}">
                                                <img src="{{asset('assets/icon/company-name.svg')}}">
                                                <p class="red" style="color: white">
                                                    Required!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    CEO
                                                </label>
                                                <input type="text" placeholder="CEO" name="ceo"
                                                       value="{{ $employer->ceo }}">
                                                <img src="{{asset('assets/icon/user-name.svg')}}">
                                               <p class="red" style="color: white">
                                                    Required!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Email
                                                </label>
                                                <input type="text" placeholder="Email" name="email"
                                                       value="{{ $employer->email }}">
                                                <img src="{{asset('assets/icon/calender.svg')}}">
                                               <p class="red" style="color: white">
                                                    Required!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Company size
                                                </label>
                                                <div class="dropdown">
                                                    <div class="select">
                                                        @if($employer->company_size)
                                                            <span style="color: #323232">
                                                                {{ $employer->size->name }}
                                                            </span>

                                                        @else
                                                            <span>Company size </span>
                                                        @endif

                                                            <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="input_of_company_size" name="company_size" value="{{ $employer->company_size }}">
                                                    <ul class="dropdown-menu">
                                                        @foreach($sizes as $size)
                                                        <li onclick="set_company_size_to_input({{ $size->id }})">{{ $size->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>

                                                <script>
                                                        function set_company_size_to_input(id) {
                                                            document.getElementById('input_of_company_size').value = id;
                                                        }
                                                </script>

                                               <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Website
                                                </label>
                                                <input type="text" placeholder="Website " name="website"
                                                       value="{{ $employer->website }}">
                                                <img src="{{asset('assets/icon/website2.svg')}}">
                                               <p class="red" style="color: white">
                                                    Required!
                                                </p>
                                            </div>
                                        </div>

                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Location
                                                </label>
                                                <div class="dropdown">
                                                    <div class="select">
                                                        @if($employer->location)
                                                            <span style="color: #323232">
                                                            {{ $employer->location_name->name }}
                                                            </span>

                                                        @else
                                                            <span>Location</span>
                                                        @endif
                                                            <div class="dropdown-arrow">
                                                            <img src="{{asset('assets/icon/fill-arrow.svg')}}">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="location_input" name="location" value="{{ $employer->location }}">
                                                    <ul class="dropdown-menu">
                                                        @foreach($locations as $location)
                                                        <li onclick="add_location_to_input({{ $location->id }})">{{ $location->name }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <script>
                                                    function add_location_to_input(id){
                                                        document.getElementById("location_input").value =id;
                                                    }
                                                </script>
                                               <p class="red" style="color: white">
                                                    Job title is required.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="padding-item col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Social
                                                </label>
                                                <input type="text" placeholder="Social" name="social"
                                                       value="{{ $employer->social }}">
                                                <img src="{{asset('assets/icon/social2.svg')}}">
                                               <p class="red" style="color: white">
                                                    Required!
                                                </p>
                                            </div>
                                        </div>

                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    Address
                                                </label>
                                                <textarea placeholder="Address "
                                                          name="address"> {{ $employer->address }}</textarea>
                                                <img class="textarea-img" src="{{asset('assets/icon/address.svg')}}">

                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="input-row register-row">
                                                <label>
                                                    About Company
                                                </label>
                                                <textarea placeholder="About Company"
                                                          name="about">{{ $employer->about }}</textarea>
                                                <img class="textarea-img" src="{{asset('assets/icon/details.svg')}}">

                                            </div>
                                        </div>
                                        <div class="padding-item col-lg-12">
                                            <button class="apply-btn">
                                                Submit
                                            </button>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <a class="login Register-btn" href="{{ route('employer_change_password') }}">
                        Change Password
                    </a>
                </div>
            </div>

        </div>

    </div>

@endsection
@section('optional_footer')
    <script>
 /*       $(".register-row input").blur(function () {
            var inputVal = $(this).val();
            if (inputVal == '') {
                $(this).parent().addClass("active")
                $(this).addClass("active")
            } else {
                $(this).parent().removeClass("active")
                $(this).removeClass("active")

            }
        });*/
        const inpt = document.querySelector('#todo');
        const ul = document.querySelector('.tag-row');

        //const deleteLi = document.querySelector('.remove');
        const btn = document.querySelector('.black-btn');

        btn.addEventListener('click', liGenerate);
        // document.addEventListener('click', liDelete);

        function liGenerate(e) {
            const li = document.createElement('input');
            const a = document.createElement('a');

            if(inpt.value !== "") {
                li.type = 'hidden';
                li.name = "skills[]";
                //const liContent = document.createTextNode(`${inpt.value}`);
                li.value = inpt.value;

                a.className = "date-details";
                a.innerHTML = inpt.value;

                //li.appendChild(liContent);
                ul.appendChild(li);
                ul.appendChild(a);

                inpt.value = "";
            }
            e.preventDefault();
        }

        // function liDelete(e) {
        //     if(e.target.className === 'date-details') {
        //         e.target.parentElement.remove();
        //     }
        // }


    </script>

@endsection
