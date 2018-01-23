

@if($data['schedules']->isEmpty())
<h5>This Package has no Available Date for now</h5>
@else
@foreach($data['schedules'] as $s)
<div class="box-header">
  <h3 class="box-title">Booking(s) for {{ date('M d, Y, D', strtotime($s->date)) }}</h3>
</div>
@if($data['bookings']->isEmpty())
<div>No Bookings Found</div>
@else
<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Client</th>
            <th>Payment</th>
            <th>Number of Guest</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data['bookings'] as $bk)
           @if($bk->date == $s->date)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$bk->name}}</td>
              <td>{{$bk->payment}}</td>
              <td>{{$bk->num_guest}}</td>
              <td @if($bk->status == 'cancelled')style="color:red;"@else style="color:green;"@endif>{{$bk->status}}</td>
              <td><button class="btn-sm btn-info ">action</button></td>
            </tr>
            @endif
          @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
@endif
@endforeach
@endif










