@extends('layouts.app')
@inject('request', 'Illuminate\Http\Request')
@section('content')

    <div class="container pt-0 mt-0">
        <div class="home-slider owl-carousel shadow">
            @if (count($sliders) > 0)
                @foreach ($sliders as $slider)
                    <div
                        class="slider-item"
                        style="background-image:url({{ url($slider->image) }});"
                    >
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row slider-text pt-5 mt-5 justify-content-start">
                                <div class="col-md-6 ftco-animate">
                                    <div
                                        class="text w-100 bg-dark py-5 px-5"
                                        style="background:rgba(76, 75, 76, .4)!important;"
                                    >
                                        <input
                                            type="hidden"
                                            name="alt"
                                            value="{{ $slider->alt }}"
                                        >

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <section class="bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 col-lg-9 bg-intro d-sm-flex align-items-center align-items-stretch">
                    <div class="intro-box d-flex align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="fa fa-check-circle-o"></i>
                        </div>
                        <h2 class="mb-0">Are you ready? <span>Let's Join us now!</span></h2>
                    </div>
                    <a
                        href="{{ route('contact.index') }}"
                        class="btn-custom d-flex align-items-center"
                        style="background-color:wheat;color:black; padding-top:1rem!important; padding-bottom:1rem!important"
                    ><span>{{ __('all.top-head.contact') }}</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light pt-5"></section>
    <!--<section class="ftco-section bg-light pt-5">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-md-6 col-lg-4 ftco-animate px-3">-->
    <!--                <div class="block-7 shadow-lg">-->
    <!--                    <div class="text-center">-->
    <!-- <span class="excerpt d-block">Engine Diagnostics</span> -->
    <!--                        <span class="price"><span class="number">Annual Report</span></span>-->

    <!--                        <div class="pricing-text img-responsive">-->
    <!--                            <a href="{{ route('annual-reports.index') }}"><img src="{{ url('images/a-report.jpg') }}" alt="" srcset="" width="50%" height="40%"></a>-->
    <!--                        </div>-->
    <!--                        <br>-->

    <!-- <a href="#" class="btn btn-secondary d-block px-2 py-3">Details</a> -->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-6 col-lg-4 ftco-animate px-3">-->
    <!--                <div class="block-7 shadow-lg">-->
    <!--                    <div class="text-center">-->
    <!-- <span class="excerpt d-block">Engine Diagnostics</span> -->
    <!--                        <span class="price"><span class="number">Financial Report</span></span>-->

    <!--                        <div class="pricing-text img-responsive">-->
    <!--                        <a href="{{ route('financial-reports.index') }}"><img src="{{ url('images/f-report.jpg') }}" alt="" srcset="" width="70%" height="35%"></a>-->
    <!--                        </div>-->
    <!--                        <br>-->

    <!-- <a href="#" class="btn btn-secondary d-block px-2 py-3">Details</a> -->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-md-6 col-lg-4 ftco-animate px-3">-->
    <!--                <div class="block-7 shadow-lg">-->
    <!--                    <div class="text-center">-->
    <!-- <span class="excerpt d-block">Engine Diagnostics</span> -->
    <!--                        <span class="price"><span class="number">Activities</span></span>-->

    <!--                        <div class="pricing-text img-responsive">-->
    <!--                        <a href="{{ route('activities.index') }}"><img src="{{ url('images/act.png') }}" alt="" srcset="" width="50%" height="35%"></a>-->
    <!--                        </div>-->
    <!--                        <br>-->

    <!-- <a href="#" class="btn btn-secondary d-block px-2 py-3">Details</a> -->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>            -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            $(".slider-item").each(function() {
                var alt = $(this).find('input[name=alt]').val();
                $(this).find(".text").html(alt);
            })
        })
    </script>
@stop
