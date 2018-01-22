<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Philippine Adventure Consultants</title>
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="/css/loaders.css">
    <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Kalam:700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-minimal.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <script type="text/javascript">
        Pace.on('done', function() {
          setTimeout(function(){ 
            $('.loader-overlay').fadeOut();
            $('.content-wrapper').fadeIn();
          }, 500);
            
        });
    </script>
        
</head>
<body>
  <div class="loader-overlay">
    <div class="ball-scale-ripple-multiple t">
      <div></div>
      <span class="load-text">Please Wait...</span>
    </div>
</div>
<div class="content-wrapper">
    <div class="v-header v-container">
     @include('inc.indexnav')
      <div class="full-screen">
        <video src="/vids/teaser.mp4" autoplay="" muted loop=""></video>
        <div class="overlay">
        </div>
      </div>

      <div class="header-text">
        <h1 class="display-4 f">Adventure is worthwhile </h1>
        <p class="lead">Experience Cebu Like Never Before!</p>
        <a class="explore">Explore</a>
      </div>
      <div class="overlay">
        </div>
    </div>

    <h5 class="featured-header text-center">Featured</h5>
    <p class="text-center">So, where to next?</p>
    <section class="container-fluid featured">
    <div class="prev"><i class="fa fa-angle-left"></i></div> 
    <div class="next"><i class="fa fa-angle-right"></i></div> 
    <div class="row f-items">
      @foreach($data as $p)
      @php
      $dur =   explode(" ", $p->duration);
      @endphp
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">{{$dur[0]}}</span>
                    <span class="dur">{{$dur[1]}}</span>
                  </div>
                  <a href="/adventure/{{$p->pid}}"> <img class="card-img-top" src="/storage/cover_images/{{$p->thumb_img}}"></a>
                  <div class="card-body">
                    <a href="/adventure/1"><h5 class="card-title adv-name">{{$p->name}}</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">{{$p->location}}</span> <br>
                    <i class="fa fa-tag"></i> {{$p->price_per}}
                    <a href="/adventure/1" class="btn-sm btn-view-adv">View This Adventure</a>
                  </div>
                </div>
              </div>
        </div>
        @endforeach
        <div class="col-md-4">
            <a href="/adventures" class="btn btn-info view-all">View All </a>
        </div>
        </div>
    </section>

    <div class="container-fluid">
    <header class="featured2"><h3>Go discover Cebu with us</h3></header>
    <div class="row" id="fp">   
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/1s.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Oslob Diving</h4>
            <a href="#" style="color:white;"><h5>View Details</h5></a>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/2s.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Talamban Trekking</h4>
            <a href="#" style="color:white;"><h5>View Details</h5></a>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/3s.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Badian Falls</h4>
            <a href="#" style="color:white;"><h5>View Details</h5></a>        
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="fp">   
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/4s.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Mountaineering</h4>
            <a href="#" style="color:white;"><h5>View Details</h5></a>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/5s.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Cave Exploration</h4>
            <a href="#" style="color:white;"><h5>View Details</h5></a>        
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="pwr" style="background: url('/img/6s.jpg');background-size: cover;background-repeat: no-repeat;background-position: center;">
          <div class="title">
            <h4 class="title-s">Canyoneering</h4>
            <a href="#" style="color:white;"><h5>View Details</h5></a>        
          </div>
        </div>
      </div>
    </div>
  </div>

    <h5 class="featured-header text-center">Why Book With Us?</h5><br>
    <section id="whyus">
      <div class="container">
        <div class="row">
          <div class="col-sm" style="padding-left: 0px;padding-right: 40px;margin-right: 10px;">
            <h5>BEST PRICE AND VALUE</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
          </div>
          <div class="col-sm">
            <h5>WE VALUE SAFETY</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
          </div>
          <div class="col-sm">
            <h5>SUPERIOR CUSTOMER SERVICE</h5>
            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="container-fluid text-center as">
        <h3>Need help in your itinerary?</h3>
        <p>Email or call us to speak to one of our advisors who will help you with all of your holiday needs.</p>
        <p><strong>Office Hours:</strong> 8:00AM – 5PM (Monday-Saturday)</p>
        <p><strong>Mobile Sun:</strong> +63-933-855-6793 or +63-925-548-8687 (Viber)</p>
        <p><strong>Mobile Globe:</strong> +63-915-138-2988</p>
        <p><strong>Email us:</strong> info@pacadventures.com</p>
      </div>
    </section>
  @include('inc.registerform')
  @include('inc.loginform')
  </div>
    <script src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/jquery.form.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script type="text/javascript" src="/js/l.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(".f-items").draggable({ 
        cursor: "pointer", 
        containment: "#main-wrapper",
        axis: "x",
        drag: function(event, obj){
                if(obj.position.left >= 30){
                   obj.position.left = 30;
                }
                if(obj.position.left < -1200) {
                  obj.position.left = -1200;
                }
            },
    });

      $('.prev').click(function(e){
         var pos = $('.f-items').offset();
         if(pos.left <= 200) {
            $('.f-items').animate({
                left: pos.left + 200,
             }, 300);
         }
      })

      $('div.next').click(function(e){
         var pos = $('.f-items').offset();
            if(pos.left > -1200) {
                $('.f-items').animate({
                    left: pos.left + -200,
                }, 300);
            }
        
      })

    </script>
</body>
</html>