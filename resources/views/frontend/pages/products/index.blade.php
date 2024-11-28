@extends('frontend.layouts.app')

@section('content')
    <x-header :isTransparent="true" />

    <x-product-hero />

    <section
        class="container"
        id="services"
    >
        <x-section-heading
            subtitle="{{ __('products.services.subtitle') }}"
            title="{{ __('products.services.title') }}"
            aosDirection="left"
        />

        <div class="row mx-auto w-100">
            @foreach ($services as $service)
                <x-service-card
                    :service="$service"
                    class="col-md-4"
                    style="{{ $loop->odd ? 'background: #F1F1F1;' : '' }}"
                    data-aos="zoom-in"
                />
            @endforeach
        </div>
    </section>

    <section
        class="container"
        id="products"
    >
        <x-section-heading
            subtitle="{{ __('products.products.subtitle') }}"
            title="{{ __('products.products.title') }}"
        />

        <div class="row text-center mx-auto">
            <div class="d-flex flex-wrap justify-content-center gap-3 my-3">
                <button class="btn btn-primary product-filter-btn">All</button>
                @foreach ($uniqueCategories as $category)
                    <button class="btn btn-outline-primary product-filter-btn">{{ $category }}</button>
                @endforeach
            </div>
            @foreach ($products as $product)
                <x-product-card
                    :product="$product"
                />
                @include('frontend.components.product-modal', ['product' => $product])
            @endforeach
        </div>
    </section>

    <section class="container">
        <x-section-heading
            subtitle="{{ __('products.clients.subtitle') }}"
            title="{{ __('products.clients.title') }}"
            aosDirection="left"
        />

        <div class="swiper client-swiper">
            <div class="swiper-wrapper d-flex align-items-center">
                @foreach ($clients as $client)
                    <div class="swiper-slide">
                        <div class="d-flex justify-content-center align-items-center py-4 m-3">
                            <a
                                href="{{ $client->link }}"
                                class="client-card"
                                target="_blank"
                            >
                                <img
                                    src="{{ asset($client->logo) }}"
                                    alt="Client Logo"
                                    width="120"
                                >
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-scrollbar"></div>
        </div>

    </section>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('.product-filter-btn').click(function() {
                $('.product-filter-btn').removeClass('btn-primary').addClass('btn-outline-primary');
                $(this).removeClass('btn-outline-primary').addClass('btn-primary');
                var category = $(this).text().trim();
                if (category === 'All') {
                    $('.product-item').fadeOut(200);
                    $('.product-item').fadeIn(200);
                } else {
                    $('.product-item').fadeOut(200);
                    $('.product-item.' + category.toLowerCase().replace(/ /g, '-')).fadeIn(
                        200);
                }
            });

            const swiper = new Swiper('.client-swiper', {
                slidesPerView: 5,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 2000
                },
                scrollbar: {
                    el: '.swiper-scrollbar',
                    draggable: true,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 2,
                        spaceBetween: 20
                    },
                    480: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    },
                    640: {
                        slidesPerView: 5,
                        spaceBetween: 20
                    }
                }
            });
        })
    </script>
@endsection
