<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >

    <!-- CSRF Token -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name') }} | @yield('title', 'Website')</title>

    <link
        rel="shortcut icon"
        href="{{ asset('dashboard/assets/images/favicon.ico') }}"
        type="image/x-icon"
    >

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    @include('frontend.partials.styles')

    @yield('style')

</head>

<body>

    @include('frontend.partials.loader')

    @yield('content')

    @include('frontend.partials.footer')

    @include('frontend.partials.scripts')

    @yield('script')

</body>

</html>
