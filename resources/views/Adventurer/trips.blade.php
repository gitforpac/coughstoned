@extends('layouts.layout')
@section('content')
<div class="container mhmh">
@if($data->isEmpty())
<h5 class="select-adv">Select Your Adventure!</h5>
<a href="/adventures" class="btn-lg bgws text-white">Find Adventure</a>
@else
@foreach($data as $d)
<div class="row">
<div class="col-md-8 col-sm-12">
  <div class="card n612">
	  <h5 class="card-header bsf text-white"><i class="fa fa-check-circle-o" aria-hidden="true"></i>&nbsp;Booking Confirmed</h5>
	  <div class="card-body">
	    <div class="row">
	    	<div class="col-md-4">
	    		<img src="/storage/cover_images/{{$d->thumb_img}}" style="width: 100%;height: 180px;border-radius: 2px;">
	    	</div>
	    	<div class="col-md-8">
	    		<h5 class="bh">{{$d->name}}</h5>
	    		<p><i class="fa fa-calendar" aria-hidden="true"></i> {{date('M d, Y, D', strtotime($d->date))}}</p>
	    		<p><i class="fa fa-user-o" aria-hidden="true"></i> {{$d->num_guest}} Adventurer(s)</p>
	    		<p><i class="fa fa-ban" aria-hidden="true"></i> &nbsp;<a href="#" id="cancelbkbtn" data-id="{{$d->id}}">Cancel</a></p>
	    	</div>
	    </div>
	  </div>
	</div>
	</div>
</div>
@endforeach
@endif
</div>
@endsection
@section('utils')
<script type="text/javascript">
	$(document).on('click', '#cancelbkbtn', function(e){
		var bkid = $(this).data('id');
		var is = $(this).parent().parent().parent().parent().parent();

		console.log(is)
		e.preventDefault();

		$.confirm({
	    title: 'Cancel Booking',
	    content: 'Are you sure you want to Cancel This Booking?',
	    buttons: {
	        confirm: {
	            btnClass: 'btn-green',
	            action: function () {
	            var _token = $('meta[name="csrf-token"]').attr('content');
	            $.ajax({
	              type: "POST",
	              url: '/cancelbooking/'+bkid,
	              data: {_token : _token },
	              success: function(response) {
	              		if(response.success == true) {
		              			$.alert({
				                		title: 'Booking Cancelled',
									    content: 'You have cancelled a booking',
									    type: 'green',
									    typeAnimated: true,
				                	})
			      
			                	is.remove();
			                } else {
			                	$.alert({
			                		title: 'Encountered an error!',
								    content: 'There was an error cancelling',
								    type: 'red',
								    typeAnimated: true,
			                	})
			                }
	              },
	              error: function() {
	              	alert('Ops, Something Went wrong, Please try again')
	              },
	              dataType: "json",
	            }); 
	        }
	        },
	        cancel:  {
	           btnClass: 'btn-red'
	        },     
	    }
	});

	})
</script>
@endsection

