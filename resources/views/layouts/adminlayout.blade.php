<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @if(isset($title))
            {{$title}}
            @endif
            @if(isset($data['title']))
            {{$data['title']}}
            @endif
        </title>
        <!-- Fonts -->
        <meta name="description" content="">
        <meta name="robots" content="all,follow">
        <!-- Fonts -->
        <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/fontastic.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" type="text/css" href="/css/lightgallery.css">

        <style>
       
        div.row {
            margin-left: 0px;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        div.col-md-12 {
            padding-bottom: 0px;
            margin-bottom: 0px;
        }
            ul.pagination {
                margin-left: 20px;
            }
            ul.pagination li {
                padding: 5px 10px;
                border: 1px solid rgba(2,1,1,0.1);
            }
            .loading {
                text-align: center;
                width: 100%;
                min-height: 200px;
            }
            .loading img {
                padding-top: 30px;
                height: 60px;
                width: 60px;
            }
        </style>
    </head>
    <body>
    @include('inc.admin.sidenav')
    @yield('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery-wizard.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/formValidation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/charts-home.js') }}"></script>  
    <script type="text/javascript" src="{{ asset('js/front.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.form.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>  
</script>
    @yield('utils')  
    </body>
</html>
