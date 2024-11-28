@extends('layouts.app')

@section('content')
<section class="ftco-section pb-5">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">                
                <h2>{{$stk_posts->title}}</h2>
                <span class="subheading">{{__('all.mti-des-text')}}</span>
            </div>
        </div>
    </div>
    <div class="container-fluid px-md-0">        
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="row justify-content-start py-5">
                    <div class="col-md-12 heading-section ftco-animate">                       
                        <p>{{$stk_posts->des}}</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">                
                @if(count($stk_posts->stock_posts_images) > 0)
                @foreach($stk_posts->stock_posts_images as $stock_posts_image)                
                <div class="col-md-3 ftco-animate px-2 py-2">
                    <div class="work img d-flex align-items-end" style="background-image: url({{url($stock_posts_image->image_url)}});">
                        <a href="{{url($stock_posts_image->image_url)}}" class="icon image-popup d-flex justify-content-center align-items-center">
                            <span class="fa fa-expand"></span>
                        </a>
                        <div class="desc w-100 px-4">
                            <div class="text w-100 mb-3">
                                <!-- <span>Engine</span>
                            <h2><a href="work-single.html">Engine Testing Complated</a></h2> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p>error</p>
                @endif
            </div>
        </div>       
    </div>
</section>
@stop