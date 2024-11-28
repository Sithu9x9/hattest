@extends('frontend.layouts.app')

@section('content')
    <x-header :isTransparent="true" />

    <x-home-hero :sliders="$sliders" />

    <section class="container">

        <div class="row">
            <div class="col-md-4 about-us">
                <img
                    src="{{ asset('frontend/images/about-us.jpg') }}"
                    alt="About"
                    class="w-100 rounded-2 object-fit-cover"
                    height="400"
                >
            </div>
            <div class="col-md-8 mt-3 mt-md-0">
                <div class="ps-0 ps-md-5 d-flex flex-column justify-content-center h-100">
                    <div class="mb-2" data-aos="zoom-in-up">
                        <h6 class="text-uppercase fw-bold text-orange" style="letter-spacing: 3px;">About Us</h6>
                        <h2 class="text-uppercase fw-bold">Creative Digital Experience Company</h2>
                    </div>
                    <p>
                        Gain a competitive edge with our innovative IT services. We offer advanced solutions that improve
                        productivity, streamline operations, and foster innovation, ensuring you stay ahead in today’s
                        fast-paced digital landscape. Lay a solid foundation for your business with our comprehensive IT
                        services. From network management to cloud integration, we build and maintain the infrastructure
                        that supports your current needs and future aspirations. Collaborate with us for IT solutions that
                        deliver excellence. We provide expert support, innovative solutions, and strategic guidance, helping
                        you enhance performance, secure your systems, and achieve scalable growth.
                    </p>
                    <ul>
                        <li>Customized IT Strategies for Your Success</li>
                        <li>Secure, Streamlined, and Efficient IT Services</li>
                        <li>Transforming IT Challenges into Opportunities</li>
                        <li>Empowering Your Business with Cutting-Edge IT Solutions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
