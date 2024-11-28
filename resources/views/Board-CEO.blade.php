@extends('layouts.app')
@section('styles')
<style>
    .carousel .carousel-inner {
        height: 100% !important;
    }

    .carousel-item {
        height: 100% !important;
    }

    .carousel .carousel-inner .carousel-item {
        align-content: center !important;
        justify-content: center !important;
        text-align: center !important;
    }

    .carousel-caption {
        top: 0;
        bottom: auto;
        left: 23%;
        right: 6%;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        height: 100px;
        width: 100px;
        outline: black;
        background-size: 100%, 100%;
        border-radius: 50%;
        background-image: none;
    }

    .carousel-indicators li {
        display: inline-block;
        text-indent: 0;
        cursor: pointer;
        background-color: #000000;
    }

    .carousel-indicators .active {
        background-color: #652328;
    }

    @media(max-width:578px) {
        .carousel-indicators {
            top: 0;
        }

        .w-100 {            
            width: 100% !important;            
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 100px;
            width: 100px;
            outline: black;
            background-size: 100%, 100%;
            border-radius: 50%;
            background-image: none;
        }

        
    }

    @media(max-width:992px) {
        .carousel-inner {
            padding: 50px 0px 100px 0px;
        }

        .carousel-control-next-icon:after {
            content: '>';
            font-size: 55px;
            color: #044462;
        }

        .carousel-control-prev-icon:after {
            content: '<';
            font-size: 55px;
            color: #044462;
        }

        .w-100 {            
            width: 50% !important;            
        }

    }

    @media(min-width:992px) {
        .carousel-inner {
            padding: 50px 200px 100px 200px;
        }

        .carousel-control-next-icon:after {
            content: '>';
            font-size: 55px;
            color: #044462;
        }

        .w-100 {            
            width: 70% !important;            
        }

        .carousel-control-prev-icon:after {
            content: '<';
            font-size: 55px;
            color: #044462;
        }

        .carousel .carousel-inner .carousel-item {
            align-content: center !important;
            justify-content: center !important;
            text-align: center !important;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            height: 100px;
            width: 100px;
            outline: black;
            background-size: 100%, 100%;
            border-radius: 50%;
            background-image: none;
        }

        .carousel-indicators li {
            display: inline-block;
            text-indent: 0;
            cursor: pointer;
            background-color: #000000;
        }

        .carousel-indicators .active {
            background-color: #652328;
        }
    }
</style>
@endsection
@section('content')
<section class="ftco-section testimony-section">
    <div class="container-fluid">
        <div class="row justify-content-center mb-3">
            <div class="col-md-7 heading-section heading-section-white text-center ftco-animate">
                <h2>{{__('all.nav.corporate.board')}}</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-htin-aung-khine.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.chair-man')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.chair-man-des')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-min-zeyar-hlaing-01.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.vice-chair-man')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.vice-chair-man-des')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-zaw-min-oo-01.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.bod-member-1')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.bod-1-des')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/U_Myo_Myint_Tun.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.bod-member-2')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.bod-2-des')}}
                                    </p>
                                </div>
                            </div>                            
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-min-oo-01.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.bod-member-3')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.bod-3-des')}}
                                    </p>
                                </div>
                            </div>                             
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-aung-soe-tha-01.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.bod-member-4')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.bod-4-des')}}
                                    </p>
                                </div>
                            </div>                               
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-aung-aung-01.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.bod-member-5')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.bod-5-des')}}
                                    </p>
                                </div>
                            </div>                             
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-shane-thu-aung.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.bod-member-6')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.bod-6-des')}}
                                    </p>
                                </div>
                            </div>                             
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/u-soe-htut.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.bod-member-7')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.bod-7-des')}}
                                    </p>
                                </div>
                            </div>                              
                        </div>
                        <div class="carousel-item">
                            <div class="row my-1">
                                <div class="col-md-4 pt-5 text-center">
                                    <img class="w-100" src="{{ url('images/bod/mr-myo-myint-oo.jpg') }}" height="230px" alt="First slide">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="text-dark text-center py-3">{{__('all.board.CEO')}}</h5>
                                    <p class="text-dark text-justify">
                                        {{__('all.board.CEO-des')}}
                                    </p>
                                </div>
                            </div>                              
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('javascript')

@endsection