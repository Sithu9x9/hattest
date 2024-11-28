@props(['isTransparent' => false])

<nav class="navbar navbar-expand-lg fixed-top {{ $isTransparent ? 'floating-nav' : 'bg-primary' }}">
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
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                            {{ __('header.corporate-profile') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('about') ? 'active' : '' }}"
                                    href="{{ route('about') }}"
                                >
                                    {{ __('header.about-mti') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('organization-structure') ? 'active' : '' }}"
                                    href="{{ route('organization-structure') }}"
                                >
                                    {{ __('header.organization-structure') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('corporate-policy') ? 'active' : '' }}"
                                    href="{{ route('corporate-policy') }}"
                                >
                                    {{ __('header.corporate-policy') }}
                                </a>
                            </li>
                        </ul>
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
                                    class="dropdown-item {{ request()->routeIs('corporate-information.index') ? 'active' : '' }}"
                                    href="{{ route('corporate-information.index') }}"
                                >
                                    {{ __('header.corporate-info') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('stock-information.index') ? 'active' : '' }}"
                                    href="{{ route('stock-information.index') }}"
                                >
                                    {{ __('header.stock-info') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('activities.index') ? 'active' : '' }}"
                                    href="{{ route('activities.index') }}"
                                >
                                    {{ __('header.activities') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('financial-reports.index') ? 'active' : '' }}"
                                    href="{{ route('financial-reports.index') }}"
                                >
                                    {{ __('header.financial-report') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('annual-reports.index') ? 'active' : '' }}"
                                    href="{{ route('annual-reports.index') }}"
                                >
                                    {{ __('header.annual-report') }}
                                </a>
                            </li>
                            <li>
                                <a
                                    class="dropdown-item {{ request()->routeIs('meeting-minutes.index') ? 'active' : '' }}"
                                    href="{{ route('meeting-minutes.index') }}"
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
