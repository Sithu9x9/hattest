@extends('frontend.layouts.app')

@section('style')
    <style>
        .sidebar li {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <x-header />

    <section
        class="container banner"
        id="aboutUsSection"
    >
        <div class="row">
            <div
                class="sidebar col-md-3 position-sticky"
                style="top: 10rem; height: max-content;"
            >
                <ul class="list-group">
                    <li
                        class="list-group-item text-uppercase active"
                        data-id="aboutUsSection"
                    >{{ __('about.about.title') }}</li>
                    <li
                        class="list-group-item text-uppercase"
                        data-id="companyProfileSection"
                    >{{ __('about.profile.title') }}</li>
                    <li
                        class="list-group-item text-uppercase"
                        data-id="companyStrengthSection"
                    >{{ __('about.strength.title') }}</li>
                    <li
                        class="list-group-item text-uppercase"
                        data-id="companyValueSection"
                    >{{ __('about.values.title') }}</li>
                    <li
                        class="list-group-item text-uppercase"
                        data-id="companyHistorySection"
                    >{{ __('about.history.title') }}</li>
                    <li
                        class="list-group-item text-uppercase"
                        data-id="companyResourceSection"
                    >{{ __('about.resources.title') }}
                    </li>
                    <li
                        class="list-group-item text-uppercase"
                        data-id="companyBusinessSection"
                    >
                        {{ __('about.strategies.title') }}
                    </li>
                </ul>
            </div>
            <div class="col-md-9 mt-5 mt-md-0">
                <div class="accordion">
                    <div class="section">
                        <div class="accordion-item">
                            <x-section-header
                                title="{{ __('about.about.title') }}"
                                subtitle="{{ __('about.about.sub-title') }}"
                                accordionId="#aboutUs"
                            />
                            <div
                                id="aboutUs"
                                class="accordion-collapse collapse show"
                            >
                                <p>
                                    {{ __('about.about.p-1') }}
                                </p>
                                <p>
                                    {{ __('about.about.p-2') }}
                                </p>
                                <p>
                                    {{ __('about.about.p-3') }}
                                </p>
                                <p>
                                    {{ __('about.about.p-4') }}
                                </p>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <p class="sub-heading">{{ __('about.about.photo-1') }}</p>
                                        <img
                                            src="{{ url('images/CertificateOfIncorporation.png') }}"
                                            alt=""
                                            style="object-fit: contain;"
                                            width="100%"
                                            height="600px"
                                        >
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p class="sub-heading">{{ __('about.about.photo-2') }}</p>
                                        <img
                                            src="{{ url('images/Commencement .png') }}"
                                            alt=""
                                            style="object-fit: contain;"
                                            width="100%"
                                            height="600px"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="section"
                        id="companyProfileSection"
                    >
                        <div class="accordion-item">
                            <x-section-header
                                title="{{ __('about.profile.title') }}"
                                accordionId="#companyProfile"
                            />
                            <div
                                id="companyProfile"
                                class="accordion-collapse collapse show"
                            >
                                <p>
                                    {{ __('about.profile.p-1') }}
                                </p>
                                <p>
                                    {{ __('about.profile.p-2') }}
                                </p>
                                <p>
                                    {{ __('about.profile.p-3') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="section"
                        id="companyStrengthSection"
                    >
                        <x-section-header
                            title="{{ __('about.strength.title') }}"
                            accordionId="#companyStrength"
                        />
                        <div
                            id="companyStrength"
                            class="row accordion-collapse collapse show"
                        >
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-1') }}</p>
                            </div>
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-2') }}</p>
                            </div>
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-3') }}</p>
                            </div>
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-4') }}</p>
                            </div>
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-5') }}</p>
                            </div>
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-6') }}</p>
                            </div>
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-7') }}</p>
                            </div>
                            <div class="col-md-3 d-flex gap-3 my-3 align-items-center">
                                <i class="bi bi-check-circle fs-4 text-primary"></i>
                                <p class="m-0">{{ __('about.strength.c-8') }}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="section"
                        id="companyValueSection"
                    >
                        <x-section-header
                            title="{{ __('about.values.title') }}"
                            accordionId="#companyValues"
                        />
                        <div
                            id="companyValues"
                            class="accordion-collapse collapse show"
                        >
                            <p>{{ __('about.values.p-1') }}</p>
                            <p>
                                <span class="fw-bold">{{ __('about.values.vision-title') }} - </span>
                                {{ __('about.values.vision-p') }}
                            </p>
                            <p>
                                <span class="fw-bold">{{ __('about.values.mission-title') }} - </span>
                                {{ __('about.values.mission-p') }}
                            </p>
                            <p>
                                <span class="fw-bold">{{ __('about.values.sub-title') }} - </span>
                            </p>
                            <ul>
                                <li>{{ __('about.values.li-1') }}</li>
                                <li>{{ __('about.values.li-2') }}</li>
                                <li>{{ __('about.values.li-3') }}</li>
                                <li>{{ __('about.values.li-4') }}</li>
                                <li>{{ __('about.values.li-5') }}</li>
                            </ul>
                            <p>
                                <span class="fw-bold text-primary">{{ __('about.values.slogan') }}</span>
                            </p>
                        </div>
                    </div>
                    <div
                        class="section"
                        id="companyHistorySection"
                    >
                        <x-section-header
                            title="{{ __('about.history.title') }}"
                            accordionId="#companyHistory"
                        />
                        <div
                            id="companyHistory"
                            class="accordion-collapse collapse show"
                        >
                            <p>{{ __('about.history.p-1') }}</p>
                            <p>{{ __('about.history.p-2') }}</p>
                        </div>
                    </div>
                    <div
                        class="section"
                        id="companyResourceSection"
                    >
                        <x-section-header
                            title="{{ __('about.resources.title') }}"
                            accordionId="#mtiResources"
                        />
                        <div
                            id="mtiResources"
                            class="accordion-collapse collapse show"
                        >
                            <p>{{ __('about.resources.p-1') }}</p>
                            <p>{{ __('about.resources.p-2') }}</p>
                            <p>{{ __('about.resources.p-3') }}</p>
                            <p>{{ __('about.resources.p-4') }}</p>
                            <p>{{ __('about.resources.p-5') }}</p>
                            <p>{{ __('about.resources.p-6') }}</p>
                            <p>{{ __('about.resources.p-7') }}</p>
                        </div>
                    </div>
                    <div
                        class="section m-0"
                        id="companyBusinessSection"
                    >
                        <x-section-header
                            title="{{ __('about.strategies.title') }}"
                            accordionId="#businessStrategies"
                        />
                        <div
                            id="businessStrategies"
                            class="accordion-collapse collapse show"
                        >
                            <p>{{ __('about.strategies.p-1') }}</p>
                            <p>{{ __('about.strategies.p-2') }}</p>
                            <p>{{ __('about.strategies.p-3') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            function onScroll() {
                let windowTop = $(this).scrollTop();
                $('.sidebar .list-group-item').each(function(event) {
                    let sectionId = $(this).attr('data-id');
                    if (windowTop >= $('#' + sectionId).offset().top - 120) {
                        $('.list-group-item.active').removeClass('active');
                        $(this).addClass('active');
                    }
                });
            }

            $('.sidebar .list-group-item').on('click', function() {
                var sectionId = $(this).attr('data-id');

                $('html, body').animate({
                    scrollTop: $('#' + sectionId).offset().top - 120
                }, 200);
            });

            $(window).scroll(onScroll)
        })
    </script>
@endsection
