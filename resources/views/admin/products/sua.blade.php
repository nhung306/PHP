@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
	
				<div id="page-content">
			 
					<div class="panel">
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Sửa sản phẩm: <strong>{{ $product->name}}</strong> </h3>
								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form action="{{route('capnhatsanpham',$product->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Danh mục sản phẩm:</label>
											<div class="col-sm-6">
												<select class=" btn-info" style="width: 510px; height: 30px;" name="category_id">
											  
													@foreach($category as $ct)
													@if($ct->id == $product->category_id){
														<option value="{{$ct->id}}" selected>{{$ct->name}}</option>
													}
													@else{
														<option value="{{$ct->id}}">{{$ct->name}}</option>
													}
													@endif
													@endforeach
												</select>
												
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Tên:</label>
											<div class="col-sm-6">
													<input type="text" placeholder="nhập tên sản phẩm" value="{{$product->name}}"  name="name" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Nội dung:</label>
											<div class="col-md-6">
												<textarea id="demo-textarea-input" id="demo" rows="9" class="form-control ckeditor" name="content" placeholder="nội dung">{{$product->content}}</textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Giá gốc:</label>
											<div class="col-sm-6">
													<input type="number" placeholder="nhập giá phẩm" value="{{$product->unit_price}}" name="unit_price" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Image:</label>
											<div class="col-sm-6">
												<img src="users/img/product/{{$product->image}}" width="50px" alt="">
												<input type="file"   name="image" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Giá giảm:</label>
											<div class="col-sm-6">
													<input type="number" placeholder="nhập giá sau khi giảm" value="{{$product->discount_price}}"  name="discount_price" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Số lượng:</label>
											<div class="col-sm-6">
													<input type="number" min=0 placeholder="nhập số lượng " value="{{$product->quantity}}"  name="quantity" class="form-control">
											</div>
										</div>
										<div class="pad-ver">
						                     <label class="col-md-3 control-label" for="demo-textarea-input">Nổi bật:</label>
											 <label class="form-radio form-normal form-primary active"><input type="radio" checked="" name="status" value="1"
                                               @if($product->status == 1)
                                               {{"checked"}}
                                               @endif
											  > Có</label>
											<label class="form-radio form-normal form-info"><input type="radio" name="status" value="0"
												@if($product->status == 0)
                                              	 {{"checked"}}
                                              	@endif
                                               > Không</label>
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