@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back-app')
@section('style')
<style>
    .bg-custom{
        background-color:#044462!important;
        color:white!important;
    }
</style>
@endsection
@section('content')
<div class="box box-primary">
    <!--.box-header -->
    <div class="box-header with-border">
        <h3 class="box-title">Career Detail</h3>
        <div class="box-tools pull-right">
        </div>
    </div>    
    <!-- /.box-header -->
    <div class="box-body">
        <div class="col-xs-12" style="margin-bottom: 30px;">
            <div class="col-xs-6 col-md-2">
                <p><b>Job Position :</b></p>
            </div>
            <div class="col-xs-6 col-md-2">
                <p>{{ $career->position }}</p>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-xs-6 col-md-2">
                <p><b>Experienced Level :</b></p>
            </div>
            <div class="col-xs-6 col-md-2">
                <p>{{ $career->explvl }}</p>
            </div>
        </div>
        
        <div class="col-xs-12" style="margin-bottom: 30px;">
            <div class="col-xs-6 col-md-2">
                <p><b>Job Salary :</b></p>
            </div>
            <div class="col-xs-6 col-md-2">
                <p>{{ $career->salary }}</p>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-xs-6 col-md-2">
                <p><b>Gender Open To :</b></p>
            </div>
            <div class="col-xs-6 col-md-2">
                <p>{{ $career->gender }}</p>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="col-xs-6 col-md-2">
                <p><b>Post :</b></p>
            </div>
            <div class="col-xs-6 col-md-2">
                <p>{{ $career->post }}</p>
            </div>
            <div class="col-md-2">
                
            </div>
            <div class="col-xs-6 col-md-2">
                <p><b>Job Type :</b></p>
            </div>
            <div class="col-xs-6 col-md-2">
                <p>{{ $career->jt }}</p>
            </div>
        </div>

        <div class="col-xs-12">
            <hr style="border: 1px solid #3c8dbc;">
            <h3 class="text-center"><b>Job Description</b></h3>
            <br>
            <input type="hidden" name="jd" value="{{ $career->jd }}">
            <p id="jd"></p>
        </div>
        
        <div class="col-xs-12">
            <hr style="border: 1px solid #3c8dbc;">
            <h3 class="text-center"><b>Job Requirement</b></h3>
            <br>
            <input type="hidden" name="jr" value="{{ $career->jr }}">
            <p id="jr"></p>
        </div>

        @if($career->benefits != null && $career->highlights != null && $career->opportunities != null)
        <div class="col-xs-12">
            <hr style="border: 1px solid #3c8dbc;">
            <h3 class="text-center"><b>What We Can Offer</b></h3>
            <br>
            <div class="col-xs-4 bg-custom">
                <h4><i><b>Benefits</b></i></h4>
                <br>
                <input type="hidden" name="benefits" value="{{ $career->benefits }}">
                <p id="benefits"></p>
            </div>
            <div class="col-xs-4 bg-custom">
                <h4><b>Hightlights</b></h4>
                <br>
                <input type="hidden" name="highlights" value="{{ $career->highlights }}">
                <p id="highlights"></p>
            </div>
            <div class="col-xs-4 bg-custom">
                <h4><b>Career Opportunities</b></h4>
                <br>
                <input type="hidden" name="opportunities" value="{{ $career->opportunities }}">
                <p id="opportunities"></p>
            </div>
        </div>
        @endif    
        
        <div class="col-xs-12 form-group" style="margin-top: 30px;">        
        <a class="btn btn-flat btn-danger " href="{{ route('admin.career.index') }}"><i class="fa fa-reply-all"></i> {{__('admin.back')}}</a>        
        </div>
           
    </div>
</div>
@endsection
@section('javascript')
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
</script>
@endsection