<p>Cảm ơn bạn <strong>{{$user_db->name}}</strong></p>
<p>Số điện thoại: {{$user_db->phone}} </p>
<p>Đã đặt thành công tại cửa hàng của chúng tôi</p>
<p>Chúng tôi sẽ sắp xếp giao đơn hàng cho bạn nhanh nhất. Dưới đây là thông tin chi tiết đơn hàng của bạn</p>
<table class="table table-hover" border="1" style="border-collapse: collapse;">
	<thead>
		<tr>
			<th>#</th>
			<th>Sản Phẩm</th>
			<th>Giá sản phẩm</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($billMailInfo as $info)
		<tr>
			<td>{{$info['id']}}</td>
			<td>{{$info['name']}}</td>
			<td>{{$info['price']}}</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<td colspan="2" style="text-align: right;">Tổng Tiền</td>
		<td>{{number_format($totalPrice)}} VNĐ </td>
		<td></td
	</tfoot>
</table> 