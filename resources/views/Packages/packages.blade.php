@extends('layouts.packagelayout')
@section('content')
<div class="container c2">
  <div class="row packages-wrapper">
    <div class="col-8" style="padding: 0px;margin: 0px;">
      <div class="main-packages-wrapper">
        @if($pagedata['packages']->isEmpty())
        <div class="card">
          <div class="card-body">
            No Packages found.
          </div>
        </div>
        @else
      @foreach($pagedata['packages'] as $p)
      @php
      $dur =   explode(" ", $p->duration);
      @endphp
      <div class="package-wrapper">
        <div class="card">
          <div class="duration text-center">
            <span class="num_dur">{{$dur[0]}}</span><br>
            <span class="dur">{{$dur[1]}}</span>
          </div>
          <a href="/adventure/{{$p->pid}}"> <img class="card-img-top" src="/storage/cover_images/{{$p->thumb_img}}"></a>
          <div class="card-body">
            <a href="/adventure/{{$p->id}}"><h5 class="card-title adv-name">{{$p->name}}</h5></a>
             <span class="difficulty-s">From ₱{{number_format($p->price_per)}} </span> per person<br>
            <hr>
            <i class="fa fa-bandcamp" ></i> <span class="difficulty-s"> {{$p->difficulty}}</span> <br>
            <i class="fa fa-compass" ></i> <span class="difficulty-s">{{$p->location}}</span> 
          <a href="/adventure/{{$p->pid}}" class="btn-sm btn-view-adv">View This Adventure</a>
          </div>
        </div>
      </div>
      @endforeach
      </div>
      {{$pagedata['packages']->links()}}
      @endif 
    </div>
    <div class="col-4 map animated fadeIn" id="maps" >
      <div class="form-loading text-center">            
          <i class="fa fa-cog fa-spin fa-3x fa-fw wmap"></i>
        </div>
    </div>
  </div>
</div>
  <footer class="footer2">
      <span class="text-muted" style="margin-left: 20px;">&copy; Philippine Adventure Consultants</span>
  </footer>
@endsection

@section('utils')
<script type="text/javascript" src="/js/datepicker.min.js"></script>
<script type="text/javascript">
  function initMap() {

    Pace.on('done', function() {
        var p = new Packages();
        p.getPackages();   
    });
  }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAf7Sp7l4TuDL-x1MCdF3cCB6vHuc29dU&callback=initMap"
type="text/javascript"></script>

<script type="text/javascript" src="/js/packages.js"></script>

@endsection

