@extends('wsadmin.crewlayout')
@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        @if(empty($data['counts']))
          <h3><span style="font-size: 20px;">No Bookings for now</span></h3>
        @else
        <h3>{{$data['counts']}}</h3>
        <p> New Bookings </p>
        @endif
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">Number of Bookings This Week </a>
    </div>
  </div>
 <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        @if(empty($data['most']))
          <h3><span style="font-size: 20px;">No Bookings for now</span></h3>
        @else
        <h3>{{$data['most']->count()}}<span style="font-size: 20px;"> Bookings</span></h3>
        <p>{{$data['most'][0]->name}}</p>
        @endif
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer">Most Booked Package </a>
    </div>
  </div>
</div>
<header style="margin-bottom: 0px;padding: 0px;margin-top: 20px;"> 
  <h1 class="h3">Upcoming Schedules <small> (Upcoming or Near Schedules that are in 30 days span)</small></h1>
</header>
<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Near Schedules</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
        @if(empty($data['ups']))
        <h5>No Upcoming bookings.</h5>
        @else
        <tr>
          <th>Booked By</th>
          <th width="250px;">Package Booked</th>
          <th class="text-center">Number of Client(s)</th>
          <th>Schedule Date</th>
           <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['ups'] as $u)
        <tr>
          <td><a href="pages/examples/invoice.html">{{$u->name}}</a></td>
          <td>{{$u->user_fullname}}</td>
          <td class="text-center">{{$u->num_guest}}</td>
          <td>
            {{ date('M d, Y, D', strtotime($u->date)) }}
          </td>
          <td>{{$u->status}}</td>
        </tr>
        @endforeach
        @endif
        </tbody>
      </table>
    </div>
    <!-- /.table-responsive -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix">
    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Bookings</a>
  </div>
  <!-- /.box-footer -->
</div>
</section>
<div class="container-fluid">
  <header style="margin-bottom: 0px;padding: 0px;margin-top: 20px;"> 
  <h1 class="h3"><i class="fa fa-bar-chart"></i> Bar Graph Data of the Bookings of Packages<small> (Will be shown once there is a record)</small>  </h1> 
</header>
  <div id="myfirstchart" style="height: 250px;"></div>
</div>
@endsection
@section('utils')
<script type="text/javascript" src="/js/crew/bh.js"></script>
@endsection