@extends('layouts.app')
@inject('request', 'Illuminate\Http\Request')
@section('content')
<section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-lg-8 px-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238.65698182177806!2d96.12967473156543!3d16.850562937139728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194c7e664d301%3A0x34ad801102e1df6e!2sMTI!5e0!3m2!1sen!2smm!4v1634185649574!5m2!1sen!2smm" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-4 col-lg-4 p-3 py-5 pl-lg-5 ftco-animate heading-section heading-section-white bg-dark">
                <span class="subheading text-white">Contact Us</span>
                <h2 class="mb-4 text-white">Send Email and Let's join us!</h2>
                    <div class="alert alert-success alert-dismissible text-center recaptcha-success d-none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    Success! Your message has been sent.
                  </div>
                  <div class="alert alert-danger alert-dismissible text-center recaptcha-error  d-none">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    <span id="message">Please Check Recaptcha!</span>
                  </div>
            <form action="{{route('send.email')}}" method="post" class="appointment recaptchaForm">
                {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <!-- <div class="icon"><span class="fa fa-calendar"></span></div> -->
                                    <input type="email" name="email" class="form-control" placeholder="Enter your Email" required>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="fa fa-clock-o"></span></div>
                                    <input type="text" class="form-control appointment_time" placeholder="Time">
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="msg" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="g-recaptcha" data-sitekey="6Le6UPYfAAAAAHmE1fasfIwBfMl50EzOFFXCtRu6"></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-brown py-3 px-4"><i class="fa fa-spinner fa-spin d-none"></i> Send message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop
@section('javascript')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    window._token = '{{ csrf_token() }}';

    $('.recaptchaForm').on('submit',function(e){
        $(this).find('button[type=submit] .fa-spinner').removeClass('d-none');
        $(this).find('button[type=submit]').attr('disabled',true).css('cursor','not-allowed');
        var _this = $(this);
        var recaptcha = $("#g-recaptcha-response").val();
        e.preventDefault();
        if(recaptcha === "")
        {
            $(".recaptcha-error").removeClass('d-none');
        }

        var formData = new FormData(this);
        formData.append('secret', "6Le6UPYfAAAAAEtu8fwvvgwkABCVa1R4WaeNQ-Hv");
        formData.append('response', recaptcha);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                _this.find('button[type=submit] .fa-spinner').addClass('d-none');
                _this.find('button[type=submit]').attr('disabled',false).css('cursor','pointer');

                if(response.error)
                {
                    $(".recaptcha-error #message").text(response.error);
                    $(".recaptcha-error").removeClass('d-none');
                }

                if(response.success)
                {
                    $(".recaptcha-error").addClass('d-none');
                    $(".recaptcha-success").removeClass('d-none');
                }
            },
            error: function(data) {
                _this.find('button[type=submit] .fa-spinner').addClass('d-none');
                _this.find('button[type=submit]').attr('disabled',false).css('cursor','pointer');

                let errors = data.responseJSON.errors;
                if (errors) {
                    let firstErrorMsg = errors[Object.keys(errors)[0]][0];

                    $(".recaptcha-error #message").text(firstErrorMsg);
                    $(".recaptcha-error").removeClass('d-none');
                }else{
                    $(".recaptcha-error #message").text('Email Sent Failed!');
                    $(".recaptcha-error").removeClass('d-none');
                }
            }
        });
    })
</script>
@endsection
