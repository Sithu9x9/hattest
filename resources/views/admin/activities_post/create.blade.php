@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<!-- <h3 class="page-title">@lang('global.po_contract.title')</h3> -->
{!! Form::open(['method' => 'POST', 'route' => ['admin.act-post.store'],'id'=>'CreateForm','files' => 'true']) !!}
<div class="box box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">{{ __('admin.das.create') }}</h3>
        <div class="box-tools pull-right">
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 form-group">
                <div class="col-xs-12 form-group">
                    {!! Form::hidden('activities_id', $act_id) !!}
                    <div id="fine-uploader-manual-trigger"></div>
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title *', ['class' => 'control-label']) !!}
                    <p class="danger" id="title_error"></p>
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}

                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('des', 'Description ', ['class' => 'control-label']) !!}
                    <p class="danger" id="des_error"></p>
                    {!! Form::textarea('des', old('des'), ['class' => 'form-control', 'placeholder' => '']) !!}

                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::button(' <i class="fa fa-save"></i> '.trans('global.app_save'), ['type'=>'button','class' => 'btn btn-success','id' => 'trigger-upload']) !!}
                    <a class="btn btn-flat btn-danger " href="{{ URL::previous() }}"><i class="fa fa-reply-all"></i> {{__('admin.button.cancel')}}</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('javascript')
<script>
    $(document).ready(function() {

        var APP_URL = {!!json_encode(url('/')) !!};

        $('#fine-uploader-manual-trigger').fineUploader({
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: "{{route('upload-files')}}",
                customHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                inputName: 'images'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: ''+APP_URL+'/admin/plugin/fine-uploader/placeholders/waiting-generic.png',
                    notAvailablePath: ''+APP_URL+'/admin/plugin/fine-uploader/placeholders/not_available-generic.png'
                }
            },
            validation: {
                // acceptFiles: ['image/*','application/xls','application/pdf', 'text/csv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.template','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-excel'] , 
                allowedExtensions: ['jpeg', 'jpg', 'png', 'webp'],
                // sizeLimit: 1024*1024*2.5, // 2.5MB
                stopOnFirstInvalidFile: false
            },            
            callbacks: {
                onAllComplete: function() {
                    $("form#CreateForm").submit();
                },
                onError: function() {
                    $(".se-pre-con").hide();
                }
            },
            autoUpload: false
        })

        $('#trigger-upload').click(function() {
            $(".se-pre-con").show();
            var title = $("form#CreateForm input[name=title]").val();
            var des = $("form#CreateForm textarea[name=des]").val();


            if (title == '') {
                $("#title_error").append('Activities Post Title is required!');
                $(".se-pre-con").hide();
                return false;
            } else {
                $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
            }

        })

    });
</script>
@endsection