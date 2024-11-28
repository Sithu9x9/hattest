@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<div class="box box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Activities List</h3>
        <div class="box-tools pull-right">
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">        
        <p class="pull-right">
            <button type="button" class="btn btn-flat btn-success" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus" aria-hidden="true"></i> @lang('global.app_add_new') Activites
            </button>
        </p>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped {{ count($acts) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>{{ __('admin.title') }}</th>
                            <th>{{ __('admin.created_by') }}</th>
                            <th>{{ __('admin.updated_by') }}</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($acts) > 0)
                        @foreach ($acts as $key=>$act)
                        <tr data-entry-id="{{ $act->id }}">
                            <td>{{$key+1}}</td>
                            <td style="text-align:left;">{{ $act->title }}</td>
                            <td>{{ $act->created_by }}</td>
                            <td>{{ $act->updated_by}}</td>
                            <td>
                                <a href="{{route('admin.act-post.index',$act->id)}}" class="btn btn-flat btn-xs btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Posts</a>
                            </td>
                            <td>
                            <a data-toggle="modal" data-target="#editModal{{$act->id}}" class="btn btn-flat btn-xs btn-info"><i class="fa fa-edit"></i>&nbsp; @lang('global.app_edit') &nbsp;</a>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                'route' => ['admin.act.destroy', $act->id],'id' => 'delete')) !!}
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
                <h3 class="box-title">@lang('global.app_create') Activites</h3>
                <div class="box-tools pull-right">
                    <button type="button" data-dismiss="modal" class="btn btn-flat btn-box-tool"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::open(['id'=>'addForm','method' => 'POST']) !!}
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title', 'Activities Title*', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-12 danger" id="title_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('image', 'Image*', ['class' => 'control-label']) !!}
                            {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
                        </div>
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
@foreach ($acts as $key=>$act)
<div class="modal fade" id="editModal{{$act->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="box   box-primary">
            <!--.box-header -->
            <div class="box-header with-border">
                <h3 class="box-title">@lang('global.app_edit') Activites</h3>
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
                            {!! Form::label('title', 'Activites Title*', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title',$act->title), ['class' => 'form-control']) !!}
                            {!! Form::hidden('activities_id', $act->id) !!}
                        </div>
                        <div class="col-xs-12 danger" id="title_edit_error"></div>
                        <div class="col-xs-12 form-group">
                            {!! Form::label('image', 'Image*', ['class' => 'control-label']) !!}
                            {!! Form::file('image', old('image'), ['class' => 'form-control']) !!}
                            {!! Form::hidden('oldphoto',$act->image) !!}
                        </div>
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
                url: "{{ route('admin.act.store') }}",
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
                url: "{{ route('admin.act.update') }}",
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