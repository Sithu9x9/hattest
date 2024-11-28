@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">                
                <h2>{{__('all.all-corporate-info.title')}}</h2>
                <span class="subheading">{{__('all.mti-des-text')}}</span>
            </div>
        </div>
        <div class="row d-flex">
            @if(count($cors) > 0)
            @foreach($cors as $all_cor)
            <div class="col-md-3 col-6 d-flex ftco-animate py-2">
                <div class="card shadow-lg">
                    <a href="{{route('corporate-information.show',$all_cor->id)}}">
                        <div class="card-body">
                            <div class="blog-entry align-self-stretch" style="width: 100%!important;">
                                <!-- <a href="{{route('corporate-information',$all_cor->id)}}" class="block-20 rounded" style="background-image: url('images/mti-logo.png'); width:175px!important; height:200px !important;">
                            </a> -->
                                <img src="{{url($all_cor->image)}}" alt="" width="100%">
                                <div class="text">
                                    <div class="posted mb-3 d-flex">
                                        <!-- <div class="img author" style="background-image: url(images/person_2.jpg);"></div> -->
                                        <div class="desc pl-3">
                                            <!-- <span>Posted by John doe</span> -->
                                            <!-- <span>24 February 2020</span> -->
                                        </div>
                                    </div>
                                    <h3 class="heading text-center">{{$all_cor->title}}</h3>
                                </div>
                            </div>
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
                  {{$cors->links()}}
              </div>
            </div>
          </div>
    </div>
</section>
@stop