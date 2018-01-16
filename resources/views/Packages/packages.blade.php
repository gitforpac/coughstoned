@extends('layouts.layout')
@section('breadcrumbs')
{{ Breadcrumbs::render('adventures') }}
@endsection
@section('content')
<div class="container-fluid" style="padding-right: 0;margin: 0;">
  <div class="row filter">
      <div class="col-2">
        <div class="select-icon"><i class="fa fa-bandcamp"></i></div>
         <select name="adventure-difficulty" class="reg-select" id="adventure-difficulty">
          <option value="" disabled selected>Difficulty</option>
          <option value="all">All</option>
          <option value="easy">Easy</option>
          <option value="medium">Medium</option>
          <option value="hard">Hard</option>
          <option value="extreme">Extreme</option>
        </select>
      </div>
      <div class="col-2">
        <div class="select-icon"><i class="fa fa-bicycle"></i></div>
         <select name="adventure-type" class="reg-select" id="adventure-type">
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
  <div class="row packages-wrapper">
    <div class="col-8" style="padding: 0px;margin: 0px;">
      <div class="main-packages-wrapper">
      @foreach($pagedata['packages'] as $p)
      @php
      $dur =   explode(" ", $p->duration);
      @endphp
      <div class="package-wrapper">
        <div class="card">
          <div class="duration text-center">
            <span class="num_dur">{{$dur[0]}}</span>
            <span class="dur">{{$dur[1]}}</span>
          </div>
          <a href="/adventure/{{$p->id}}"> <img class="card-img-top" src="/storage/cover_images/{{$p->thumb_img}}"></a>
          <div class="card-body">
            <a href="/adventure/{{$p->id}}"><h5 class="card-title adv-name">{{$p->name}}</h5></a>
            <i class="fa fa-compass" ></i> <span class="location-s">{{$p->location}}</span> <br>
            <hr>
            <i class="fa fa-bandcamp" ></i> <span class="difficulty-s"> {{$p->difficulty}}</span> &nbsp;&nbsp;
            <i class="fa fa-tag"></i> {{$p->price}}
            <a href="/adventure/{{$p->id}}" class="btn-sm btn-view-adv">View This Adventure</a>
          </div>
        </div>
      </div>
      @endforeach
      </div>
      {{$pagedata['packages']->links()}} 
    </div>
    <div class="col-4 map" id="maps" >
     
    </div>
  </div>
</div>

@endsection

@section('utils')
<script type="text/javascript" src="/js/datepicker.min.js"></script>
<script type="text/javascript">
  function initMap() {
    var p = new Packages();
    p.getPackages();
  }
</script>
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf7Sp7l4TuDL-x1MCdF3cCB6vHuc29dU&callback=initMap"
  type="text/javascript"></script>
  
<script type="text/javascript">
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();
  if(dd<10) {
    dd = '0'+dd
  } 

  if(mm<10) {
    mm = '0'+mm
  } 
  today = mm + '/' + dd + '/' + yyyy;
  $(document).ready(function() {
        $(document).on('click', 'ul.pagination a', function (e) {
          var urlParams = new URLSearchParams(window.location.search);
          var url = urlParams.toString();
          $('.main-packages-wrapper').addClass('disabled-div');
            getPosts($(this).attr('href').split('page=')[1],url);
            e.preventDefault();
        });
    });
    function getPosts(page,url=null) {
        $.ajax({
            url : '?'+url+'&page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.loading').hide();
            $('ul.pagination').hide();
            $('.main-packages-wrapper').removeClass('disabled-div');
            $('.main-packages-wrapper').html(data);          
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }

$('[data-toggle="datepicker"]').datepicker({startDate:today});

</script>

<script type="text/javascript">

  var url = '';
  var dateurl = '';
  var difficultyurl = '';
  var adv_typeurl = '';

  $('#adventure-difficulty').change(function (e) {
    e.preventDefault();
    difficultyurl = 'difficulty='+$(this).val();
    console.log(difficultyurl)
    
    if(url !== '' && url.indexOf('difficulty') == -1){
      url += '&'+difficultyurl;
    } else if(url !== '' && difficultyurl !== ''){
      var regEx = /(difficulty)=([^#&]*)/g;
      url = url.replace(regEx, difficultyurl); 
    }
    else {
      url = '?'+difficultyurl;
    }

    var stateObj = { page: 1 };
     window.history.replaceState(stateObj, "Packages", "adventures"+url);
    $('.main-packages-wrapper').addClass('disabled-div');
    $.get( "/adventures"+url, function( data ) {
      $('ul.pagination').hide();
      $('.main-packages-wrapper').removeClass('disabled-div'); 
      $('.main-packages-wrapper').html(data);
     
    });
  });

  $('#adventure-type').change(function (e) {
    e.preventDefault();
    adv_typeurl = 'type='+$(this).val();
    console.log(adv_typeurl)
    
    if(url !== '' && url.indexOf('type') == -1){
      url += '&'+adv_typeurl;
    } else if(url !== '' && adv_typeurl !== ''){
      var regEx = /(type)=([^#&]*)/g;
      url = url.replace(regEx, adv_typeurl); 
    }
    else {
      url = '?'+adv_typeurl;
    }

    var stateObj = { page: 2 };
     window.history.replaceState(stateObj, "AdventureType", "adventures"+url);
    $('.main-packages-wrapper').addClass('disabled-div');
    $.get( "/adventures"+url, function( data ) {
      $('ul.pagination').hide();
      $('.main-packages-wrapper').removeClass('disabled-div'); 
      $('.main-packages-wrapper').html(data);
     
    });
  });

  $('#adventure-date').on('input',function (e) {
    e.preventDefault();
    $('[data-toggle="datepicker"]').datepicker('hide');
    dateurl = 'date='+$(this).val();
    
    if(url !== '' && url.indexOf('date') == -1){
      url += '&'+dateurl;
    } else if(url !== '' && dateurl !== ''){
      var regEx = /(date)=([^#&]*)/g;
      url = url.replace(regEx, dateurl); 
    }
    else {
      url = '?'+dateurl;
    }

    var stateObj = { page: 3 };
     window.history.replaceState(stateObj, "AdventureDate", "adventures"+url);
    $('.main-packages-wrapper').addClass('disabled-div');
    $.get( "/adventures"+url, function( data ) {
      $('ul.pagination').hide();
      $('.main-packages-wrapper').removeClass('disabled-div'); 
      $('.main-packages-wrapper').html(data);
     
    });
  });

window.onpopstate = function() {
      window.history.go(0);
  }
</script>

@endsection

