@extends('layouts.app')
@section('styles')
<style>
    .title{
        font-size:15px;
        margin-top:5px;
        color:black;
    }
    
    .title a{
        color:black!important;
    }
    
    .p{
        margin-bottom:0px!important;
    }
</style>
@endsection
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">                
                <h2>{{__('all.all-meeting.title')}}</h2>
                <span class="subheading">{{__('all.mti-des-text')}}</span>
            </div>
        </div>
        <div class="row d-flex">
            @if(count($all_meetings) > 0)
            @foreach($all_meetings as $all_meeting)
            <div class="col-md-3 col-6 d-flex ftco-animate my-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="text-center mb-2">
                            <a href="{{route('meeting-file-download',$all_meeting->id)}}">
                                <img src="{{url('images/meetingminute.png')}}" width="80%">
                            </a>
                        </div>
                        <p class="title"><a href="{{route('meeting-file-download',$all_meeting->id)}}">{{$all_meeting->title}}</a></p>
                                <p class="p">{{$all_meeting->des}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="container">
                <div class="row d-flex no-gutters">
                    <div class="row justify-content-start py-5">
                        <div class="col-md-12 heading-section ftco-animate">
                            <h2>Comming Soon!</h2>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@stop