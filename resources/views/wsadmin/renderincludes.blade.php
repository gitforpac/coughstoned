@foreach($items as $i)
<tr class="item-i">
<th scope="row"><span class="num">{{$loop->iteration}}</span></th>
<td>{{$i->included_item}}</td>
<td><a href="javascript:void(0)" data-id="{{$i->id}}" id="remove_includedbtn" class="btn btn-default" title="Remove from included"><i class="fa fa-trash"></i>
</a>
</td>
</tr>
@endforeach