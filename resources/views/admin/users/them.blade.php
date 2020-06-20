@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
	
				<div id="page-content">
			 
					<div class="panel">
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Thêm thành viên</h3>
								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form action="{{route('themnguoidung')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Tên :</label>
											<div class="col-sm-6">
												<input type="text" placeholder="Nhập tên ..." id="demo-hor-inputemail" value="{{old('name')}}" name="name" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Password:</label>
											<div class="col-sm-6">
												<input type="password" placeholder="nhập password.." id="demo-hor-inputpass"  name="password" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Nhập lại password:</label>
											<div class="col-sm-6">
												<input type="password" placeholder="nhập lại password.." id="demo-hor-inputpass" name="passwordAgain" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Email :</label>
											<div class="col-sm-6">
												<input type="email"  value="{{old('email')}}" placeholder="Nhập email.." id="demo-hor-inputemail" name="email" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Địa chỉ :</label>
											<div class="col-sm-6">
												<input type="text" placeholder="Nhập địa chỉ.." id="demo-hor-inputemail" value="{{old('address')}}" name="address" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Số điện thoại :</label>
											<div class="col-sm-6">
												<input type="text" placeholder="Nhập số điện thoại.." id="demo-hor-inputemail"  value="{{old('phone')}}" name="phone" class="form-control">
											</div>
										</div>
										
										
										<div class="pad-ver">
					                     <label class="col-md-3 control-label" for="demo-textarea-input">Quyền:</label>
										 <label class="form-radio form-normal form-primary active"><input type="radio" name="level" value="1" checked=""> Admin</label>
										<label class="form-radio form-normal form-info"><input type="radio" name="level" value="0"> User</label>
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