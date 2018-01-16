@foreach($images as $i)
	<div class="grid-item"><img class="img-responsive" src="/storage/images/{{$i->imagename}}" data-id="{{$i->id}}"><a href="#" class="dltphoto" id="deletephotobtn">Delete photo</a></div>
@endforeach	