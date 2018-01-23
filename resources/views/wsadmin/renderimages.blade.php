@foreach($images as $i)
<div class="card">
  <img src="/storage/images/{{$i->imagename}}" data-id="{{$i->id}}"><a href="#" class="btn btn-block btn-danger dltphoto" id="deletephotobtn">Delete photo</a>
</div>
@endforeach 