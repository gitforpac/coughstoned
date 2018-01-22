@foreach($v as $i)
<div class="card" data-src="{{$i->video_link}}">
	<a class="lglg" href="#">
         <img src="/storage/video_thumbs/{{$i->video_thumbimg}}" style="width: 100%;height: 250px;">
    </a>
  <div class="demo-gallery-poster">
        <img src="http://sachinchoolur.github.io/lightGallery/static/img/play-button.png">
  </div>
  <a href="#" data-id="{{$i->id}}" class="btn btn-block btn-danger dltvid" id="deletevideobtn">Delete Video</a>
</div>
@endforeach