<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!--<div class="module fixed-bottom bg-danger">-->
    <!--<marquee direction="left" class="text-white">This site is under construction...</marquee>-->
    <!--</div>-->
    @include('partials.top-head')

    @include('partials.nav')
    
    @yield('content')

    @include('partials.footer')

    @include('partials.javascript')

</body>

</html>