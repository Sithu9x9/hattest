@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<div class="box box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Slider List</h3>
        <div class="box-tools pull-right">
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">        
        <p class="pull-right">
            <button type="button" class="btn btn-flat btn-success" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus" aria-hidden="true"></i> @lang('global.app_add_new') Slider
            </button>
        </p>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped {{ count($sliders) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>{{ __('admin.alt') }}</th>
                            <th>{{ __('admin.image') }}</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($sliders) > 0)
                        @foreach ($sliders as $key=>$slider)
                        <tr data-entry-id="{{ $slider->id }}" class="tr">
                            <input type="hidden" name="all_alt" value="{{ $slider->alt }}">
                            <td>{{$key+1}}</td>
                            <td style="text-align:left;" class="alt"></td>
                            <td><img src="{{ url($slider->image) }}" width="50px" alt=""></td>                            
                            <td>
                            <a data-toggle="modal" data-target="#editModal{{$slider->id}}" class="btn btn-flat btn-xs btn-info"><i class="fa fa-edit"></i>&nbsp; @lang('global.app_edit') &nbsp;</a>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                'route' => ['admin.slider.destroy', $slider->id],'id' => 'delete')) !!}
                                {!! Form::button('<i class="fa fa-trash"></i> '.trans('global.app_delete'), array('type'=>'submit','class' => 'btn btn-xs btn-danger btn-flat')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="box box-primary">
            <!--.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">@lang('global.app_create') Slider</h3>
                <div class="box-tools pull-right">
                    <button type="button" data-dismiss="modal" class="btn btn-flat btn-box-tool"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'addForm','method' => 'POST','files' => true]) !!}
                        <div class="col-xs-12 form-group">
                            {!! Form::label('alt', 'Overlay Text*', ['class' => 'control-label']) !!}
                                <div id="summernote"></div>
                                {!! Form::hidden('alt') !!}                                
                        </div>
                        <div class="col-xs-12 danger" id="alt_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('image', 'Image*', ['class' => 'control-label']) !!}
                            {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-12 form-group">
                            {!! Form::button(' <i class="fa fa-save"></i> '.trans('global.app_save'), ['type'=>'submit','class' => 'btn btn-success']) !!}
                            <a class="btn btn-flat btn-danger " href="{{ route('admin.slider.index') }}"><i class="fa fa-reply-all"></i> Cancel</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
@foreach ($sliders as $key=>$slider)
<div class="modal fade editModal" id="editModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="box box-primary">
            <!--.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">@lang('global.app_edit') Slider</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-flat btn-box-tool" data-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'editForm']) !!}
                        <div class="col-xs-12 form-group">
                            {!! Form::label('alt', 'Overlay Text*', ['class' => 'control-label']) !!}
                            <div id="edit_summernote"></div>
                            {!! Form::hidden('edit_alt',$slider->alt) !!}
                            {!! Form::hidden('sliders_id', $slider->id) !!}                            
                        </div>                        
                        <div class="col-xs-12 danger" id="edit_alt_edit_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('image', 'Image*', ['class' => 'control-label']) !!}
                            {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
                            {!! Form::hidden('oldphoto',$slider->image) !!}
                        </div>
                        <div class="col-xs-12 form-group">
                                {!! Form::button(' <i class="fa fa-save"></i> '.trans('global.app_update'), ['type'=>'submit','class' => 'btn btn-success']) !!}
                                <a class="btn btn-flat btn-danger " href="{{ route('admin.slider.index') }}"><i class="fa fa-reply-all"></i> Cancel</a>
                                {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endforeach
@endsection
@section('javascript')
<script>
    $(".tr").each(function(){
        var alt_data = $(this).find('input[name=all_alt]').val();
        $(this).find('.alt').html(alt_data);
    })
    
    $('#summernote').summernote({
            tabDisable: true,
            placeholder: 'Type Something here...',
            tabsize: 2,
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],     
                ['fontsize', ['fontsize']],
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
        
        $(".editModal").each(function(){
            $(this).find('#edit_summernote').summernote({
            tabDisable: true,
            placeholder: 'Type Something here...',
            tabsize: 2,
            height: 150,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],           
                ['fontsize', ['fontsize']],
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

        var edit_alt = $(this).find("input[name=edit_alt]").val();
        $(this).find('#edit_summernote').summernote('code', edit_alt);
        })

    jQuery('form#addForm').on('submit', function(e) {
            $(".se-pre-con").show();
            var alt = $("#summernote").summernote('code');
            $("input[name=alt]").val(alt);
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
                url: "{{ route('admin.slider.store') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.success) {
                        $('form#addForm').trigger("reset");
                        $('#addModal').modal('hide');
                        location.reload();
                    } else if (data.errors) {
                        $(".se-pre-con").hide();
                        error = data.errors;
                        $.each(error, function(k, v) {
                            $('#' + k + "_error").append("<p id='msg'>" + v + "</p>");
                        });
                    }
                },
                error: function(response) {
                    console.log(response);
                    $(".se-pre-con").hide();
                },
            });
        });

        jQuery('form#editForm').on('submit', function(e) {
            $(".se-pre-con").show();
            var edit_alt = $(this).find("#edit_summernote").summernote('code'); 
            $("input[name=edit_alt]").val(edit_alt);
            $("p").remove("#msg");
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: "{{ route('admin.slider.update') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.success) {
                        $('form#editForm').trigger("reset");
                        $('#editModal').modal('hide');
                        location.reload();
                    } else if (data.errors) {
                        $(".se-pre-con").hide();
                        error = data.errors;                        
                        $.each(error, function(k, v) {                       
                            $('form#editForm').find("#"+ k +"_edit_error").append("<p id='msg'>" + v + "</p>");  
                        });
                    }
                },
                error: function(response) {
                    console.log(response);
                    $(".se-pre-con").hide();
                },
            });
        });
</script>
@endsection