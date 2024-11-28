<div class="dropdown-center">
    <button
        type="button"
        class="btn btn-orange text-white dropdown-toggle d-flex align-items-center gap-2"
        data-bs-toggle="dropdown"
        aria-expanded="false"
    >
        @if (app()->isLocale('en'))
            <img
                src="{{ asset('frontend/images/english_flag.png') }}"
                alt=""
                width="20"
            >
            <span>EN</span>
        @elseif (app()->isLocale('mm'))
            <img
                src="{{ asset('frontend/images/myanmar_flag.png') }}"
                alt=""
                width="20"
            >
            <span>MM</span>
        @endif
    </button>
    <ul class="dropdown-menu">
        <li>
            <a
                class="dropdown-item {{ app()->isLocale('mm') ? 'active' : '' }}"
                href="{{ app()->isLocale('mm') ? '#' : route('language', 'mm') }}"
            >
                <img
                    src="{{ asset('frontend/images/myanmar_flag.png') }}"
                    alt=""
                    width="20"
                >
                <span class="ms-2">Myanmar</span>
            </a>
        </li>
        <li>
            <a
                class="dropdown-item {{ app()->isLocale('en') ? 'active' : '' }}"
                href="{{ app()->isLocale('en') ? '#' : route('language', 'en') }}"
            >
                <img
                    src="{{ asset('frontend/images/english_flag.png') }}"
                    alt=""
                    width="20"
                >
                <span class="ms-2">English</span>
            </a>
        </li>
        <li>
    </ul>
</div>
