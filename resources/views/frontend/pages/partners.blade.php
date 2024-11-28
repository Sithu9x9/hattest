@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        <div class="section">
            <x-section-header
                title="{{ __('partners.partner.title') }}"
                subtitle="{{ __('common.mti') }}"
            />
            <div>
                <p>{{ __('partners.partner.p-1') }}</p>
                <ul>
                    <li>{{ __('partners.partner.li-1') }}</li>
                    <li>{{ __('partners.partner.li-2') }}</li>
                    <li>{{ __('partners.partner.li-3') }}</li>
                </ul>
            </div>
        </div>
        <div class="section m-0">
            <x-section-header
                title="{{ __('partners.interests.title') }}"
                subtitle="{{ __('common.mti') }}"
            />
            <div>
                <p>{{ __('partners.interests.p-1') }}</p>
                <ul class="partner">
                    <li>{{ __('partners.interests.li-1') }}</li>
                    <li>{{ __('partners.interests.li-2') }}</li>
                    <li>{{ __('partners.interests.li-3') }} </li>
                    <li>{{ __('partners.interests.li-4') }}</li>
                    <li>{{ __('partners.interests.li-5') }} </li>
                    <li>{{ __('partners.interests.li-6') }} </li>
                    <li>{{ __('partners.interests.li-7') }}</li>
                    <li>{{ __('partners.interests.li-8') }}</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
