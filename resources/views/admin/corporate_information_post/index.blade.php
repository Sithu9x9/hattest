@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<div class="box box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.corporate.index') }}">Corporate Information List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$corporate->title}} List</li>
                </ol>
            </nav>
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <p class="pull-right">
            <a class="btn btn-flat btn-success" href="{{route('admin.corporate-post.create',$corporate->id)}}">
                <i class="fa fa-plus" aria-hidden="true"></i> @lang('global.app_add_new') Post
            </a>
        </p>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped {{ count($corporate_posts) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>{{ __('admin.title') }}</th>
                            <th>{{ __('admin.created_by') }}</th>
                            <th>{{ __('admin.updated_by') }}</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($corporate_posts) > 0)
                        @foreach ($corporate_posts as $key=>$corporate_post)
                        <tr data-entry-id="{{ $corporate_post->id }}">
                            <td>{{$key+1}}</td>
                            <td style="text-align:left;">{{ $corporate_post->title }}</td>                            
                            <td>{{ $corporate_post->created_by }}</td>
                            <td>{{ $corporate_post->updated_by}}</td>
                            <td>
                                <a href="{{route('admin.corporate-post.edit',[$corporate->id,$corporate_post->id])}}" class="btn btn-flat btn-xs btn-info"><i class="fa fa-edit"></i>&nbsp; @lang('global.app_edit') &nbsp;</a>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                'route' => ['admin.corporate-post.destroy', $corporate_post->id],'id' => 'delete')) !!}
                                {!! Form::button('<i class="fa fa-trash"></i> '.trans('global.app_delete'), array('type'=>'submit','class' => 'btn btn-xs btn-danger btn-flat')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script>

</script>
@endsection