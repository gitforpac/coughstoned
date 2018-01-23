@extends('layouts.layout')
@section('content')
<div class="container cm">
	<div class="row">
		<div class="col-md-3" style="padding: 0;">
			<div class="avatar-wrapper text-center">
				<span class="avatar">
					<img class="img-responsive user-avatar" src="/storage/user_avatars/{{$data->avatar}}">
				</span>
				@if(Auth::guard('user')->check())
				<div class="overlay">
					<form method="post" action="/changeavatar" id="avatarform" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="col cb text-white user-u-b">
							<input type="file" name="user-avatar" class="form-control"><i class="fa fa-camera" aria-hidden="true"></i> &nbsp;Upload
						</div>
					</form>
				</div>
				@endif
			</div>
			<div class="card points">
			  <div class="card-body">
			    <h5 class="card-title">User Info</h5>
			    <h6 class="card-subtitle mb-2 text-muted">Latagaw Points: <small>0</small></h6>
			    <h6 class="card-subtitle mb-2 text-muted">Booked Times: <small>0</small></h6>
			  </div>
			</div>
		</div>
		<div class="col-md-8" style="padding-left: 30px;">
			<div class="user-info">
				<h5 class="user-name">I'm {{$data->name}}</h5>
				<strong class="user-info-location">From Cebu, Philippines Joined June 2017</strong>
			</div>
			<div class="user-about-info">
				<h5 class="pd-h">About User</h5>
				qweqweqweqwewqeqeqwewq
			</div>
		</div>
	</div>
</div>
@endsection

@section('utils')
<script type="text/javascript" src="{{ asset('js/jquery.form.min.js') }}"></script>
<script type="text/javascript">
	@if(Auth::guard('user')->check())
	var n = new Client();
	$('input[name="user-avatar"]').change(function(){
		var f = document.getElementById("avatarform");
		var fd = new FormData(f);
		$.ajaxSetup({
	      headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	    });

	    $.ajax({
	      type: "POST",
	      url: '/changeavatar',
	      data: fd,
	      success: function(data) {
	      	$('span.avatar').html('<img class="img-responsive user-avatar" src="/storage/user_avatars/'+data.avatar+'">')
	      },
	      contentType: false,
	      processData: false,
	      dataType: 'json'

		});
	});
	@endif 
</script>
@endsection
