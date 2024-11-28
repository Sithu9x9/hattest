@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        <div class="section">
            <x-section-header
                title="{{ __('investor-relations.corporate-information.title') }}"
                subtitle="{{ __('common.mti') }}"
            />

            <div class="row my-5">
                @forelse ($corporateInformations as $corporateInformation)
                    <div class="col-6 col-md-3 my-2">
                        <div class="card shadow-sm h-100">
                            <a href="{{ route('corporate-information.show', $corporateInformation->id) }}">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img
                                            src="{{ url($corporateInformation->image) }}"
                                            class="w-100 object-fit-cover rounded"
                                            height="180"
                                        >
                                    </div>
                                    <div class="mt-3">
                                        <h5 class="m-0 text-primary">{{ $corporateInformation->title }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <img
                            src="{{ asset('frontend/images/empty-list.svg') }}"
                            alt="Empty"
                            width="200"
                        >
                        <p class="mt-2 fw-bold text-danger">No corporate informations available yet! Comming Soon!</p>
                    </div>
                @endforelse
                <div>
                    {{ $corporateInformations->links() }}
                </div>
            </div>
        </div>
    </section>
@stop
