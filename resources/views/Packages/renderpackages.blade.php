@if($packages->isEmpty())
<div class="card">
  <div class="card-body">
    No Packages found.
  </div>
</div>
@else
@foreach($packages as $p)
@php
$dur =   explode(" ", $p->duration);
@endphp
<div class="package-wrapper animated fadeIn">
  <div class="card">
    <div class="duration text-center">
      <span class="num_dur">{{$dur[0]}}</span><br>
      <span class="dur">{{$dur[1]}}</span>
    </div>
    <a href="/adventure/{{$p->pid}}"><img class="card-img-top" src="/storage/cover_images/{{$p->thumb_img}}"></a>
    <div class="card-body">
      <a href="/adventure/{{$p->id}}"><h5 class="card-title adv-name">{{$p->name}}</h5></a>
      <span class="difficulty-s">From ₱{{number_format($p->price_per)}} </span> per person<br>
      <hr>
      <i class="fa fa-bandcamp" ></i> <span class="difficulty-s"> {{$p->difficulty}}</span><br>
      <i class="fa fa-compass" ></i> <span class="difficulty-s">{{$p->location}}</span> <br>
      <a href="/adventure/{{$p->id}}" class="btn-sm btn-view-adv">View This Adventure</a>
    </div>
  </div>
</div>
@endforeach
{{$packages->links()}} 
@endif