@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        <div class="section">
            <x-section-header
                title="{{ __('investor-relations.annual-report.title') }}"
                subtitle="{{ __('common.mti') }}"
            />

            <div class="row my-5">
                @forelse ($annualReports as $annualReport)
                    <div class="col-6 col-md-3 my-2">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="{{ route('financial-reports.download', $annualReport->id) }}">
                                        <img
                                            src="{{ url('images/a-report.jpg') }}"
                                            width="150"
                                        >
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <a
                                        href="{{ route('financial-reports.download', $annualReport->id) }}"
                                        class="text-primary"
                                    >
                                        <h5 class="m-0">{{ $annualReport->title }}</h5>
                                    </a>
                                    <p class="my-1">{{ $annualReport->des }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <img
                            src="{{ asset('frontend/images/empty-list.svg') }}"
                            alt="Empty"
                            width="200"
                        >
                        <p class="mt-2 fw-bold text-danger">No annual reports available yet! Comming Soon!</p>
                    </div>
                @endforelse
                <div>
                    {{ $annualReports->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
