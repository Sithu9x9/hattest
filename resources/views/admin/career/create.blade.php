@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('content')
<!-- <h3 class="page-title">@lang('global.po_contract.title')</h3> -->
{!! Form::open(['method' => 'POST', 'route' => ['admin.career.store'],'id'=>'CreateForm','files' => 'true']) !!}
<div class="box   box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Create Form</h3>
        <div class="box-tools pull-right">
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">           
            <div class="col-xs-12 form-group">
                <div class="col-xs-12 form-group text-center">
                    <h3><b>General Information</b></h3>                
                    <hr style="border: 1px solid #3c8dbc;">
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('position', 'Job Position *', ['class' => 'control-label']) !!}
                    {!! Form::text('position', old('position'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="danger">{{ $errors->update->first('position') }}</p>
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('explvl', 'Select Experience Level *', ['class' => 'control-label']) !!}
                   <select name="explvl" class="form-control">                       
                       <option value="Experienced Non-Manger">Experienced Non-Manger</option>
                       <option value="Experienced">Experienced</option>
                       <option value="Non-Experienced">Non-Experienced</option>
                   </select>
                    <p class="danger">{{ $errors->update->first('explvl') }}</p>
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('salary', 'Salary *', ['class' => 'control-label']) !!}
                    {!! Form::text('salary', old('salary'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="danger">{{ $errors->update->first('salary') }}</p>
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('gender', 'Select Gender *', ['class' => 'control-label']) !!}
                    <select name="gender" class="form-control">                       
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                       <option value="Male or Female">Male or Female</option>
                   </select>
                    <p class="danger">{{ $errors->update->first('gender') }}</p>
                </div>
                <div class="col-xs-6 form-group">
                    {!! Form::label('post', 'Post *', ['class' => 'control-label']) !!}
                    {!! Form::text('post', old('post'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="danger">{{ $errors->update->first('post') }}</p>
                </div>
                
                <div class="col-xs-6 form-group">
                    {!! Form::label('jt', 'Select Job Type *', ['class' => 'control-label']) !!}
                    <select name="jt" class="form-control">
                       <option value="Full Time">Full Time</option>
                       <option value="Part Time">Part Time</option>                       
                   </select>
                    <p class="danger">{{ $errors->update->first('jt') }}</p>
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('location', 'Location *', ['class' => 'control-label']) !!}
                    {!! Form::textarea('location', old('location'), ['class' => 'form-control', 'placeholder' => '' ,'rows' => '4']) !!}
                    <p class="danger">{{ $errors->update->first('jt') }}</p>
                </div>

                <div class="col-xs-12 form-group text-center">
                    <h3><b>Job Description & Job Requirement</b></h3>                
                    <hr style="border: 1px solid #3c8dbc;">
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('jd', 'Job Description *', ['class' => 'control-label']) !!}
                    <div id="summernote_jd"></div>
                    {!! Form::hidden('jd') !!}
                    <p class="danger">{{ $errors->update->first('jd') }}</p>
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('jr', 'Job Requirement *', ['class' => 'control-label']) !!}
                    <div id="summernote_jr"></div>
                    {!! Form::hidden('jr') !!}
                    <p class="danger">{{ $errors->update->first('jr') }}</p>
                </div>

                <div class="col-xs-12 form-group text-center">
                    <h3><b>What we can offer</b></h3>
                    <hr style="border: 1px solid #3c8dbc;">
                </div>
                                                
                <div class="col-xs-12 form-group">
                    {!! Form::label('benefits', 'Benefits', ['class' => 'control-label']) !!}
                    <div id="summernote_bene"></div>
                    {!! Form::hidden('benefits') !!}
                    <p class="danger">{{ $errors->update->first('benefits') }}</p>
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('highlights', 'Highlights', ['class' => 'control-label']) !!}
                    <div id="summernote_high"></div>
                    {!! Form::hidden('highlights') !!}
                    <p class="danger">{{ $errors->update->first('highlights') }}</p>
                </div>

                <div class="col-xs-12 form-group">
                    {!! Form::label('opportunities', 'Career Opportunities', ['class' => 'control-label']) !!}
                    <div id="summernote_opp"></div>
                    {!! Form::hidden('opportunities') !!}
                    <p class="danger">{{ $errors->update->first('opportunities') }}</p>
                </div>
            </div>            

            <div class="col-xs-12 form-group">
                <div class="col-xs-12 form-group">
                {!! Form::button(' <i class="fa fa-save"></i> '.__('admin.button.save'), ['type'=>'submit','class' => 'btn btn-success']) !!}
                <a class="btn btn-flat btn-danger " href="{{ route('admin.career.index') }}"><i class="fa fa-reply-all"></i> {{__('admin.button.cancel')}}</a>
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
        $('#summernote_jd').summernote({
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

        $('#summernote_jr').summernote({
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

        $('#summernote_bene').summernote({
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

        $('#summernote_high').summernote({
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

        $('#summernote_opp').summernote({
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

        $("form#CreateForm").on("submit", function() {
            $(".se-pre-con").show();
            var jd = $("#summernote_jd").summernote('code');
            $("input[name=jd]").val(jd);
            var jr = $("#summernote_jr").summernote('code');
            $("input[name=jr]").val(jr);
            var benefits = $("#summernote_bene").summernote('code');
            $("input[name=benefits]").val(benefits);
            var highlights = $("#summernote_high").summernote('code');
            $("input[name=highlights]").val(highlights);
            var opportunities = $("#summernote_opp").summernote('code');
            $("input[name=opportunities]").val(opportunities);
        })
        
    });
</script>
@endsection