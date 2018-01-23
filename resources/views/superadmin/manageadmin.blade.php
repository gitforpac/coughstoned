@extends('superadmin.adminlayout')
@section('content')
<div class="col-md-12">
<div class="box-header with-border">
  <h2 class="box-title ml-3 text-danger"><i class="fa fa-user-secret"></i> <strong>Admin Accounts</strong></h2>
</div>
<div class="container">
    <div class="col-sm">
      <button type="button" class="btn-success shadow-black btn" data-toggle="modal" data-target="#accountmodal">
        <i class="fa fa-plus pr-5"></i> Create Accout</button>
    </div>
  </div>
<div class="box-body container">
  <table class="table table-bordered table-striped table-sm">
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Action</th>
    </tr>
    <tr>
       <th scope="row">1</th>
        <td>jerwin12345</td>
        <td>
          <a href="javascript:void(0)" class="btn-sm btn-primary"><i class="fa fa-edit"></i>Edit</a>
          <a  onclick="deleteWarning()"class="btn-sm btn-danger"><i class="fa fa-remove"></i>Remove</a>
        </td>
    </tr>
  </table>
</div>
</div>

<div class="modal fade modal-md" id="accountmodal">
          <div class="modal-dialog">
            <div class="modal-content modal-sm">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Account</h4>
              </div>
              <!-- Text input-->
           <div class="modal-body modal-sm" class="tab-pane fade in active">
              <form action="/">
                  <div class="form-group">
                      <label for="email">Username:</label>
                      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                      <label for="pwd">Password:</label>
                      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                  </div>
              </form>
          </div>

                <div class="modal-footer modal-sm">
                <button type="button" class="btn btn-success" data-dismiss="modal">Create Account</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endsection


@section('utils')

<script type="text/javascript">
	$(document).on('click','#createAccount',function(){
		var pid = $(this).data('id');
		$('#accountmodal').modal('show')
		$.get('/addmanager'+pid,function(data){
			$('#bookingsmodal .modal-body').html(data);
		}, 'json');
		
	});


function deleteWarning(){
  alert("Are you really sure about this because if you press this button it's going to be deleted like really");
}

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


