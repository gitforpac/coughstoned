@foreach($prices as $i)
<tr class="item-i">
  <th scope="row"><span class="num">{{$i->person_count}}</span></th>
  <td>₱ {{number_format($i->price_per)}}</td>
  <td>₱ {{number_format($i->price_per*$i->person_count)}}</td>
  <td>
  <a href="javascript:void(0)" data-id="{{$i->id}}" data-count="{{$i->person_count}}" data-price="{{$i->price_per}}" id="edit_pricebtn" class="btn btn-default" title="Edit Price"><i class="fa fa-pencil"></i>
  </a>

  <a href="javascript:void(0)" data-id="{{$i->id}}" id="remove_pricebtn" class="btn btn-default" title="Remove Price" @if (!$loop->last) disabled style="pointer-events: none;" @endif><i class="fa fa-trash"></i>
  </a>
  </td>
</tr>
 @endforeach