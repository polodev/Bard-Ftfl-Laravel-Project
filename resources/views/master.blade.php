<!DOCTYPE html>
<html>
  <head>
    <title> @yield('title') </title>

    <link href="{!! asset('/css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Include roboto.css to use the Roboto web font, material.css to include the theme and ripples.css to style the ripple effect -->
    <link href="{!! asset('/css/roboto.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/material.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/ripples.min.css') !!}" rel="stylesheet">


  </head>
  <body>
    @include('shared.navbar')
    @yield('content')

    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{!! asset('/js/bootstrap.min.js') !!}"></script>

    <script src="{!! asset('/js/ripples.min.js') !!}"></script>
    <script src="{!! asset('/js/material.min.js') !!}"></script>
    <script>
        $(document).ready(function() {
            // This command is used to initialize some elements and make them work properly
            $.material.init();
        });
    </script>       
      
  </body>
</html>
