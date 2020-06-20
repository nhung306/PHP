@extends('admin.layouts.index')
@section('content')
				<div id="page-title">
					<h1 class="page-header text-overflow">Trang chủ</h1>
				</div>
				<div id="page-content">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><strong>THỐNG KÊ:</strong></h3>
						</div>
					
						<div class="panel-body">
	                        
							<div class="row">
						<div class="col-md-6 col-lg-3">
							<div class="panel panel-dark panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Thành viên</p>
									<i class="fa fa-users fa-5x"></i>
									<hr>
									<p class="h2 text-thin">{{$user}}</p>
									<small>Số lượng thành viên đã đăng ký</small>
								</div>
							</div>
						</div>
						<!--===================================================-->
						<!--End Large Tile - (Visit Today)-->
					
						<!--Large Tile - (Comments)-->
						<!--===================================================-->
						<div class="col-md-6 col-lg-3">
							<div class="panel panel-danger panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Bình luận</p>
									<i class="fa fa-comment fa-5x"></i>
									<hr>
									<p class="h2 text-thin">{{$comment}}</p>
									<small><span class="text-semibold"></span> số người đã bình luận </small>
								</div>
							</div>
						</div>
						<!--===================================================-->
						<!--End Large Tile - (Comments)-->
					
						<!--Large Tile - (New Orders)-->
						<!--===================================================-->
						<div class="col-md-6 col-lg-3">
							<div class="panel panel-primary panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Đơn hàng</p>
									<i class="fa fa-shopping-cart fa-5x"></i>
									<hr>
									<p class="h2 text-thin">{{$order}}</p>
									<small><span class="text-semibold"></span>Số lượng đơn hàng</small>
								</div>
							</div>
						</div>
						<!--===================================================-->
						<!--Large Tile - (New Orders)-->
					
						<!--Large Tile - (Earning)-->
						<!--===================================================-->
						<div class="col-md-6 col-lg-3">
							<div class="panel panel-info panel-colorful">
								<div class="panel-body text-center">
									<p class="text-uppercase mar-btm text-sm">Earning</p>
									<i class="fa fa-dollar fa-5x"></i>
									<hr>
									<p class="h2 text-thin">7,428</p>
									<small><span class="text-semibold"><i class="fa fa-dollar fa-fw"></i> 22,675</span> Total Earning</small>
								</div>
							</div>
						</div>
						<!--===================================================-->
						<!--End Large Tile - (Earning)-->
					
					
					    </div>	
						</div>
						 <div class="panel-body" style="height: auto;"  >
	                        
							<div class="pad-btm form-inline">
								<div class="row">
									<div class="col-lg-6 ">
										<div class="form-group">
										  <form  action="{{route('thongketheongay')}}" method="GET">
											<input type="hidden"  name="_token" value="{{csrf_token()}}">
											<label>Từ ngày : </label>
											<input type="date" value="{{request()->date_from}}"  name="date_from">
											<label> Đến ngày : </label>
											<input type="date"  value="{{request()->date_to}}" name="date_to">
											<button type="submit"   class="btn btn-success btn-rounded" style="margin-left: 10px;">tìm kiếm</button>
										   </form>
									    </div>
										
									</div>
									
								</div>
							</div>
							<div class="table-responsive" >
								<table class="table table-striped">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Tên sản phẩm :</th>
											<th>Số lượng :</th>
											<th>Giá tiền :</th>								
										</tr>
									</thead>
									<tbody>
									  <?php $sum = 0 ?> 
									  <?php $stt = 0 ?> 
										@foreach($thongke as $tk)
										  <tr>  
                                              <?php $stt += 1 ?>
										  	    <td>{{$stt}}</td>
												<td>{{$tk->product_name}} <br>
                                                 <img src="users/img/product/{{$tk->image}}"  width="50px"
												</td>
												<td>{{$tk->orquantity}}</td>
												<td>{{number_format(( $tk->orquantity )*( $tk->orunit_price ))}} VNĐ</td>
											
										
										  </tr>

                                            <?php $sum +=($tk->orquantity)*($tk->orunit_price); ?> 
                                        @endforeach


									</tbody>
								</table>
								<label>Tổng số tiền :</label>
								<input type="text" value=" {{number_format($sum)}}"> VNĐ
							</div>
							<div class="panel-heading">
								<div class="panel-control">
									<ul class="pagination">
										 {{ $thongke->appends(request()->except('page'))->links() }}
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection