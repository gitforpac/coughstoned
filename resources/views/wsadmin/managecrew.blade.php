@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
<h1>
Manage Crew
<small>Crew Profiles</small>
</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Manage Crew Profiles</li>
	</ol>
</section>
<section class="content">
<div class="row">
	<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">All Crews Informations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
              	 <tr>
                  <th><button class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#addcrew"><i class="fa fa-user-plus"></i> &nbsp;Add a Crew Member</button></th>
                </tr>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                @foreach($crew as $c)
                <tr>
                  <td>1.</td>
                  <td>{{$c->name}}</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
</section>
<div class="modal fade" id="addcrew">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
        <h4 class="modal-title">Add a Crew Member</h4>
      </div>
      <div class="modal-body">
        <form>
        	<div class="form-group">
              <label>Name</label>
              <input type="name" class="form-control" placeholder="Juan Dela Cruz">
            </div>
            <div class="form-group">
              <label>Position</label>
              <input type="position" class="form-control" placeholder="Trekking Consultant">
            </div>
            <div class="form-group">
              <label>About</label>
              <textarea name="about" class="textarea" placeholder="Information about this Member"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required=""></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Crew Picture/Avatar</label>
              <input type="file" id="exampleInputFile">

              <p class="help-block">Upload Crew Picture/Avatar</p>
            </div>
        <div class="form-group">
             <button type="submit" class="btn btn-primary">Add This Member</button>
            </div>
            
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
@endsection