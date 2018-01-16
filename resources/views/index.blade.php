@extends('layouts.layout')
@section('content')
<div class="container">
  <div class="h-header">PAC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
  <i class="fa fa-search" aria-hidden="true"></i><input type="text" name="location" class="h-input" placeholder="Where do you want to go?" autofocus>
  <div class="jumbotron nb">
    <h1>I'm Going On An Adventure!</h1>      
    <h1 class="h-header2">Select Adventures From Different Parts of Cebu</h1>   
  </div>
</div>
<div class="container-fluid n">
<div class="select-city">
  <div class="city text-center">
    <a href="#"><img src="{{ asset('img/moalboal.jpg') }}"></a>
    <span class="city-header">Moalboal</span>
  </div>
   <div class="city">
    <a href="#"><img src="{{ asset('') }}"></a>
    <span class="city-header">Osmena Peak</span>
  </div>
   <div class="city">
    <a href="#"><img src="{{ asset('') }}"></a>
    <span class="city-header">Badian</span>
  </div>
   <div class="city">
  </div>
   <div class="city">
  </div>
   <div class="city">
  </div>
   <div class="city">
  </div> <div class="city">
  </div>
   <div class="city">
  </div>
</div>
</div>

<script type="text/javascript">
  $(".select-city").draggable({ 
    cursor: "pointer", 
    containment: "#main-wrapper",
    axis: "x",
    drag: function(event, obj){
            if(obj.position.left > 20){
               obj.position.left = 20;
            }
            if(obj.position.left < -2400) {
              obj.position.left = -2400;
            }
        },
});
</script>
@endsection