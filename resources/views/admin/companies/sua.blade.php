@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
	
				<div id="page-content">
			 
					<div class="panel">
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Thông tin</h3>
								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form action="{{route('suathongtin',$company->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
												<label class="col-sm-3 control-label" for="demo-hor-inputemail">Tên công ty :</label>
												<div class="col-sm-6">
													<input type="text" value="{{$company->name}}"  name="name" placeholder="Nhập tên..." id="demo-hor-inputemail"  class="form-control">
												</div>
											</div>
											<div class="form-group">
											<label class="col-md-3 control-label" for="demo-textarea-input">Address:</label>
											<div class="col-sm-6">
													<input type="text" value="{{$company->address}}"  name="address" placeholder="Nhập email.." id="demo-hor-inputemail"  class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label" for="demo-hor-inputpass">Phone:</label>
												<div class="col-sm-6">
													<input type="number" value="{{$company->phone}}"    id="demo-hor-inputpass" name="phone" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label" for="demo-hor-inputpass">Email:</label>
												<div class="col-sm-6">
													<input type="email" value="{{$company->email}}"    id="demo-hor-inputpass" name="email" class="form-control">
												</div>
											</div>
											
										</div>
									<div class="panel-footer text-center">
										<button class="btn btn-info" type="submit">Lưu trữ</button>
									</div>
								</form>
								
					
							</div>
				
						</div>
					</div>
				
			</div>
					
					
<script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>		
			
@endsection