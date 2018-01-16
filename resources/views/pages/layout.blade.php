<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
           Pages
        </title>
        <!-- Fonts -->
        <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/tether.min.css">
        <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="/css/lightgallery.css">
        <link rel="stylesheet" type="text/css" href="/css/animate.css">
        <link rel="stylesheet" type="text/css" href="/css/datepicker.min.css">
    </head>
    <body>
    @include('inc.navbar')  
    @yield('breadcrumbs')
    @yield('content')
    @include('inc.footer')
    @include('inc.registerform')
    @include('inc.loginform')
    <script src="/js/jquery.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/axios.min.js"></script>
    <script type="text/javascript" src="/js/infobubble.js"></script>
    <script type="text/javascript" src="/js/oop/client.js"></script>
    <script type="text/javascript" src="/js/oop/packages.js"></script>
    <script type="text/javascript" src="/js/oop/Template.js"></script>
    @yield('utils')  
    </body>
</html>
