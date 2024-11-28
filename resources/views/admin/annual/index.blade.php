@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<div class="box box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Annual Report List</h3>
        <div class="box-tools pull-right">
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <p class="pull-right">
            <button type="button" class="btn btn-flat btn-success" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus" aria-hidden="true"></i> @lang('global.app_add_new') Report
            </button>
        </p>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped {{ count($annuals) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>{{ __('admin.title') }}</th>
                            <th>Year</th>
                            <th>{{ __('admin.created_by') }}</th>
                            <th>{{ __('admin.updated_by') }}</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($annuals) > 0)
                        @foreach ($annuals as $key=>$annual)
                        <tr data-entry-id="{{ $annual->id }}">
                            <td>{{$key+1}}</td>
                            <td style="text-align:left;">{{ $annual->title }}</td>
                            <td>{{ $annual->des }}</td>
                            <td>{{ $annual->created_by }}</td>
                            <td>{{ $annual->updated_by}}</td>
                            <td>
                                <a data-toggle="modal" data-target="#editModal{{$annual->id}}" class="btn btn-flat btn-xs btn-info"><i class="fa fa-edit"></i>&nbsp; @lang('global.app_edit') &nbsp;</a>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                'route' => ['admin.annual.destroy', $annual->id],'id' => 'delete')) !!}
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
                <h3 class="box-title">@lang('global.app_create') Reports</h3>
                <div class="box-tools pull-right">
                    <button type="button" data-dismiss="modal" class="btn btn-flat btn-box-tool"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'addForm','method' => 'POST','enctype' => 'multipart/form-data']) !!}
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title', 'Annual Report Title*', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control','autofocus'=>'autofocus']) !!}
                        </div>
                        <div class="col-xs-12 danger" id="title_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('des', 'Annual Report Year*', ['class' => 'control-label']) !!}
                            {!! Form::text('des', old('des'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-12 danger" id="des_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('file', 'File*', ['class' => 'control-label']) !!}
                            {!! Form::file('file', old('file'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-12 danger" id="file_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::button(' <i class="fa fa-save"></i> '.trans('global.app_save'), ['type'=>'submit','class' => 'btn btn-success']) !!}
                            <a class="btn btn-flat btn-danger " href="{{ URL::previous() }}"><i class="fa fa-reply-all"></i> Cancel</a>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
@foreach ($annuals as $key=>$annual)
<div class="modal fade" id="editModal{{$annual->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="box   box-primary">
            <!--.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">@lang('global.app_edit') Reports</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-flat btn-box-tool" data-dismiss="modal"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'editForm','method' => 'POST','enctype' => 'multipart/form-data']) !!}
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title', 'Annual Report Title*', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title',$annual->title), ['class' => 'form-control']) !!}
                            {!! Form::hidden('annual_id', $annual->id) !!}
                        </div>
                        <div class="col-xs-12 danger" id="title_edit_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('des', 'Annual Report Year*', ['class' => 'control-label']) !!}
                            {!! Form::text('des', old('des',$annual->des), ['class' => 'form-control']) !!}                          
                        </div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('file', 'File*', ['class' => 'control-label']) !!}
                            {!! Form::file('file', old('file'), ['class' => 'form-control']) !!}
                            {!! Form::hidden('old_file', $annual->file) !!}
                        </div>
                        <div class="col-xs-12 danger" id="file_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::button(' <i class="fa fa-save"></i> '.trans('global.app_update'), ['type'=>'submit','class' => 'btn btn-success']) !!}
                            <a class="btn btn-flat btn-danger " href="{{ URL::previous() }}"><i class="fa fa-reply-all"></i> Cancel</a>
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
    jQuery('form#addForm').on('submit', function(e) {
        $(".se-pre-con").show();
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
            url: "{{ route('admin.annual.store') }}",
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
            url: "{{ route('admin.annual.update') }}",
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
                        $('form#editForm').find("#" + k + "_edit_error").append("<p id='msg'>" + v + "</p>");
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