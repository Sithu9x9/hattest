@extends('layouts.app')

@section('content')
<section class="ftco-section pt-5">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.nav.corporate.policy.COC')}}</h2>
                    <span class="subheading mb-4">{{__('all.mti-des-text')}}</span>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                        {{__('all.policy.c-p-1')}}
                    </p>
                    <p>
                        {{__('all.policy.c-p-2')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.policy.img-title')}}</h2>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                        {{__('all.policy.i-p-1')}}
                    </p>
                    <p>
                        {{__('all.policy.i-p-2')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.policy.ca-title')}}</h2>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                    {{__('all.policy.ca-p-1')}}
                    </p>
                    <p>
                    {{__('all.policy.ca-p-2')}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.policy.she-title')}}</h2>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                    {{__('all.policy.she-p-1')}}
                    </p>
                    <p>
                    {{__('all.policy.she-p-2')}}
                    </p>
                    <p>
                    {{__('all.policy.she-p-3')}}
                    </p>
                    <p>
                    {{__('all.policy.she-p-4')}}
                    </p>
                    <p>
                    {{__('all.policy.she-p-5')}}
                    </p>
                    <p>
                    {{__('all.policy.she-p-6')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt pb-5 bg-light">
    <div class="container">
        <div style="padding-top: 50px" id="gov"></div>
        <hr style="border: 1px solid #044462;">
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.policy.gov-title')}}</h2>
                    <span class="subheading mb-4">{{__('all.mti-des-text')}}</span>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                    {{__('all.policy.gov-p-1')}}
                    </p>
                    <p>
                    {{__('all.policy.gov-p-2')}}
                    </p>
                    <p>
                    {{__('all.policy.gov-p-3')}}
                    </p>
                    <ul class="partner">
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-li-1')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-li-2')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-li-3')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-li-4')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-li-5')}}</li>
                    </ul>
                    <p>
                    {{__('all.policy.gov-p-4')}}
                    </p>
                    <ul class="partner">
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-sli-1')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-sli-2')}}</li>
                        <li> &nbsp;&nbsp;&nbsp;{{__('all.policy.gov-sli-3')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt pb-5 bg-light">
    <div class="container">
        <div style="padding-top: 50px" id="ec"></div>
        <hr style="border: 1px solid #044462;">
        <div class="row pb-5">            
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="text-center">{{__('all.policy.ec-title')}}</h2>
                    <span class="subheading mb-4">{{__('all.mti-des-text')}}</span>
                </div>            
        </div>

        <div class="row text-center">
            <div class="col-md-6">
                <h5>{{__('all.policy.ec')}}</h5>
                <a href="{{url('files/employment-contract.pdf')}}" class="btn btn-lg btn-brown" download>Download PDF</a>
            </div>
            <div class="col-md-6">
                <h5>{{__('all.policy.sm')}}</h5>
                <a href="{{url('files/staff-manual.pdf')}}" class="btn btn-lg btn-brown" download>Download PDF</a>
            </div>
        </div>
    </div>
</section>
@stop