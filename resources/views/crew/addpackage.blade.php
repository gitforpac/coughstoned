@extends('layouts.adminlayout')
@section('content')
<div class="page home-page">
	@include('inc.admin.nav')
  <div class="container">
    <div class="card">
      <div class="card-body">
        Add Package
      </div>
    </div>
    <form class="form-horizontal" id="basic-details" method="post" action="/addpackage"  enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group row">
            <label class="col-sm-2">Package Name</label>
            <div class="col-md-8">
              <input name="package_name" type="text" placeholder="Name of Adventure" class="form-control form-control-success"required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2">Location</label>
            <div class="col-md-8">
              <input name="package_location" type="text" placeholder="Where will the Adventure take place?" class="form-control" required>
            </div>
          </div>

          <div class="form-group row" style="margin-top: 20px;">
               <label class="col-sm-2">Duration</label>
               <div class="col-md-4">
                  <select class="form-control" id="package_durnum" name="package_durnum" required="">
                    <@for($i=1;$i<=32;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
                <div class="col-md-4">
                  <select class="form-control" id="package_dur" name="package_dur" required="">
                    <option value="Hours">Hours</option>
                    <option value="Days">Days</option>
                    <option value="Months">Months</option>
                  </select>
                </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-2">Price in Peso</label>
            <div class="col-md-8">
              <input name="package_price" type="text" placeholder="How much is this Adventure?" class="form-control" required>
              <small id="price-error"></small>
            </div>
          </div>

            <div class="form-group row" style="margin-top: 20px;">
               <label class="col-sm-2">Adventure Type</label>
               <div class="col-md-8">
                  <select class="form-control" id="package_type" name="package_type" required="">
                    <option disabled selected>Adventure Type</option>
                    <option value="Trekking">Trekking</option>
                    <option value="Canyoneering">Canyoneering</option>
                    <option value="Day Tour">Day Tour</option>
                    <option value="Falls">Falls</option>
                    <option value="Parasailing">Parasailing</option>
                  </select>
                </div>
            </div>

            <div class="form-group row" style="margin-top: 20px;">
               <label class="col-sm-2">Max Adventurers</label>
               <div class="col-md-8">
                  <select class="form-control" id="package_limit" name="package_limit" required="">
                    <option disabled selected>Number of Max Adventurers for this package</option>
                    <@for($i=1;$i<=32;$i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
            </div>

          <div class="form-group row">
            <label class="col-sm-2">Difficulty</label>
            <div class="col-md-6">
               <label class="form-check-label">
          <input class="form-check-input" type="radio" name="package_difficulty" id="df1" value="easy" checked>
          Easy
        </label>
               <label class="form-check-label">
          <input class="form-check-input" type="radio" name="package_difficulty" id="df2" value="medium">
          Medium
        </label>
              <label class="form-check-label">
          <input class="form-check-input" type="radio" name="package_difficulty" id="df3" value="hard">
          Hard
        </label>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2">Introduction</label>
            <div class="col-md-8">
              <textarea class="form-control" name="package_dsc" rows="3" placeholder="Introduction or Overview of this Adventure" required></textarea>
            </div>
          </div> 
          <div class="form-group row">
            <label class="col-sm-2">Cover Photo</label>
              <input type="file" name="package_image" style="margin-left: 15px;" />
          </div>   
          <div class="form-group row">
            <label class="col-sm-2">Pinpoint Location in the Map</label>
            <input type="hidden" name="latitude">
            <input type="hidden" name="longitude">
            <div class="col-sm-8" id="amap">     
            </div>
          </div>
          <div class="form-group row">       
              <input type="submit" name="submit" value="Create" class="btn btn-primary" style="float:right;margin-right: 180px;">
            </div>
          </div>
        </form>
  </div>
  
</div>
@endsection

@section('utils')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
 <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf7Sp7l4TuDL-x1MCdF3cCB6vHuc29dU&callback=initMap"
  type="text/javascript"></script>
<script>
function initMap(){

  var options = {
    zoom : 8,
    center:{lat: 10.3157, lng: 123.8854}
  }

  var map = new google.maps.Map(document.getElementById('amap'), options);

marker = null;

google.maps.event.addListener(map,'click',function(event){
  if(marker) {
   marker.setMap(null);
   marker = null;
   marker = addMarker({coords: event.latLng});
  }else {
    marker = addMarker({coords: event.latLng});

  }

  $('input[name="latitude"]').val(event.latLng.lat());
  $('input[name="longitude"]').val(event.latLng.lng());
  console.log('lat '+event.latLng.lat()+' lng:' + event.latLng.lng());
})



  function addMarker(props){
    var marker = new google.maps.Marker({
    position:props.coords,
    map:map,
    });
    return marker;
    
  } 
}

</script>
 <script>
    $('textarea').ckeditor();
</script>
@endsection