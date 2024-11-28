@inject('request', 'Illuminate\Http\Request')
<nav
    class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light sticky-top"
    id="ftco-navbar"
>
    <div class="container">

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#ftco-nav"
            aria-controls="ftco-nav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="fa fa-bars"></span> Menu
        </button>
        <form
            action="#"
            class="searchform order-lg-last"
        >
            <div class="form-group d-flex">
                <!-- <input type="text" class="form-control pl-3" placeholder="Search"> -->
                <!-- <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button> -->
            </div>
        </form>
        <div
            class="collapse navbar-collapse"
            id="ftco-nav"
        >
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a
                        href="{{ url('/') }}"
                        class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }}"
                    >{{ __('all.nav.home') }}</a>
                </li>
                <li
                    class="nav-item dropdown"
                    id="corporate"
                >

                </li>
                <li
                    class="nav-item dropdown"
                    id="partners"
                >

                </li>
                <li class="nav-item {{ $request->segment(1) == 'products' ? 'active' : '' }}">
                    <a
                        href="{{ route('products.index') }}"
                        class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }}"
                    >
                        Our Products
                    </a>
                </li>
                <li
                    class="nav-item dropdown"
                    id="investor"
                >

                </li>
                {{-- <li class="nav-item dropdown" id="activity">

                </li> --}}
                <li class="nav-item {{ $request->segment(1) == 'career' ? 'active' : '' }}"><a
                        href="{{ route('career') }}"
                        class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }}"
                    >{{ __('all.nav.career') }}</a></li>
                <li class="nav-item {{ request()->is('contact_us') ? 'active' : '' }}"><a
                        href="{{ route('contact.index') }}"
                        class="nav-link {{ session('locale') == 'en' ? 'nav-link-style' : '' }}"
                    >{{ __('all.nav.contact') }}</a></li>
                <li
                    class="nav-item dropdown"
                    id="language"
                >

                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
