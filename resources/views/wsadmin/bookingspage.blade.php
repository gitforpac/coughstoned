@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
<h1>
Package and Bookings
<small>Manage</small>
</h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Manage Package and Bookings</li>
  </ol>
</section>
<section class="content">
<div class="row">
  <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">All Packages with Bookings</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table table-bordered">
      <tr>
      <th>#</th>
      <th>Package Name</th>
      <th>Location</th>
      <th>Action</th>
    </tr>
      @foreach($data['packages'] as $bk)
    <tr>
       <th scope="row">{{$loop->iteration}}</th>
        <td>{{$bk->name}}</td>
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
    </table>
  </div>
  <!-- /.box-body -->
</div>
</div>
</section>
<div class="modal fade" id="bookingsmodal">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Package Bookings</h4>
              </div>
              <div class="modal-body">
                <div class="form-loading text-center"><img src="{{ asset('img/loader.svg') }}" width="50px" height="50px"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endsection


@section('utils')

<script type="text/javascript">
	$(document).on('click','#viewbookingsbtn',function(){
    var loadingui = '<div class="form-loading text-center"><img src="{{ asset('img/loader.svg') }}" width="50px" height="50px"></div>';
    $('#bookingsmodal .modal-body').html(loadingui);
		var pid = $(this).data('id');
		$('#bookingsmodal').modal('show')
		$.get('/getbookings/'+pid,function(data){
      $('.form-loading').fadeOut();
			$('#bookingsmodal .modal-body').hide().html(data).fadeIn();
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






