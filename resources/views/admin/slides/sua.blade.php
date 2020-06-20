@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
	
				<div id="page-content">
			 
					<div class="panel" >
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Sửa slide: {{$slide->id}} </h3>
								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form action="{{route('capnhatslide',$slide->id)}}" method="POST" class="form-horizontal" enctype="multipart/form-data" style="height: 500px; margin-top:100px">
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
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Link: </label>
											<div class="col-sm-6">

												<input type="text" placeholder="tên link" id="demo-hor-inputemail" value="{{$slide->link}}" name="link" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Kiểu: </label>
											<div class="col-sm-6">

												<input type="text" placeholder="" id="demo-hor-inputemail" value="{{$slide->type}}" name="type" class="form-control">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Image:</label>
											<div class="col-sm-6">
												<img src="users/img/slider/homepage2/{{$slide->image}}" width="100px">
												<input type="file"  id="demo-hor-inputpass" name="image" class="form-control">
											</div>
										</div>
										
										
								
									<div class=" text-center" style="margin-top:50px">
										<button class="btn btn-info" type="submit">Thêm</button>
									</div>
								</form>
								
					
							</div>
				
						</div>
					</div>
				
			</div>
					
					
<script type="text/javascript" src="admin/ckeditor/ckeditor.js"></script>		
			
@endsection