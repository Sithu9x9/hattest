@props(['sliders'])

<section style="height: 100vh; min-height: 100vh; min-height: 100svh;">
    <div
        id="carouselExampleFade"
        class="carousel slide carousel-fade h-100"
        data-bs-ride="carousel"
    >
        <div class="carousel-indicators">
            @foreach ($sliders as $key => $slider)
                <button
                    type="button"
                    data-bs-target="#carouselExampleFade"
                    data-bs-slide-to="{{ $key }}"
                    class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="true"
                    aria-label="Slide {{ $key + 1 }}"
                ></button>
            @endforeach
        </div>
        <div class="carousel-inner h-100">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item h-100 position-relative hero-section {{ $loop->first ? 'active' : '' }}">
                    <img
                        src="{{ $slider->image }}"
                        class="d-block w-100"
                        alt="Banner {{ $key }}"
                    >
                    <div
                        class="slider-text position-absolute text-white top-50 translate-middle w-50"
                        style="left: 40%;"
                    >
                        {{-- {!! $slider->alt !!} --}}
                        <h1
                            class="text-uppercase fw-bold my-4 display-4"
                            style="letter-spacing: 3px;"
                            data-aos="fade-up"
                            data-aos-delay="200"
                        >Powering Your <br /><span class="text-orange">Service</span> Evolution</h1>
                        <p
                            data-aos="fade-up"
                            data-aos-delay="250"
                        >
                            {{ __('products.banner.description') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleFade"
            data-bs-slide="prev"
        >
            <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
            ></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleFade"
            data-bs-slide="next"
        >
            <span
                class="carousel-control-next-icon"
                aria-hidden="true"
            ></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
