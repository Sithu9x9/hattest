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
                <h2>{{__('all.all-activities.title')}}</h2>
                <span class="subheading">{{__('all.mti-des-text')}}</span>
            </div>
        </div>
        <div class="row d-flex">
            @if(count($activitie_view) > 0)
            @foreach($activitie_view as $all_act)
            <div class="col-md-3 col-6 d-flex ftco-animate py-2">
                <div class="card shadow-lg">
                    <a href="{{route('activities.index',$all_act->id)}}">
                        <div class="card-body">
                            <div class="text-center mb-2">
                            <img src="{{ url($all_act->image) }}" width="80%">
                            </div>
                            <p class="title">{{$all_act->title}}</p>                            
                        </div>
                    </a>
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
        <div class="row mt-5">
          <div class="col text-center">            
            <div class="block-27">                
                {{$activitie_view->links()}}
            </div>
          </div>
        </div>
    </div>
</section>
@stop