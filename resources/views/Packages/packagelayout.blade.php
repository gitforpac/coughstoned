<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{$title}}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/istok-font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/tether.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/lightgallery.css') }}">


    </head>
    <body>
   @include('inc.packagenav')
    <div class="content">
        @yield('content')
    </div>
    @include('inc.registerform')
    @include('inc.loginform')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/infobubble.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/oop/client.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/oop/packages.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/oop/Template.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lightgallery.js') }}"></script>  
    @yield('utils') 
</body>
</html>
