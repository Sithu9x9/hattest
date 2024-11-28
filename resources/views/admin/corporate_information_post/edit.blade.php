@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<!-- <h3 class="page-title">@lang('global.po_contract.title')</h3> -->
{!! Form::open(['method' => 'PUT', 'route' => ['admin.corporate-post.update',$cor_post->id],'id'=>'EditForm','files' => 'true']) !!}
<div class="box  box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">{{ __('admin.das.edit') }}</h3>
        <div class="box-tools pull-right">
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-xs-12 form-group">
            @if($cor_post_images)
                <div class="form-group col-xs-12">
                    <a href="{{route('admin.corporate.allimage.destroy',$cor_post->id)}}" class="btn btn-danger btn-flat btnalldelete"><i class="fa fa-trash"></i> Delete All Old Images</a>
                </div>
                <div class="col-xs-12 form-group">
                    <div class="box box-primary collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Old Images</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                            </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            @foreach($cor_post_images as $image)
                            <div class="col-xs-4">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="col-xs-8 no-padding">
                                            <img src="{{url($image->image_url)}}" alt="" width="100%" height="120px">
                                        </div>
                                        <div class="col-xs-4 text-center" style="padding:45px">
                                            <a href="{{route('admin.corporate.image.destroy', $image->id)}}" class="btn btn-xs btn-danger btn-flat btndelete"><i class="fa fa-trash" style="font-size: 25px"></i></a>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div>
                            @endforeach
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
                @endif
                <div class="col-xs-12 form-group">
                    {!! Form::hidden('corporate_information_id', $cor_id) !!}
                    <div id="fine-uploader-manual-trigger"></div>
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Title *', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title',$cor_post->title), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="danger">{{ $errors->update->first('title') }}</p>
                </div>
                <div class="col-xs-12 form-group">
                    {!! Form::label('des', 'Description ', ['class' => 'control-label']) !!}
                    {!! Form::textarea('des', old('des',$cor_post->des), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="danger">{{ $errors->update->first('des') }}</p>
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::button(' <i class="fa fa-save"></i> '.__('admin.button.update'), ['type'=>'button','class' => 'btn btn-success','id' => 'trigger-upload']) !!}
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

        $(".btndelete").click(function() {
            if (confirm('Are you sure you want to delete Permanently?')) {
                $(".se-pre-con").show();
            } else {
                return false;
            }
        })

        $(".btnalldelete").click(function() {
            if (confirm('Are you sure you want to delete all images Permanently?')) {
                $(".se-pre-con").show();
            } else {
                return false;
            }
        })

        var APP_URL = {!!json_encode(url('/')) !!};

        $('#fine-uploader-manual-trigger').fineUploader({
            template: 'qq-template-manual-trigger',
            request: {
                endpoint: "{{route('corporate-update-upload-files',$cor_post->id)}}",
                customHeaders: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                inputName: 'images'
            },
            thumbnails: {
                placeholders: {
                    waitingPath: '' + APP_URL + '/admin/plugin/fine-uploader/placeholders/waiting-generic.png',
                    notAvailablePath: '' + APP_URL + '/admin/plugin/fine-uploader/placeholders/not_available-generic.png'
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
                    $("form#EditForm").submit();
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
            }else {
                $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
            }

        })

    });
</script>
@endsection
