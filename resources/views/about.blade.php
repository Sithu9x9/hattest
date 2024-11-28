@extends('layouts.app')
@inject('request', 'Illuminate\Http\Request')
@section('content')
    <section class="ftco-section ftco-no-pt pb-5 bg-light">
        <div class="container">
            <div class="row d-flex no-gutters">
                <div class="row justify-content-start py-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2>{{ __('all.about.title') }}</h2>
                        <span class="subheading mb-4">{{ __('all.about.span') }}</span>
                    </div>
                    <div class="col-md-12 heading-section ftco-animate">
                        <p>
                            {{ __('all.about.p-1') }}
                        </p>
                        <p>
                            {{ __('all.about.p-2') }}
                        </p>
                        <p>
                            {{ __('all.about.p-3') }}
                        </p>
                        <p>
                            {{ __('all.about.p-4') }}
                        </p>
                        <span class="subheading mb-4">{{ __('all.about.sub-1') }}</span>
                        <span class="subheading">{{ __('all.about.sub-2') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center mb-3">
                    <img
                        src="{{ url('images/CertificateOfIncorporation.png') }}"
                        alt=""
                        width="100%"
                        height="600px"
                    >
                </div>
                <div class="col-lg-6 text-center">
                    <img
                        src="{{ url('images/Commencement .png') }}"
                        alt=""
                        width="100%"
                        height="600px"
                    >
                </div>
            </div>
        </div>
    </section>

    <section
        class="ftco-section ftco-no-pt pb-5 text-dark"
        id="history"
    >
        <div class="container">
            <div class="row d-flex no-gutters">

                <div class="row justify-content-start py-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <hr style="border: 1px solid #044462;">
                        <h2>{{ __('all.history.title') }}</h2>
                    </div>
                    <div class="col-md-12 heading-section ftco-animate">
                        <p>
                            {{ __('all.history.p-1') }}
                        </p>
                        <p>
                            {{ __('all.history.p-2') }}
                        </p>
                        <p>
                            {{ __('all.history.p-3') }}
                        </p>
                    </div>
                </div>
            </div>
            <hr style="border: 1px solid #044462;">
            <!-- Our strengths -->
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>{{ __('all.history.str-title') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 services ftco-animate">
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-1') }}</p>
                        </div>
                    </div>
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-2') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 services ftco-animate">
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-3') }}</p>
                        </div>
                    </div>
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-4') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 services ftco-animate">
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-5') }}</p>
                        </div>
                    </div>
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-6') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 services ftco-animate">
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-7') }} <br>&nbsp;</p>
                        </div>
                    </div>
                    <div class="d-block d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="fa fa-check-circle-o"></span>
                        </div>
                        <div class="media-body pl-3">
                            <p>{{ __('all.history.c-8') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Our strengths END -->
            <!-- Our Values -->
            <div
                style="padding-top: 50px"
                id="values"
            ></div>
            <hr style="border: 1px solid #044462;">
            <div class="row justify-content-center pb-5 mb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>{{ __('all.values.title') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                        {{ __('all.values.p-1') }}
                    </p>
                    <p>
                        <span style="font-weight: bold"><i>{{ __('all.values.vision') }}</i> -</span>
                        {{ __('all.values.p-2') }}
                    </p>
                    <p>
                        <span style="font-weight: bold"><i>{{ __('all.values.mission') }}</i> -</span>
                        {{ __('all.values.p-3') }}
                    </p>
                    <p>
                        <span style="font-weight: bold"><i>{{ __('all.values.p-4') }}</i></span>
                    </p>

                    <ul>
                        <li>{{ __('all.values.li-1') }}</li>
                        <li>{{ __('all.values.li-2') }}</li>
                        <li>{{ __('all.values.li-3') }}</li>
                        <li>{{ __('all.values.li-4') }}</li>
                        <li>{{ __('all.values.li-5') }}</li>
                    </ul>
                    <div
                        style="padding-top: 70px"
                        id="slogan"
                    ></div>
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-7 heading-section">
                            <p style="font-weight:bold;color:rgb(29,141,65)"><i> {{ __('all.slogan.text') }}</i></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Our Values END -->
            <hr style="border: 1px solid #044462;">
            <!-- Company History -->
            <div class="row justify-content-center pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>{{ __('all.slogan.company') }}</h2>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                        {{ __('all.slogan.p-1') }}
                    </p>
                    <p>
                        {{ __('all.slogan.p-2') }}
                    </p>
                </div>
            </div>
            <!-- Company History END -->

            <!-- MTI: Resources and Experiences -->
            <div
                style="padding-top: 45px"
                id="resources"
            ></div>
            <hr style="border: 1px solid #044462;">
            <div class="row justify-content-center pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">

                    <h2>{{ __('all.RE.title') }}</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                        {{ __('all.RE.p-1') }}
                    </p>
                    <p>
                        {{ __('all.RE.p-2') }}
                    </p>
                    <p>
                        {{ __('all.RE.p-3') }}
                    </p>
                    <p>
                        {{ __('all.RE.p-4') }}
                    </p>
                    <p>
                        {{ __('all.RE.p-5') }}
                    </p>
                    <p>
                        {{ __('all.RE.p-6') }}
                    </p>
                    <p>
                        {{ __('all.RE.p-7') }}
                    </p>
                </div>
            </div>
            <!-- MTI: Resources and Experiences END -->

            <!-- Our Business Strategies -->
            <div
                style="padding-top: 50px"
                id="strategies"
            ></div>
            <hr style="border: 1px solid #044462;">
            <div class="row justify-content-center pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2>{{ __('all.strategies.title') }}</h2>
                </div>
            </div>

            <div class="row pb-5 mb-3">
                <div class="col-md-12 heading-section ftco-animate">
                    <p>
                        {{ __('all.strategies.p-1') }}
                    </p>
                    <p>
                        {{ __('all.strategies.p-2') }}
                    </p>
                    <p>
                        {{ __('all.strategies.p-3') }}
                    </p>
                </div>
            </div>
            <!-- Our Business Strategies END -->

        </div>
    </section>

@stop
