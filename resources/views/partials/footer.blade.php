<footer
    class="footer ftco-section"
    id="footer"
>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg">
                <div class="mb-6">
                    <h2 class="logo"><a
                            class="navbar-brand"
                            href="{{ route('home') }}"
                        > <img
                                src="{{ url('images/mti.png') }}"
                                alt=""
                                width="250px"
                            > </a> </h2>
                    <h2 style="font-weight:0!important; font-size:15px; color:wheat;"><i>{{ __('all.slogan.text') }}</i>
                    </h2>
                </div>
            </div>
            <div class="col-md-4 col-lg pt-3">
                <div class="ftco-footer-widget mb-6">
                    <h2 class="ftco-heading-2">{{ __('all.footer.contact-info') }}</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><a
                                    href="https://goo.gl/maps/WPjQszZqg55B6w5LA"
                                    target="_blank"
                                ><span class="icon fa fa-map-marker"></span><span
                                        class="text text-white">{{ __('all.top-head.address-direction') }}</span></a>
                            </li>
                            <li><a href="tel:01 230 5213"><span class="icon fa fa-phone"></span><span class="text">+01
                                        -230 5213</span></a></li>
                            <li>
                                <a href="{{ route('contact.index') }}">
                                    <span class="icon fa fa-paper-plane"></span>
                                    <span class="text">office@mti.com.mm</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg pt-3">
                <div class="ftco-footer-widget mb-6">
                    <h2 class="ftco-heading-2">{{ __('all.footer.business-hour') }}</h2>
                    <div class="opening-hours">
                        <h4 class="text-white">{{ __('all.footer.opening-days') }}</h4>
                        <p class="pl-3">
                            <span>{{ __('all.footer.mon-to-fri') }}</span>
                            <span>{{ __('all.footer.sat') }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    © 2019 MTI. All rights reserved. Powered by MTI ( Myanmar Technologies and Investment Corporation
                    Public Co., Ltd. )
                </p>
            </div>
        </div>
    </div>
</footer>
