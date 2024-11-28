@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        <div class="section m-0">
            <x-section-header
                title="{{ __('header.career') }}"
                subtitle="{{ __('common.mti') }}"
            />
            @if ($careers)
                <table
                    class="table table-bordered"
                    id="careerDatatable"
                >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Position</th>
                            <th>Experience Level</th>
                            <th>Post</th>
                            <th>Salary</th>
                            <th>Job Type</th>
                            <th>Gender</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($careers as $key => $career)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $career->position }}</td>
                                <td>{{ $career->explvl }}</td>
                                <td>{{ $career->post }}</td>
                                <td>{{ $career->salary }}</td>
                                <td>{{ $career->jt }}</td>
                                <td>{{ $career->gender }}</td>
                                <td>
                                    <a
                                        href="{{ route('careers.show', $career->id) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        View Job Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <img
                        src="{{ asset('frontend/images/empty-list.svg') }}"
                        alt="Empty"
                        width="200"
                    >
                    <p class="mt-2 fw-bold text-danger">No job available yet! Comming Soon!</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            /*
            If Multiple versions of jQuery library is loaded, DataTable won't work. ($(...).DataTable is not a function)
            So use $.noConflict() to load multiple jquery.
            */
            $.noConflict();
            $('#careerDatatable').DataTable({
                "columnDefs": [{
                    "targets": 7,
                    "orderable": false,
                    "searchable": false
                }]
            });
        });
    </script>
@endsection
