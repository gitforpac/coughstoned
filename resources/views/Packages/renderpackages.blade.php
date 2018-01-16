@if($packages->isEmpty())
<h5>No Package(s) found</h5>

@else
@foreach($packages as $p)
<div class="package-wrapper animated fadeIn">
  <div class="card">
    <a href="/adventure/{{$p->id}}"><img class="card-img-top" src="/storage/cover_images/{{$p->thumb_img}}"></a>
    <div class="card-body">
      <a href="/adventure/{{$p->id}}"><h5 class="card-title adv-name">{{$p->name}}</h5></a>
      <i class="fa fa-compass" ></i> <span class="location-s">{{$p->location}}</span> <br>
      <hr>
      <i class="fa fa-bandcamp" ></i> <span class="difficulty-s"> {{$p->difficulty}}</span>&nbsp;&nbsp;
      <i class="fa fa-tag"></i> {{$p->price}}

    </div>
  </div>
</div>
@endforeach
{{$packages->links()}} 
@endif