<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Philippine Adventure Consultatns</title>
    <!-- Fonts -->
    <link rel="shortcut icon" href="{{asset('img/pac_logo_icon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Kalam:700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
</head>
<body>
    <div class="v-header v-container">
     @include('inc.indexnav')
      <div class="full-screen">
        <video src="/vids/teaser.mp4" autoplay="" muted></video>
        <div class="overlay">
        </div>
      </div>

      <div class="header-text">
        <h1 class="display-4 f">Adventure is worthwhile </h1>
        <p class="lead">Experience Cebu Like Never Before!</p>
        <a class="explore">Explore</a>
      </div>
    </div>
    <h5 class="featured-header text-center">Featured</h5>
    <p class="text-center">So, where to next?</p>
    <section class="container-fluid featured">
    <div class="prev"><i class="fa fa-angle-left"></i></div> 
    <div class="next"><i class="fa fa-angle-right"></i></div> 
    <div class="row f-items">
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">12</span>
                    <span class="dur">dayys</span>
                  </div>
                  <a href="/adventure/1"> <img class="card-img-top" src="/img/bg.jpg"></a>
                  <div class="card-body">
                    <a href="/adventure/1"><h5 class="card-title adv-name">asds</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">asdasd</span> <br>
                    <i class="fa fa-tag"></i> 23213
                    <a href="/adventure/1" class="btn-sm btn-view-adv">View This Adventure</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">12</span>
                    <span class="dur">dayys</span>
                  </div>
                  <a href="/adventure/1"> <img class="card-img-top" src="/img/bg.jpg"></a>
                  <div class="card-body">
                    <a href="/adventure/1"><h5 class="card-title adv-name">Adventure Name</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">asdasd</span> <br>
                    <i class="fa fa-tag"></i> 23213
                    <a href="/adventure/1" class="btn-sm btn-view-adv">View This Adventure</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">12</span>
                    <span class="dur">dayys</span>
                  </div>
                  <a href="/adventure/1"> <img class="card-img-top" src="/img/bg.jpg"></a>
                  <div class="card-body">
                    <a href="/adventure/1"><h5 class="card-title adv-name">asds</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">asdasd</span> <br>
                    <i class="fa fa-tag"></i> 23213
                    <a href="/adventure/1" class="btn-sm btn-view-adv">View This Adventure</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">12</span>
                    <span class="dur">dayys</span>
                  </div>
                  <a href="/adventure/1"> <img class="card-img-top" src="/img/bg.jpg"></a>
                  <div class="card-body">
                    <a href="/adventure/1"><h5 class="card-title adv-name">asds</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">asdasd</span> <br>
                    <i class="fa fa-tag"></i> 23213
                    <a href="/adventure/1" class="btn-sm btn-view-adv">View This Adventure</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">12</span>
                    <span class="dur">dayys</span>
                  </div>
                  <a href="/adventure/1"> <img class="card-img-top" src="/img/bg.jpg"></a>
                  <div class="card-body">
                    <a href="/adventure/1"><h5 class="card-title adv-name">asds</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">asdasd</span> <br>
                    <i class="fa fa-tag"></i> 23213
                    <a href="/adventure/1" class="btn-sm btn-view-adv">View This Adventure</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="package-wrapper">
                <div class="card">
                  <div class="duration text-center">
                    <span class="num_dur">12</span>
                    <span class="dur">dayys</span>
                  </div>
                  <a href="/adventure/1"> <img class="card-img-top" src="/img/bg.jpg"></a>
                  <div class="card-body">
                    <a href="/adventure/1"><h5 class="card-title adv-name">asds</h5></a>
                    <i class="fa fa-compass" ></i> <span class="location-s">asdasd</span> <br>
                    <i class="fa fa-tag"></i> 23213
                    <a href="/adventure/1" class="btn-sm btn-view-adv">View This Adventure</a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <a href="#" class="btn btn-info view-all">View All </a>
        </div>
        </div>
    </div>
    </section>

<div class="container">
<div class="col-md-12">
<div class="row">
<hr>

    <div class="gal">
    
    <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">
    
        <img src="https://preview.ibb.co/mWpE3Q/2.jpg" alt="">
        
    <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">
    
    <img src="https://preview.ibb.co/mysOxk/3.jpg" alt="">
    
    

    <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">
        <img src="https://preview.ibb.co/mWpE3Q/2.jpg" alt="">
    
    <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">
    
                
    </div>
    
</div>
</div>
</div>






    @include('inc.footer')
    <script src="/js/jquery.js"></script>
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

      $(function(){
         $('.grid').masonry({
            itemSelector: '.grid-item',
            columnWidth: 0
          });
      })
    </script>
</body>
</html>