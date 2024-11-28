@extends('frontend.layouts.app')

@section('content')
    <x-header />

    <section class="container banner">
        <x-back-button />

        <div class="section">
            <x-section-header title="{{ $corporateInformationPost->title }}" />

            <div class="row my-5">
                <div class="col-12">
                    <p>{{ $corporateInformationPost->des }}</p>
                </div>
                @forelse ($corporateInformationPost->corporate_information_posts_images as $act_post_image)
                    <div class="col-md-3 ftco-animate px-2 py-2">
                        <div
                            class="w-100 rounded"
                            style="background-image: url({{ url($act_post_image->image_url) }}); height: 200px; display: grid; place-items: center"
                        >
                            <a href="{{ url($act_post_image->image_url) }}">
                                <span class="fa fa-expand fs-1 text-orange"></span>
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
                        <p class="mt-2 fw-bold text-danger">No data available yet! Comming Soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
