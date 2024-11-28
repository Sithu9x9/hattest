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
                <h2>{{__('all.all-annual.title')}}</h2>
                <span class="subheading">{{__('all.mti-des-text')}}</span>
            </div>
        </div>
        <div class="row d-flex">
            @if(count($all_annuals) > 0)
            @foreach($all_annuals as $all_annual)
            <div class="col-6 col-md-3 d-flex ftco-animate my-2">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="text-center mb-2">
                            <a href="{{route('annual-file-download',$all_annual->id)}}">
                                <img src="{{ url('images/a-report.jpg') }}" width="80%">
                            </a>
                        </div>
                        <p class="title"><a href="{{route('annual-file-download',$all_annual->id)}}">{{$all_annual->title}}</a></p>
                                <p class="p">{{$all_annual->des}}</p>
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