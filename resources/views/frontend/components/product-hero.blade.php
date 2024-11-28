<section
    class="container-fluid product-hero hero-section"
    style="background-image: url({{ asset('frontend/images/hero-bg.jpeg') }})"
>
    <div class="container">
        <div class="hero-text w-100 w-md-50 pt-5">
            <h6
                class="text-uppercase fw-bold text-orange"
                style="letter-spacing: 5px;"
                data-aos="fade-up"
                data-aos-delay="100"
            >{{ __('products.banner.subtitle') }}</h6>
            <h1
                class="text-uppercase fw-bold my-4 display-4"
                style="letter-spacing: 3px;"
                data-aos="fade-up"
                data-aos-delay="200"
            >Powering Your <span class="text-orange">Service</span> Evolution</h1>
            <p
                data-aos="fade-up"
                data-aos-delay="250"
            >
                {{ __('products.banner.description') }}
            </p>
            <a
                href="#products"
                class="btn btn-orange text-white mt-4"
            >{{ __('products.banner.button-text') }}</a>
        </div>
    </div>
</section>
