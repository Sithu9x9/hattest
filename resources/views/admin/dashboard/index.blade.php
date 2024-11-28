@extends('layouts.back-app')

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><i class="fa fa-child"></i> </h3>

                    <p>Activities Posts</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('admin.act.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">                
                    <h3> <i class="fa fa-clone"></i> </h3>

                    <p>Annaul Reports</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('admin.annual.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><i class="fa fa-gift"></i> </h3>

                    <p>Financial Reports</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('admin.financial.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>

@endsection