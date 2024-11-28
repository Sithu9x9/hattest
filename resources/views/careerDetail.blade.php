@extends('layouts.app')
@section('styles')
    <style>
        .bg-custom {
            background-color: #044462 !important;
            color: white !important;
        }

    </style>
    <link href="{{ asset('summernote-0.8.18-dist/summernote-bs4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <section class="ftco-section pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 heading-section ftco-animate">
                    @if (session('success'))
                        @php
                            $status = session('success');
                        @endphp
                        <div class="alert alert-success alert-dismissible text-center">
                            <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success!</h4>
                            {{ $status }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-6 col-md-2">
                            <p><b>Job Position :</b></p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p>{{ $career->position }}</p>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-6 col-md-2">
                            <p><b>Experienced Level :</b></p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p>{{ $career->explvl }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-2">
                            <p><b>Job Salary :</b></p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p>{{ $career->salary }}</p>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-6 col-md-2">
                            <p><b>Gender Open To :</b></p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p>{{ $career->gender }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-2">
                            <p><b>Post :</b></p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p>{{ $career->post }}</p>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-6 col-md-2">
                            <p><b>Job Type :</b></p>
                        </div>
                        <div class="col-6 col-md-2">
                            <p>{{ $career->jt }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 ftco-animate">
                    <hr style="border: 1px solid #3c8dbc;">
                    <h4 class="text-center"><b>Job Description</b></h4>
                    <br>
                    <input type="hidden" name="jd" value="{{ $career->jd }}">
                    <p id="jd"></p>
                </div>

                <div class="col-sm-12 ftco-animate">
                    <hr style="border: 1px solid #3c8dbc;">
                    <h4 class="text-center"><b>Job Requirement</b></h4>
                    <br>
                    <input type="hidden" name="jr" value="{{ $career->jr }}">
                    <p id="jr"></p>
                </div>

                @if ($career->benefits != null || $career->highlights != null || $career->opportunities != null || strip_tags($career->benefits) != '' || strip_tags($career->highlights) != '' || strip_tags($career->opportunities) != '')
                    <div class="col-sm-12 ftco-animate">
                        <hr style="border: 1px solid #3c8dbc;">
                        <h3 class="text-center"><b>What We Can Offer</b></h3>
                        <br>
                        <div class="row bg-custom">
                            @if (strip_tags($career->benefits) != '')
                            <div class="col-md-4">
                                <h4 class="text-white"><b>Benefits</b></h4>
                                <input type="hidden" name="benefits" value="{{ $career->benefits }}">
                                <p id="benefits"></p>
                            </div>
                            @endif
                            @if (strip_tags($career->highlights) != '')
                            <div class="col-md-4">
                                <h4 class="text-white"><b>Hightlights</b></h4>
                                <input type="hidden" name="highlights" value="{{ $career->highlights }}">
                                <p id="highlights"></p>
                            </div>
                            @endif
                            @if (strip_tags($career->opportunities) != '')
                            <div class="col-md-4">
                                <h4 class="text-white"><b>Career Opportunities</b></h4>
                                <input type="hidden" name="opportunities" value="{{ $career->opportunities }}">
                                <p id="opportunities"></p>
                            </div>
                            @endif
                        </div>
                    </div>
                @endif

                <div class="col-sm-12 form-group ftco-animate" style="margin-top: 30px;">
                    <a class="btn btn-flat btn-danger " href="{{ route('career') }}"><i class="fa fa-reply-all"></i>
                        {{ __('admin.back') }}</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        Apply to Job
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Apply Job Modal -->
    <div class="modal fade" style="background-color: gray;" id="addModal" tabindex="-1" role="dialog"
        aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Apply Job Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(['id' => 'addForm', 'files' => 'true']) !!}
                            <div class="col-md-12 form-group">
                                {!! Form::hidden('id', $career->id) !!}
                                {!! Form::label('email', 'Email *', ['class' => 'control-label']) !!}
                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter your email...']) !!}
                            </div>
                            <div class="col-md-12 text-danger" id="email_error"></div>
                            <div class="col-md-12 form-group">
                                {!! Form::label('cv', 'Attach CV Form *', ['class' => 'control-label']) !!} <br>
                                {!! Form::file('cv', old('cv'), ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-12 text-danger" id="cv_error"></div>
                            <div class="col-md-12 form-group">
                                {!! Form::label('cl', 'Cover Letter *', ['class' => 'control-label']) !!} <br>
                                <div class="text-danger" id="cl_error"></div>
                                <div id="summernote"></div>
                                {!! Form::hidden('cl') !!}
                            </div>

                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                {!! Form::button('Apply', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
    <script src="{{ asset('summernote-0.8.18-dist/summernote-bs4.min.js') }}"></script>
    <script>
        var jd = $("input[name=jd]").val();
        $("#jd").html(jd);

        var jr = $("input[name=jr]").val();
        $("#jr").html(jr);

        var benefits = $("input[name=benefits]").val();
        $("#benefits").html(benefits);

        var highlights = $("input[name=highlights]").val();
        $("#highlights").html(highlights);

        var opportunities = $("input[name=opportunities]").val();
        $("#opportunities").html(opportunities);

        $('#addModal').modal({
            show: false,
            backdrop: false
        });

        $('#summernote').summernote({
            tabDisable: true,
            placeholder: 'Type Something here...',
            tabsize: 2,
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['height', ['height']],
                ['view', ['fullscreen', 'help']],
            ],
            popover: {
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['insert', ['link', 'picture']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
            }
        });

        jQuery('form#addForm').on('submit', function(e) {
            if ($('#summernote').summernote('isEmpty')) {
                $("#cl_error").html("Cover Letter content is required!");
                return false;
            }

            var cl = $("#summernote").summernote('code');
            $("input[name=cl]").val(cl);

            $("p").remove("#msg");
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($('form#addForm')[0]);
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: "{{ route('career.apply') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.success) {
                        $('form#addForm').trigger("reset");
                        $('#addModal').modal('hide');
                        location.reload();
                    } else if (data.errors) {
                        error = data.errors;
                        $.each(error, function(k, v) {
                            $('#' + k + "_error").append("<p id='msg'>" + v + "</p>");
                        });
                    }
                },
                error: function(response) {
                    console.log(response);
                },
            });
        });
    </script>
@endsection
