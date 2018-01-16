@if($v->isEmpty())
<h3>No Videos</h3>
@else
<div class="album text-muted" id="photosga">
<div class="container">
<div class="row lightgallery" id="upds">
	@foreach($v as $i)
<div class="card" data-src="{{$i->video_link}}">
	<a href="#">
         <img src="/storage/video_thumbs/{{$i->video_thumbimg}}" data-id="{{$i->id}}" style="width: 100%;height: 250px;">
    </a>
  <div class="demo-gallery-poster">
        <img src="http://sachinchoolur.github.io/lightGallery/static/img/play-button.png">
    </div>
  <a href="#" class="btn-sm btn-danger dltphoto" id="deletevideobtn">delete Video</a>
</div>
@endforeach 
</div>
</div>
</div>
@endif