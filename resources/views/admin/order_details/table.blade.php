@foreach($order_details as $ds)
	<tr>
		<td>{{$ds->order_id}}</td>
		<td>{{$ds->name}}</td>
		<td>{{$ds->address}}</td>
		<td>{{$ds->phone}}</td>
		<td>{{$ds->quantity}}</td>
		<td>{{number_format($ds->unit_price)}}</td>
		<td>
			@if($ds->payment == 0 )
			{{'Thanh toán bằng tiền mặt'}}
			@endif
		</td>
	</tr>
@endforeach