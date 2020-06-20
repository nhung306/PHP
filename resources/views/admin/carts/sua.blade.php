@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
	
				<div id="page-content">
			 
					<div class="panel" >
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Sửa đơn hàng</h3>
								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form action="{{route('capnhatgiohang',$order->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
									 @if(count($errors)>0)
			                          <div class="alert alert-danger">
			                              @foreach($errors->all() as $err)
			                              {{$err}} <br>
			                              @endforeach
			                          </div>
			                        @endif
			                        @if(session('thongbao'))
		                              <div class="alert alert-success">
		                                  {{session('thongbao')}}
		                              </div>
		                       		 @endif
									 <input type="hidden" name="_token" value="{{csrf_token()}}">
									<div class="panel-body" style="height: 300px;margin-top: 100px">
										<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Bàn:</label>
											<div class="col-sm-6">
													<input type="text" value="{{$order->id}}" readonly="" name="name" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Khách hàng :</label>
											<div class="col-sm-6">
													<input type="text" value="{{$order->user_id}}"  readonly="" name="user_id" class="form-control">
											</div>
										</div>
										<div class="pad-ver">
						                     <label class="col-md-3 control-label" for="demo-textarea-input">Hình thức thanh toán:</label>
						                    <label class="form-radio form-normal form-primary active"><input type="radio" checked="" readonly="" name="payment" value="0"
                                               @if($order->status == 0)
                                               {{"checked"}}
                                               @endif
											  > Thanh toán trực tiếp</label>

									     </div>
										<div class="pad-ver">
						                     <label class="col-md-3 control-label" for="demo-textarea-input">Trạng thái:</label>
						                    <label class="form-radio form-normal form-primary active"><input type="radio" checked="" name="status" value="2"
                                               @if($order->status == 2)
                                               {{"checked"}}
                                               @endif
											  > Hủy đơn hàng</label>
											<label class="form-radio form-normal form-info"><input type="radio" name="status" value="1"
												@if($order->status == 1)
                                              	 {{"checked"}}
                                              	@endif
                                               > Đã thanh toán</label>
                                             <label class="form-radio form-normal form-info"><input type="radio" name="status" value="0"
												@if($order->status == 0)
                                              	 {{"checked"}}
                                              	@endif
                                               >Đang chờ xử lý</label>

									     </div>
										 <div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Tổng tiền:</label>
											<div class="col-sm-6">
													<input type="text" value="{{$order->total}}" placeholder="nhập tên sản phẩm" readonly="" name="total" class="form-control">
											</div>
										</div>
									</div>
									<div class="panel-footer text-center">
										<button class="btn btn-info" type="submit">Thay đổi</button>
									</div>
								</form>
								
					
							</div>
				
						</div>
					</div>
				
			</div>
					
					
<script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>		
			
@endsection