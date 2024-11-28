<meta charset="utf-8">
<title>
    {{ trans('global.global_title') }}
</title>

<meta
    http-equiv="X-UA-Compatible"
    content="IE=edge"
>
<meta
    content="width=device-width, initial-scale=1.0"
    name="viewport"
/>
<meta
    http-equiv="Content-type"
    content="text/html; charset=utf-8"
>
<meta
    name="csrf-token"
    content="{{ csrf_token() }}"
>
<link
    rel="icon"
    href="{{ asset('images/mti_logo_icon.png') }}"
    type="image/x-icon"
>
<!-- Tell the browser to be responsive to screen width -->
<meta
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    name="viewport"
>
<!-- Ionicons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link
    href="{{ url('admin/adminlte/bootstrap/css/bootstrap.min.css') }}"
    rel="stylesheet"
>
<link
    rel="stylesheet"
    href="{{ url('admin/adminlte/css') }}/select2.min.css"
/>
<link
    href="{{ url('admin/adminlte/css/AdminLTE.min.css') }}"
    rel="stylesheet"
>
<link
    href="{{ url('admin/adminlte/css/skins/skin-blue.min.css') }}"
    rel="stylesheet"
>
<link
    rel="stylesheet"
    href="{{ url('admin/css/jquery-ui.css') }}"
>
<link
    rel="stylesheet"
    href="{{ url('admin/css/jquery.dataTables.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ url('admin/css/select.dataTables.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ url('admin/css/buttons.dataTables.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ url('admin/css/jquery-ui-timepicker-addon.min.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ url('admin/css/jquery-ui-timepicker-addon.css') }}"
/>
<link
    rel="stylesheet"
    href="{{ url('admin/css/jquery-ui-timepicker-addon.css') }}"
/>
<link
    href="{{ asset('summernote-0.8.18-dist/summernote-bs4.min.css') }}"
    rel="stylesheet"
>
<link
    rel="stylesheet"
    href="{{ asset('admin/css/custom.css') }}"
>
<!-- Fine Uploader New/Modern CSS file
    ====================================================================== -->
<link
    href="{{ asset('admin/plugin/fine-uploader/fine-uploader-new.css') }}"
    rel="stylesheet"
>

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
/>
<style>
    .login_bg {
        background: #00a65a;
    }

    .datatable thead tr th {
        text-align: center;
    }

    .datatable tbody tr td {
        text-align: center;
    }

    .danger {
        color: red;
    }

    .invalid {
        border: 2px solid red;
        color: red;
    }

    .no-js #loader {
        display: none;
    }

    .js #loader {
        display: block;
        position: absolute;
        left: 100px;
        top: 0;
    }

    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        opacity: 0.6;
        background: url('{{ url('images/loader.svg') }}') center whitesmoke;
        background-repeat: no-repeat;
    }
</style>
@yield('style')
