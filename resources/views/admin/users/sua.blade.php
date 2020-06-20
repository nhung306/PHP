@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
	
				<div id="page-content">
			 
					<div class="panel">
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Sửa tên thành viên: <strong>{{$sua->name}}</strong></h3>
								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form action="{{route('capnhatnguoidung',$sua->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
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
												<input type="text" placeholder="Nhập tên ..." id="demo-hor-inputemail" value="{{$sua->name}}" name="name" class="form-control" readonly="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Password:</label>
											<div class="col-sm-6">
												<input type="password" placeholder="nhập password.." id="demo-hor-inputpass" name="password" class="form-control" value="{{$sua->password}}">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Nhập lại password:</label>
											<div class="col-sm-6">
												<input type="password" placeholder="nhập lại password.." id="demo-hor-inputpass" name="passwordAgain" value="{{$sua->password}}" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Email :</label>
											<div class="col-sm-6">
												<input type="email" placeholder="Nhập email.." id="demo-hor-inputemail" value="{{$sua->email}}" name="email" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Địa chỉ :</label>
											<div class="col-sm-6">
												<input type="text" placeholder="Nhập địa chỉ.." id="demo-hor-inputemail" value="{{$sua->address}}" name="address" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Số điện thoại :</label>
											<div class="col-sm-6">
												<input type="text" placeholder="Nhập số điện thoại.." id="demo-hor-inputemail"  value="{{$sua->phone}}" name="phone" class="form-control">
											</div>
										</div>
										
										<div class="pad-ver">
					                     <label class="col-md-3 control-label" for="demo-textarea-input">Level:</label>
										 <label class="form-radio form-normal form-primary active"><input type="radio" name="level" value="1" checked=""
                                             @if($sua->level == 1)
                                              {{"checked"}}
                                             @endif
										 	> Admin</label>
										<label class="form-radio form-normal form-info"><input type="radio" name="level" 
											@if($sua->level == 0)
                                              {{"checked"}}
                                            @endif
                                              value="0"> User</label>
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