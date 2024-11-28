@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <x-toast toastId="applyJobSuccessToast" />

    <section class="container banner">
        <x-back-button />

        <div class="section mb-4">
            <div class="d-flex justify-content-between">
                <div class="job-info">
                    <h3>{{ $career->position }}</h3>
                    <div class="d-flex gap-2 align-items-center mb-1">
                        <p class="m-0 d-flex gap-1 align-items-center">
                            <i class="bi bi-geo-alt text-orange"></i>
                            <span>{{ $career->location }}</span>
                        </p>
                        <div
                            class="bg-orange rounded-circle"
                            style="width: 5px; height: 5px;"
                        ></div>
                        <p class="m-0 d-flex gap-1 align-items-center">
                            <i class="bi bi-calendar-event text-orange"></i>
                            <span>{{ $career->updated_at->diffForHumans() }}</span>
                        </p>
                    </div>

                    <div class="d-flex gap-2 align-items-center mb-2">
                        <p class="m-0 d-flex gap-1 align-items-center">
                            <i class="bi bi-currency-dollar text-orange"></i>
                            <span>{{ $career->salary }}</span>
                        </p>
                        <div
                            class="bg-orange rounded-circle"
                            style="width: 5px; height: 5px;"
                        ></div>
                        <p class="m-0 d-flex gap-1 align-items-center">
                            <i class="bi bi-people text-orange"></i>
                            <span>{{ $career->post }}</span>
                        </p>
                    </div>


                    <div class="d-flex gap-2">
                        <span class="badge text-bg-primary">Open To - {{ $career->gender }}</span>
                        <span class="badge text-bg-primary">{{ $career->jt }}</span>
                        <span class="badge text-bg-primary">{{ $career->explvl }}</span>
                    </div>
                </div>
                <div>
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#careerModal{{ $career->id }}"
                    >
                        Apply Now
                    </button>
                    <x-job-apply-modal :career="$career" />
                </div>
            </div>
        </div>
        <div class="section">
            <x-section-header title="{{ __('career.job-description') }}" />
            <div>
                {!! $career->jd !!}
            </div>
        </div>
        <div class="section">
            <x-section-header title="{{ __('career.job-requirement') }}" />
            <div>
                {!! $career->jr !!}
            </div>
        </div>
        <div class="section m-0">
            <x-section-header title="{{ __('career.we-offer') }}" />
            <div class="row align-items-stretch">
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('career.benefits') }}</h5>
                            <p class="card-text">
                                {!! $career->benefits !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('career.highlights') }}</h5>
                            <p class="card-text">
                                {!! $career->highlights !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('career.career-opportunities') }}</h5>
                            <p class="card-text">
                                {!! $career->opportunities !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
    <script>
        $(document).ready(function() {
            /*
            If Multiple versions of jQuery library is loaded, DataTable won't work. ($(...).DataTable is not a function)
            So use $.noConflict() to load multiple jquery.
            */
            $.noConflict();
            $('#summernote').summernote({
                height: 150
            })
        })
    </script>
@endsection
