<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            @if(isset($title))
            {{$title}}
            @endif
            @if(isset($pagedata['title']))
            {{$pagedata['title']}}
            @endif
        </title>
        <!-- Fonts -->
        <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.6/css/lightgallery.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" type="text/css" href="/css/datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" type="text/css" href="/css/loaders.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
        <script
          src="https://code.jquery.com/jquery-3.2.1.min.js"
          integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
          crossorigin="anonymous"></script>
        <script type="text/javascript">
            Pace.on('done', function() {
                $('.loader-overlay').fadeOut();
                $('.content-wrapper').fadeIn();
            });
        </script>
</head>
    <body>
    <div class="loader-overlay"><div class="ball-scale-ripple-multiple t"><div></div><span class="load-text">Please Wait...</span></div></div>
    <div class="content-wrapper">
    <div class="ftft">
    @include('inc.navbar')  
    {{ Breadcrumbs::render('adventures') }}
    <div class="container-fluid">
      <div class="row filter">
      <div class="col-2">
        <div class="select-icon"><i class="fa fa-bandcamp"></i></div>
         <select name="adventure-difficulty" class="reg-select2" id="adventure-difficulty">
          <option value="" disabled selected>Difficulty</option>
          <option value="all">All</option>
          <option value="easy">Easy</option>
          <option value="medium">Moderate</option>
          <option value="hard">Hard</option>
          <option value="extreme">Extreme</option>
        </select>
      </div>
      <div class="col-2">
        <div class="select-icon"><i class="fa fa-bicycle"></i></div>
         <select name="adventure-type" class="reg-select2" id="adventure-type">
          <option value disabled selected>Adventure Type</option>
          <option value="all">All</option>
          <option value="trekking">Trekking</option>
          <option value="day tour">Day Tours</option>
          <option value="canyoneering">Canyoneering</option>
          <option value="scuba diving">Scuba Diving</option>
          <option value="island hopping">Island Hopping</option>
          <option value="whale watching">Whale Watching</option>
          <option value="falls">Falls</option>
          <option value="beach">Beach</option>
        </select>
      </div>
      <div class="col-2">
        <div class="form-icon"><i class="fa fa-calendar-minus-o"></i></div>
        <input type="text" name="text" class="form-control" id="adventure-date" placeholder="Available Date" data-toggle="datepicker"/>
      </div>
  </div>
</div>
</div>
    @yield('content')
    <script src="{{ url('/') }}/AjaxRegister/AjaxRegister.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    @include('inc.registerform')
    @include('inc.loginform')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
    <script type="text/javascript" src="/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="/js/infobubble.js"></script>
    <script type="text/javascript" src="/js/oop/app.js"></script>
    <script type="text/javascript" src="/js/l.js"></script>
    @yield('utils')  
    </body>
</html>
