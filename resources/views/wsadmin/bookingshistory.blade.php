@extends('wsadmin.crewlayout')
@section('content')
<div id="load-overlay-bh">
</div>
<section class="content-header">
  <h1>
    Bookings History
    <small>View Bookings History</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Bookings History</li>
  </ol>
</section>
<section class="content">
<div class="row">
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Previous Bookings</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="bookings-history" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Package Booked</th>
          <th>Booked By</th>
          <th>Payment Recieved</th>
          <th>Schedule</th>
          <th>Booked on</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $b)
        <tr>
          <td>{{$b->name}}</td>
          <td>{{$b->user_fullname}}</td>
          <td>₱ {{number_format($b->payment)}}</td>
          <td>{{ date('M d, Y, D', strtotime($b->date)) }}</td>
          <td>{{ date('M d, Y, D', strtotime($b->created_at)) }}</td>
        </tr>
        @endforeach
    </table>
</div>
</div>
</div>
</section>
@endsection
@section('utils')
<script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="/js/crew/bh.js"></script>
<script>
  $(function () {
    $('#bookings-history').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

	Pace.on('done', function() {
		$('#load-overlay-bh').fadeOut();
	});
</script>
@endsection