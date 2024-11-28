<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $filename }}</title>

        <!-- Styles -->
        <style>
            html, body {
                height: 100vh;
                overflow: hidden;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <iframe src ="{{ url('/public'.$file) }}" width="100%" height="100%"></iframe>
    </body>
</html>
