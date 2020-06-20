@extends('admin.layouts.index')
@section('content')
<!--Page Title-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--End page title-->

<!--Page content-->
<!--===================================================-->
<div id="page-content">
	<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title"><strong>Danh sách đơn hàng</strong></h3>
		</div>
		@if(session('thongbao'))
			<div class="alert alert-success">
				{{session('thongbao')}}
			</div>
		@endif
		<!--Data Table-->
		<!--===================================================-->
		<div class="panel-body" style="height: 700px;"  >

			<div class="pad-btm form-inline">
				<div class="row">
					<div class="col-sm-6 table-toolbar-left">
						<button class="btn btn-default"><i class="fa fa-print"></i></button>


					</div>
					<div class="col-sm-6 table-toolbar-right">
						<div class="form-group">
							<form action="" method="GET">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input id="demo-input-search2" name="search" type="text" placeholder="Search" class="form-control" autocomplete="off">
							</form>
						</div>

					</div>
				</div>
			</div>
			<div class="table-responsive table-list-carts">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-center">Số bàn:</th>
							<th>Tên:</th>
							<th>Hình thức thanh toán</th>
							<th>Trạng thái:</th>
							<th>Tổng tiền:</th>
							<th >Hành động :</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order as $ds)
						<tr>
							<td>{{$ds->id}}</td>
							<td>{{$ds->name}}</td>
							<td>@if($ds->payment == 0 )
								{{'Thanh toán trực tuyến'}}
								@endif
							</td>
							<td>

								@if($ds->status == 2 )
								{{'Hủy đơn hàng'}}
								@elseif($ds->status == 1 )
								{{'Đã thanh toán'}}
								@else
								{{'Đang chờ xử lý'}}

								@endif
							</td>
							<td>{{number_format($ds->total)}}</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-success btn-show-detail-cart" data-id-carts="{{$ds->id}}">
										<i class="fa fa-search"></i>
									</button>
									<button class="btn btn-default">
										<a href="{{route('suagiohang',$ds->id)}}" >
											<i class="fa fa-edit"></i>
										</a>
									</button>
									<button class="btn btn-default">
										<a href="{{route('xoagiohang',$ds->id)}}" onchange="Bạn có muốn xóa không ?" >
											<i class="fa fa-trash"></i>
										</a>
									</button>
								</div>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>

				<div class="panel-heading">
					<div class="panel-control">
						<ul class="pagination">
							{{ $order->appends(request()->except('page'))->links() }}
						</ul>
					</div>
				</div>
			</div>
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Chi Tiết đơn hàng</strong></h3>
			</div>
			<div class="table-responsive" >
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Đơn đặt hàng:</th>
							<th>Tên khách hàng:</th>
							<th>Địa chỉ:</th>
							<th>Số điện thoại:</th>
							<th>Số lượng:</th>
							<th>Giá sản phẩm: </th>
							<th>Hình thức thanh toán: </th>
						</tr>
					</thead>
					<tbody id="renderTable">
						
					</tbody>
				</table>
			</div>


		</div>
		<!--===================================================-->
		<!--End Data Table-->



	</div>
	<!--===================================================-->
	<!--End page content-->


</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
</div>
@endsection

@section('script')
<script>

	$(".btn-show-detail-cart").click(function(event) {
		var id = $(this).data('id-carts');
		$.ajax({
			url: "admin/chitietgiohang/danhsach/" + id, 
			success: function(view){
				// Remove element before
				$("#renderTable").empty();
				// Render new content for table detail
				$("#renderTable").html(view);
			}
		});
	});
</script>
@endsection