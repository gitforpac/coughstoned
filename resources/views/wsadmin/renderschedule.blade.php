@foreach($dates as $s)
<tr>
<th scope="row"><span class="num2">{{$loop->iteration}}</span></th>
<td>{{ date('M d, Y', strtotime($s->date)) }}</td>
<td><a href="javascript:void(0)" data-id="{{$s->id}}" id="remove_avdbtn" class="btn btn-default" title="Remove"><i class="fa fa-trash"></i>
</a></td>
</tr>
@endforeach