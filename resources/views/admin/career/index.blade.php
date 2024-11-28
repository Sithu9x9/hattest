@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<div class="box box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Career</h3>
        <div class="box-tools pull-right">
        </div>
    </div>    
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-xs-12">
        <p class="pull-right">
            <a href="{{ route('admin.career.create') }}" class="btn btn-flat btn-flat btn-success"><i class="fa fa-plus" aria-hidden="true"></i> @lang('global.app_add_new') Career</a>
        </p>
        </div>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-striped  {{ count($careers) > 0 ? 'datatable' : '' }}">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>{{ __('admin.position') }}</th>
                            <th>{{ __('admin.explvl') }}</th>
                            <th>{{ __('admin.post') }}</th>
                            <th>{{ __('admin.salary') }}</th>
                            <th>{{ __('admin.jt') }}</th>
                            <th>{{ __('admin.created_by') }}</th>
                            <th>{{ __('admin.updated_by') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($careers) > 0)
                        @foreach($careers as $key => $career)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$career->position}}</td>
                                <td>{{$career->explvl}}</td>
                                <td>{{$career->post}}</td>
                                <td>{{$career->salary}}</td>
                                <td>{{$career->jt}}</td>
                                <td>{{$career->created_by}}</td>
                                <td>{{$career->updated_by}}</td>
                                <td>
                                <a href="{{ route('admin.career.show',[$career->id]) }}" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-edit"></i> @lang('admin.detail')</a>
                                <a href="{{ route('admin.career.edit',[$career->id]) }}" class="btn btn-flat btn-xs btn-info"><i class="fa fa-edit"></i> @lang('admin.edit')</a>
                                {!! Form::open(array(
                                'style' => 'display: inline-block;',
                                'method' => 'DELETE',
                                'onsubmit' => "return confirm('".trans("admin.are_you_sure")."');",
                                'route' => ['admin.career.destroy', $career->id],'id' => 'delete')) !!}
                                {!! Form::button('<i class="fa fa-trash"></i> '.trans('admin.delete'), array('type'=>'submit','class' => 'btn btn-xs btn-danger btn-flat')) !!}
                                {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9">@lang('admin.no_entries_in_table')</td>
                        </tr>                        
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection