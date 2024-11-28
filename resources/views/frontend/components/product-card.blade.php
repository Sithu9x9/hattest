@props(['product'])

@php
    $categories = explode(', ', $product->category);
    $categoryClasses = collect($categories)
        ->map(function ($category) {
            return strtolower(str_replace(' ', '-', $category));
        })
        ->implode(' ');
@endphp

<div {{ $attributes->merge(['class' => "col-md-3 my-4 product-item $categoryClasses"]) }}>
    <div data-aos="zoom-in" class="border rounded h-100">
        <div class="rounded overflow-hidden shadow-sm">
            <img
                src="{{ asset($product->image) }}"
                alt="Product Image"
                class="w-100 product-card-image"
                style="height: 300px; object-fit: cover; cursor: pointer;"
                data-bs-toggle="modal"
                data-bs-target="#productModal{{ $product->id }}"
            >
        </div>
        <div class="d-flex justify-content-between align-items-center gap-4 mt-3 px-3">
            <div class="d-flex flex-wrap gap-2">
                @foreach (explode(', ', $product->category) as $category)
                    <p class="m-0 product-category-badge">{{ $category }}</p>
                @endforeach
            </div>
            <div>
                @if ($product->playstore_link)
                    <a
                        href="{{ $product->playstore_link }}"
                        target="_blank"
                        style="text-decoration: none;"
                    >
                        <img
                            src="{{ asset('frontend/images/play-store.png') }}"
                            alt="Play Store"
                            width="100"
                        >
                    </a>
                @endif
                @if ($product->appstore_link)
                    <a
                        href="{{ $product->appstore_link }}"
                        target="_blank"
                    >
                        <img
                            src="{{ asset('frontend/images/app-store.png') }}"
                            alt="App Store"
                            width="100"
                        >
                    </a>
                @endif
            </div>
        </div>
        <hr
            class="my-2 px-3"
            style="opacity: .1;"
        >
        <a
            href="{{ $product->link }}"
            class="d-flex align-items-center gap-3 fw-bold text-decoration-none text-primary product-link px-3 pb-3"
            target="_blank"
        >
            <h4 class="text-start m-0">{{ $product->title }}</h4>
            <i class="fas fa-location-arrow"></i>
        </a>
    </div>
</div>
