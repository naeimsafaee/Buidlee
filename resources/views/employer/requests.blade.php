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
            <div class="row ">

                <div class="row form-box inner-container">
                    <div class="col-lg-12 ">
                        <h1 id="title" class="title">
                            Requests
                        </h1>
                    </div>
                    @if(count($employer->requests) > 0)
                        <div class="col-lg-12">
                            <h5 class="job-details">
                                Job Seeker
                            </h5>
                        </div>
                        @each('components.employer_requests' , $employer->requests , 'request')
                    @else
                        <div class="col-lg-12">
                            <h5 class="job-details" style="text-align: center">
                                No Request Found
                            </h5>
                        </div>
                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection

@section('modal')

    <div class="modal fade modal-p-bottom" id="reject-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body py-5">
                    <div class="input-row register-row">
                        <label>
                            The reason for rejection
                        </label>
                        <textarea id="reject_text" placeholder="The reason for rejection "></textarea>
                        <img class="textarea-img" src="{{asset('assets/icon/details.svg')}}">

                    </div>

                    <div class="button-row">
                        <a class="submit" onclick="send_reject()">
                            Submit
                        </a>
                        <a data-bs-dismiss="modal" class="cancel">
                            Cancel
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal  fade modal-p-bottom" id="accept-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body py-5">
                    <h1>
                        Accept
                    </h1>
                    <p>
                        {{ setting('site.accept') }}
                    </p>

                    <div class="button-row">
                        <a class="submit " onclick="send_accept()">
                            Accept
                        </a>
                        <a data-bs-dismiss="modal" class="cancel">
                            Cancel
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection

@section('optional_footer')
    <script>

        var data_id;

        function send_reject() {

            const text = document.getElementById('reject_text').value;

            $.ajax(
                {
                    "url": "{{ route('employer_requests') }}",
                    "method": "POST",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                        "description": text,
                        "request_id": data_id,
                        "is_accept": '0',
                    }
                }
            ).done(function (response) {
                console.log(response);
                // location.reload();
            });


        }

        function send_accept() {

            $.ajax(
                {
                    "url": "{{ route('employer_requests') }}",
                    "method": "POST",
                    "data": {
                        "_token": "{{ csrf_token() }}",
                        "request_id": data_id,
                        "is_accept": '1',
                    }
                }
            ).done(function (response) {
                console.log(response);
                // location.reload();
            });


        }


        $(document).ready(function () {
            $(".dropdown .dropdown-menu li:first-child").click(function () {
                var acsitems = $(this)
                $('#accept-modal').modal('show');
                data_id = $(this).attr('data-id');

                $("#accept-modal .submit").click(function () {
                    $('#accept-modal').modal('hide');
                    acsitems.parent().parent().replaceWith(" <a class=\"download upload-image\">\n" +
                        "                                                    Accept\n" +
                        "                                                </a>");
                });

            });
        });

        $(document).ready(function () {
            $(".dropdown .dropdown-menu li:last-child").click(function () {
                var rejitems = $(this)
                $('#reject-modal').modal('show');
                data_id = $(this).attr('data-id');

                $("#reject-modal .submit").click(function () {
                    $('#reject-modal').modal('hide');
                    rejitems.parent().parent().replaceWith("  <a class=\"download Reset\">\n" +
                        "                                                    Reject\n" +
                        "                                                </a>");
                });

            });
        });

        /*Dropdown Menu*/
        $('.dropdown').click(function () {
            $(this).attr('tabindex', 1).focus();
            // $(this).toggleClass('active');
            if ($(this).hasClass('active')) {
                $(this).find('.dropdown-menu').slideToggle(300);
            } else {
                $(this).find('.dropdown-menu').hide(20);
            }
        });
        $('.dropdown').focusout(function () {
            $(this).removeClass('active');
            $(this).find('.dropdown-menu').hide(20);
        });

        // $('.dropdown .dropdown-menu li').click(function () {
        //     $(this).parents('.dropdown').find('span').text($(this).text());
        //     $(this).parents('.dropdown').find('span').css("color" , "#323232")
        //     $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
        // });
    </script>

@endsection
