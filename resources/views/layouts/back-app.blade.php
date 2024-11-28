<!DOCTYPE html>
<html lang="en">

<head>
    @include('back-partials.head')
</head>

{{-- Toastr --}}
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
        font-family: "Poppins", sans-serif !important;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    span {
        font-family: "Poppins", sans-serif !important;
    }

    label {
        font-weight: 600 !important;
    }
</style>

<body
    class="skin-blue fixed"
    data-spy="scroll"
    data-target="#scrollspy"
>
    <div class="se-pre-con"></div>
    <div id="wrapper">
        @include('back-partials.topbar')
        @include('back-partials.sidebar')
        @include('back-partials.custom-file-upload')


        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                @if (isset($siteTitle))
                    <h3 class="page-title">
                        {{ $siteTitle }}
                    </h3>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
    </div>

    {!! Form::open(['route' => 'logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
    <button type="submit">Logout</button>
    {!! Form::close() !!}

    @include('back-partials.javascripts')

    {{-- Toastr --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": 5000,
            "preventDuplicates": true
        }

        @if (Session::has('error'))
            toastr.error('{{ session('error') }}');
        @elseif (Session::has('success'))
            toastr.success('{{ session('success') }}');
        @endif
    </script>
</body>

</html>
