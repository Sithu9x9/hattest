@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        @if (session('success'))
            <div class="toast-container top-0 end-0 p-3">
                <div
                    class="toast text-bg-success toast-show"
                    role="alert"
                    aria-live="assertive"
                    aria-atomic="true"
                >
                    <div class="toast-header">
                        <img
                            src="{{ asset('images/mti_logo_icon.png') }}"
                            class="rounded me-2"
                            alt="Logo"
                            width="50"
                        >
                        <strong class="me-auto">MTI</strong>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="toast"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="toast-container top-0 end-0 p-3">
                <div
                    class="toast text-bg-danger toast-show"
                    role="alert"
                    aria-live="assertive"
                    aria-atomic="true"
                >
                    <div class="toast-header">
                        <img
                            src="{{ asset('images/mti_logo_icon.png') }}"
                            class="rounded me-2"
                            alt="Logo"
                            width="50"
                        >
                        <strong class="me-auto">MTI</strong>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="toast"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif

        <div>
            <x-section-header
                title="{{ __('contact.title') }}"
                subtitle="{{ __('contact.sub-title') }}"
            />
            <div class="row">
                <div class="col-md-6">
                    <div class="row h-100">
                        <div class="col-md-6">
                            <x-contact-card
                                icon="bi bi-geo-alt"
                                title="{{ __('contact.address') }}"
                                description="First floor, Building-9, MICT park, Hlaing Township, Yangon, Myanmar"
                            />
                        </div>
                        <div class="col-md-6 mt-2 mt-md-0">
                            <x-contact-card
                                icon="bi bi-telephone"
                                title="{{ __('contact.call-us') }}"
                                description="+01-230 5213"
                            />
                        </div>
                        <div class="col-md-6 mt-2 mt-md-4">
                            <x-contact-card
                                icon="bi bi-envelope"
                                title="{{ __('contact.email-us') }}"
                                description="office@mti.com.mm"
                            />
                        </div>
                        <div class="col-md-6 mt-2 mt-md-4">
                            <x-contact-card
                                icon="bi bi-clock"
                                title="{{ __('contact.open-hours') }}"
                                description="Monday – Friday : 9am to 5 pm <br />
                            Saturday : 9am to 5 pm"
                            />
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">

                    <form
                        action="{{ route('contact.store') }}"
                        method="POST"
                        class="rounded-1 ps-0 ps-md-2 w-100 h-100"
                        style="background-color: var(--bs-gray-200);"
                        id="contact-us-form"
                    >
                        @csrf
                        <div class="row p-4">
                            <div class="col-md-6 mb-2 mb-md-4">
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    placeholder="{{ __('contact.your-name') }}"
                                    value="{{ old('name') }}"
                                >
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2 mb-md-4">
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    placeholder="{{ __('contact.your-email') }}"
                                    value="{{ old('email') }}"
                                >
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2 mb-md-4">
                                <input
                                    type="text"
                                    class="form-control @error('subject') is-invalid @enderror"
                                    id="subject"
                                    name="subject"
                                    placeholder="{{ __('contact.subject') }}"
                                    value="{{ old('subject') }}"
                                >
                                @error('subject')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2 mb-md-4">
                                <textarea
                                    class="form-control @error('message') is-invalid @enderror"
                                    id="message"
                                    rows="4"
                                    name="message"
                                    placeholder="{{ __('contact.message') }}"
                                >{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2 mb-md-4">
                                <div
                                    class="g-recaptcha"
                                    data-sitekey="{{ config('services.recaptcha.site_key') }}"
                                ></div>
                            </div>
                            <input
                                type="hidden"
                                name="secret"
                                id="secret"
                                value="{{ config('services.recaptcha.secret_key') }}"
                            >
                            <input
                                type="hidden"
                                name="response"
                                id="response"
                            >
                            <div class="col-md-4 mx-auto text-center">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                ><i class="bi bi-envelope me-1"></i> {{ __('contact.send-message') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <br />
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.530229410454!2d96.12664027475378!3d16.849645418074488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c194eb70b00001%3A0xb2a1f5694971b1b6!2sMICT%20Park%20Main%20Building!5e0!3m2!1sen!2smm!4v1692256269473!5m2!1sen!2smm"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen
                loading="lazy"
                class="mt-4"
                referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
