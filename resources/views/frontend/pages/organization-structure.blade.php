@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        <div class="section m-0">
            <x-section-header
                title="{{ __('header.organization-structure') }}"
                subtitle="{{ __('common.mti') }}"
            />
            <div class="text-center">
                <img
                    src="{{ asset('frontend/images/organization_structure-white.jpg') }}"
                    alt="Organization Structure"
                    width="100%"
                >
            </div>
        </div>
    </section>
@endsection
