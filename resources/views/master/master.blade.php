<!DOCTYPE html>
<html>
<head>
    <!-- Site made with Mobirise Website Builder v1.9.7, http://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v1.9.7, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:700,400&amp;subset=cyrillic,latin,greek,vietnamese">
    <link rel="stylesheet" href="{!! asset('assets/bootstrap/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/mobirise/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/mobirise-slider/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/mobirise/css/mbr-additional.css') !!}" type="text/css">
    <link href="{!! asset('/assets/material_design/css/material.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/assets/material_design/css/ripples.min.css') !!}" rel="stylesheet">
	<link rel="stylesheet" href="{!! asset('assets/course-style/style.css') !!}">
    <style>
        @yield('style')
    </style>

</head>
<body>

@include('master/navbar')
@yield('slider')
@yield('content')
@yield('testimonials')
@yield('clients_logo')

<script src="{!! asset('assets/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js') !!}"></script>
<script src="{!! asset('assets/mobirise/js/script.js') !!}"></script>
<script src="{!! asset('/assets/material_design/js/ripples.min.js') !!}"></script>
<script src="{!! asset('/assets/material_design/js/material.min.js') !!}"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
@yield('script')
</body>
</html>