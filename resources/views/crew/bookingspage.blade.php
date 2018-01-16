@extends('layouts.adminlayout')
@section('content')
<div class="page home-page">
  @include('inc.admin.nav')
  <div class="breadcrumb-holder">   
    <div class="container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Bookings</li>
      </ul>
    </div>
  </div>
  <section class="charts">
    <div class="container-fluid">
    @if(Session::has('deletepackagesuccess'))
    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('deletepackagesuccess') }}</p>
    @endif
      <header style="margin-bottom: 0px;padding: 0px;margin-top: 20px;"> 
        <h1 class="h3">Packages - Bookings</h1>
      </header>
      <div class="fliter-bookings" style="text-align: right;">
        <div class="btn-group">

        </div>
      </div>
      </div>
      <div class="loading" style="display: none;">
          <img src="{{ asset('img/loader.svg') }}">
      </div>
      <div class="row" id="bookings">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($data['packages'] as $bk)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$bk->name}}</td>
                    <td>{{$bk->price}}</td>
                    <td>{{$bk->location}}</td>
                    <td>
                    	<a href="javascript:void(0)" class="btn-sm btn-info" id="viewbookingsbtn" data-id="{{$bk->id}}">
                    		@php
                    		$i = $loop->iteration-1;
                    		@endphp
                    		View Bookings&nbsp;&nbsp;@if($data['bookingscount'][$i] !==0)<div class="badge badge-warning">{{$data['bookingscount'][$i]}}</div>
                    		@endif
                    	</a>
                    	<a href="/editpkg/{{$bk->id}}" class="btn-sm btn-primary">Edit Package</a>
                      <a href="javascript:void(0)" class="btn-sm btn-danger" id="deletepkgbtn" data-id="{{$bk->id}}">Delete Package</a>
                    </td>

                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>          
      </div>
    </div>
  </section>

</div>


<!-- Bookings Modal -->
<div class="modal fade bd-example-modal-lg" id="bookingsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Package Current Bookings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	        <div class="form-loading text-center">
	          <img src="{{ asset('img/loader.svg') }}" width="50px" height="50px">
	        </div>
  		</div>
    </div>
  </div>
</div>
@endsection


@section('utils')

<script type="text/javascript">
	$(document).on('click','#viewbookingsbtn',function(){
		var pid = $(this).data('id');
		$('#bookingsmodal').modal('show')
		$.get('/getbookings/'+pid,function(data){
			$('#bookingsmodal .modal-body').html(data);
		}, 'json');
		
	});


$(document).on('click', '#deletepkgbtn', function(e){
  e.preventDefault();
  var t = $(this).parent().parent();
  var pid = $(this).data('id');
  var url = '/deletepackage/'+pid;
  var _token = $('meta[name="csrf-token"]').attr('content');
  $.confirm({
      icon: 'fa fa-warning',
      title: 'Delete Package?',
      content: 'Deleting the Package will also remove the current bookings of the Package, Are you sure you want to continue?',
      type: 'red',
      typeAnimated: true,
      buttons: {
          cancel:  {
           btnClass: 'btn-green'
           },
          Confirm: {
              text: 'Yes, Delete Package',
              btnClass: 'btn-red',
              action: function(){
              $.ajax({
              dataType: 'json',
              url: url,
              data: {_token:_token},
              type: 'DELETE',
              success: function(result) {
                  if(result.success == true) {
                    $.notify(" Deleted Successfully", "success");
                    t.remove();
                  } else {
                $.notify(" Something Went Wrong Deleting Package", "error");

              }
              }
          });
              }
          },
      }
  });
});
</script>

@endsection

