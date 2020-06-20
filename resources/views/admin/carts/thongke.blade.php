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
							<h3 class="panel-title"><strong>Thống kê :</strong></h3>
						</div>
					   			@if(session('thongbao'))
		                              <div class="alert alert-success">
		                                  {{session('thongbao')}}
		                              </div>
		                       		 @endif
						<!--Data Table-->
						<!--===================================================-->
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
										 {!! $thongke->links() !!}
									</ul>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
   
@endsection