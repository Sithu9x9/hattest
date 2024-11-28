@extends('layouts.app')
@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
@endsection
@section('content')
<section class="ftco-section pt-5">
    <div class="container">
        <div class="row d-flex no-gutters">
            <div class="row justify-content-start" style="width:100%!important;">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2>{{__('all.nav.career')}}</h2>
                    <span class="subheading mb-4">{{__('all.mti-des-text')}}</span>
                </div>
                <div class="col-md-12 heading-section ftco-animate">
                    <div style="overflow-x:auto;">
                        <table id="example" class="display mb-5" style="width:100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Position</th>
                                <th>Experience Level</th>
                                <th>Post</th>
                                <th>Salary</th>
                                <th>Job Type</th>
                                <th>Gender</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($careers) > 0)
                            @foreach($careers as $key => $career)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $career->position }}</td>
                                <td>{{ $career->explvl }}</td>
                                <td>{{ $career->post }}</td>
                                <td>{{ $career->salary }}</td>
                                <td>{{ $career->jt }}</td>
                                <td>{{ $career->gender }}</td>
                                <td><a href="{{ route('career.detail',$career->id) }}" class="btn btn-brown">View Job Details</a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="9">
                                    no job available yet! Comming Soon!
                                </td>
                            </tr>   
                            @endif
                        </tbody>                        
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('javascript')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection