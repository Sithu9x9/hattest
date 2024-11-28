@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        <div class="section">
            <x-section-header
                title="{{ __('corporate-policy.coc.title') }}"
                subtitle="{{ __('common.mti') }}"
            />
            <div>
                <p>{{ __('corporate-policy.coc.p-1') }}</p>
                <p>{{ __('corporate-policy.coc.p-2') }}</p>
            </div>
        </div>
        <div class="section">
            <x-section-header title="{{ __('corporate-policy.corporate-image.title') }}" />
            <div>
                <p>{{ __('corporate-policy.corporate-image.p-1') }}</p>
                <p>{{ __('corporate-policy.corporate-image.p-2') }}</p>
            </div>
        </div>
        <div class="section">
            <x-section-header title="{{ __('corporate-policy.company-assets.title') }}" />
            <div>
                <p>{{ __('corporate-policy.company-assets.p-1') }}</p>
                <p>{{ __('corporate-policy.company-assets.p-2') }}</p>
            </div>
        </div>
        <div class="section">
            <x-section-header title="{{ __('corporate-policy.internal-control.title') }}" />
            <div>
                <p>{{ __('corporate-policy.internal-control.p-1') }}</p>
                <p>{{ __('corporate-policy.internal-control.p-2') }}</p>
                <p>{{ __('corporate-policy.internal-control.p-3') }}</p>
                <p>{{ __('corporate-policy.internal-control.p-4') }}</p>
                <p>{{ __('corporate-policy.internal-control.p-5') }}</p>
                <p>{{ __('corporate-policy.internal-control.p-6') }}</p>
            </div>
        </div>
        <div class="section">
            <x-section-header
                title="{{ __('corporate-policy.corporate-gov.title') }}"
                subtitle="{{ __('common.mti') }}"
            />
            <div>
                <p>{{ __('corporate-policy.corporate-gov.p-1') }}</p>
                <p>{{ __('corporate-policy.corporate-gov.p-2') }}</p>
                <p>{{ __('corporate-policy.corporate-gov.p-3') }}</p>
                <ol>
                    <li>{{ __('corporate-policy.corporate-gov.li-1') }}</li>
                    <li>{{ __('corporate-policy.corporate-gov.li-2') }}</li>
                    <li>{{ __('corporate-policy.corporate-gov.li-3') }}</li>
                    <li>{{ __('corporate-policy.corporate-gov.li-4') }}</li>
                    <li>{{ __('corporate-policy.corporate-gov.li-5') }}</li>
                </ol>
                <p>{{ __('corporate-policy.corporate-gov.p-4') }}</p>
                <ol>
                    <li>{{ __('corporate-policy.corporate-gov.li-6') }}</li>
                    <li>{{ __('corporate-policy.corporate-gov.li-7') }}</li>
                    <li>{{ __('corporate-policy.corporate-gov.li-8') }}</li>
                </ol>
            </div>
        </div>
        <div class="section m-0">
            <x-section-header
                title="{{ __('corporate-policy.ec-staff.title') }}"
                subtitle="{{ __('common.mti') }}"
            />

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">File</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ __('corporate-policy.ec-staff.employee-contact') }}</td>
                        <td>
                            <a
                                href="{{ url('files/employment-contract.pdf') }}"
                                class="btn btn-primary"
                                download
                            >Download PDF</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>{{ __('corporate-policy.ec-staff.staff-manual') }}</td>
                        <td>
                            <a
                                href="{{ url('files/staff-manual.pdf') }}"
                                class="btn btn-primary"
                                download
                            >Download PDF</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
