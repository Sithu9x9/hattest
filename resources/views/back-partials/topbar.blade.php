<header class="main-header">
    <!-- Logo -->
    <a
        href="{{ url('/admin/dashboard') }}"
        class="logo"
        style="font-size: 16px;"
    >
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            <img
                src="{{ url('images/mti_logo_icon.png') }}"
                width="50"
                alt=""
            > @lang('global.global_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
            <img
                src="{{ url('images/mti_logo_icon.png') }}"
                width="50"
                alt=""
            > @lang('global.global_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a
            href="#"
            class="sidebar-toggle"
            data-toggle="offcanvas"
            role="button"
        >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
    </nav>
</header>
