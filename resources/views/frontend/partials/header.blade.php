<nav class="navbar navbar-expand-lg fixed-top floating-nav">
    <div class="container rounded-4">
        <a
            class="navbar-brand"
            href="#"
        >
            <img
                src="{{ asset('images/mti.png') }}"
                alt="MTI Logo"
                width="200"
            >
        </a>
        <div
            class="offcanvas offcanvas-end text-bg-dark"
            tabindex="-1"
            id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel"
        >
            <div class="offcanvas-header">
                <h5
                    class="offcanvas-title"
                    id="offcanvasNavbarLabel"
                >
                    <img
                        src="{{ asset('images/mti.png') }}"
                        alt="MTI Logo"
                        width="200"
                    >
                </h5>
                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"
                ></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}"
                        >{{ __('header.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ route('about') }}"
                        >{{ __('header.about') }}</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('partners') ? 'active' : '' }}"
                            href="{{ route('partners') }}"
                        >{{ __('header.partners') }}</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}"
                            href="{{ route('products.index') }}"
                        >{{ __('header.services') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{ __('header.investor-relations') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    {{ __('header.corporate-info') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    {{ __('header.financial-report') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    {{ __('header.stock-info') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    {{ __('header.annual-report') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item"
                                    href="#"
                                >
                                    {{ __('header.meeting-minutes') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('careers.*') ? 'active' : '' }}"
                            href="{{ route('careers.index') }}"
                        >{{ __('header.career') }}</a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }}"
                            href="{{ route('contact.index') }}"
                        >{{ __('header.contact') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center gap-2">
            <x-language-dropdown />
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
