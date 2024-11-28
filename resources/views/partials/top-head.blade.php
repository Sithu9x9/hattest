@inject('request', 'Illuminate\Http\Request')
<div
    class="wrap"
    id="home"
>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-3 d-flex align-items-center">
                <a
                    class="navbar-brand"
                    href="{{ url('/') }}"
                > <img
                        src="{{ url('images/mti.png') }}"
                        alt=""
                        width="250px"
                    > </a>
            </div>
            @if ($request->segment(1) == 'admin' ? 'active' : '')
            @else
                <div class="col-md-7 d-flex align-items-center">
                    <div class="row">
                        <div class="col">
                            <div class="top-wrap d-flex">
                                <div class="icon d-flex align-items-center justify-content-center mt-4"><span
                                        class="fa fa-location-arrow"
                                    ></span></div>
                                <div class="text">
                                    <span style="text-transform: uppercase;">{{ __('all.top-head.address') }}</span>
                                    <a
                                        href="https://goo.gl/maps/WPjQszZqg55B6w5LA"
                                        target="_blank"
                                    ><span>{{ __('all.top-head.address-direction') }}</span></a>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="top-wrap d-flex">
                                <div class="icon d-flex align-items-center justify-content-center mt-4"><span
                                        class="fa fa-location-arrow"
                                    ></span></div>
                                <div class="text">
                                    <span style="text-transform: uppercase;">{{ __('all.top-head.contact') }}</span>
                                    <a href="{{ route('contact.index') }}"><span
                                            class="mail">office@mti.com.mm</span></a>
                                    <a href="tel:01 230 5213"><span>01-230 5213</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-start align-items-center">
                            <div class="social-media">
                                <p class="mb-0 d-flex">
                                    <a
                                        href="https://www.facebook.com/mti.com.mm"
                                        class="d-flex align-items-center justify-content-center"
                                    ><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                                    <a
                                        href="{{ route('contact.index') }}"
                                        class="d-flex align-items-center justify-content-center"
                                    ><span class="fa fa-envelope"><i class="sr-only">Mail</i></span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
