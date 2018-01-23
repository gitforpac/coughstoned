

@if($data['schedules']->isEmpty())
<h5>This Package has no Available Date for now</h5>
@else
@foreach($data['schedules'] as $s)
<h5 class="booking-date-header" style="margin-top: 15px;">Booking(s) for {{ date('M d, Y, D', strtotime($s->date)) }}</h5>
@if($data['bookings']->isEmpty())
<div>No Bookings Found</div>
@else
<div class="col-md-12">
  <div class="box">
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tr>
 
        <th>Booked By</th>
        <th>Total Payment</th>
        <th>Number of Clients</th>
        <th>Contact Number</th>
        <th>Contact Email</th>
        <th>Booking Status</th>
        <th>Action</th>
      </tr>
      @foreach($data['bookings'] as $bk)
       @if($bk->date == $s->date)
      <tr>
        <td>{{$bk->user_fullname}}</td>
        <td>₱ {{number_format($bk->payment)}}</td>
        <td>{{$bk->num_guest}}</td>
        <td>{{$bk->phone}}</td>
        <td>{{$bk->email}}</td>
        <td @if($bk->status == 'cancelled')style="color:red;"@else style="color:green;"@endif>{{$bk->status}}</td>
        <td><button class="btn-sm btn-info ">action</button></td>
      </tr>
      @endif
      @endforeach
    </table>
  </div>
</div>
        </div>
@endif
@endforeach
@endif

