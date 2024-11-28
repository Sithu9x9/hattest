@extends('layouts.app')

@section('content')
<section class="ftco-section pt-5">
    <div class="container">    
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.partner-facts.title')}}</h2>
                    <span class="subheading mb-4">{{__('all.mti-des-text')}}</span>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                    {{__('all.partner-facts.p-1')}}
                    </p>
                    <ul class="partner">
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.partner-facts.li-1')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.partner-facts.li-2')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.partner-facts.li-3')}}</li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
</section>

<section class="ftco-section ftco-no-pt pb-5 bg-light">
    <div class="container">
    <div style="padding-top: 50px" id="interest"></div>
    <hr style="border: 1px solid #044462;">
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.interests.title')}}</h2>
                    <span class="subheading mb-4">{{__('all.mti-des-text')}}</span>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                        {{__('all.interests.p-1')}}
                    </p>
                    <ul class="partner">
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-1')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-2')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-3')}} </li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-4')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-5')}} </li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-6')}} </li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-7')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.interests.li-8')}}</li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
</section>
@stop