<html>
<head>
    <title>@yield('title')</title>
    <link href="{!! asset('css/bootstrap.css') !!}" rel="stylesheet">
    <script src="{!! asset('js/jquery-1.11.3.min.js') !!}"></script>
    
	<link href="{!! asset('/css/roboto.min.css') !!}" rel="stylesheet"> 
    <link href="{!! asset('/css/material.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('/css/ripples.min.css') !!}" rel="stylesheet">
    
    @yield('script')
    
</head>
<body>
    
    @yield('content')
 

<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
 

<script src="/js/ripples.min.js"></script>
<script src="/js/material.min.js"></script>
<script>
    $(document).ready(function() {
        // This command is used to initialize some elements and make them work properly
        $.material.init();
    });
</script>
</body>
</html>