@foreach($images as $i)
	<div class="card">
      <img src="/storage/images/{{$i->imagename}}" data-id="{{$i->id}}"><a href="#" class="btn-sm btn-danger dltphoto" id="deletephotobtn">Delete photo</a>
    </div>
@endforeach	