@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
	
				<div id="page-content">
			 
					<div class="panel">
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Sửa sản phẩm: {{$category->name}}</h3>

								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form action="{{route('capnhatdanhmuc',$category->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Tên danh mục:</label>
											<div class="col-sm-6">
												<input type="text" placeholder="tên danh mục" id="demo-hor-inputemail" value="{{$category->name}}" name="name" class="form-control">
											</div>
										</div>
										<div class="form-group">
										<label class="col-md-3 control-label" for="demo-textarea-input">Nội dung:</label>
										<div class="col-md-6">
											<textarea id="demo-textarea-input" id="demo" rows="9" class="form-control ckeditor" name="content" placeholder="nội dung">{{$category->content}}</textarea>
										</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Image:</label>
											<div class="col-sm-6">
												<img width="100px" src="users/img/product/{{$category->image}}" alt="">
												<input type="file" id="demo-hor-inputpass" name="image" class="form-control">
											</div>
										</div>
										
										
									</div>
									<div class="panel-footer text-center">
										<button class="btn btn-info" type="submit">Thêm</button>
									</div>
								</form>
								
					
							</div>
				
						</div>
					</div>
				
			</div>
					
					
<script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>		
			
@endsection