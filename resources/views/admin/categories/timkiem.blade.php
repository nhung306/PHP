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
							<h3 class="panel-title">Danh sách</h3>
						</div>
					   			@if(session('thongbao'))
		                              <div class="alert alert-success">
		                                  {{session('thongbao')}}
		                              </div>
		                       		 @endif
						<!--Data Table-->
						<!--===================================================-->
						<div class="panel-body" style="width: 100%">
	                        
							<div class="pad-btm form-inline">
								<div class="row">
									<div class="col-sm-6 table-toolbar-left">
										<button id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus"><a href="{{route('themdanhmuc')}}" >Add</a></button>
										<button class="btn btn-default"><i class="fa fa-print"></i></button>
										
									</div>
									<div class="col-sm-6 table-toolbar-right">
										<div class="form-group">
											<form action="{{route('timkiemdanhmuc')}}" method="GET">
												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<input id="demo-input-search2" name="search" type="text" placeholder="Search" class="form-control" autocomplete="off">
											</form>
										</div>
										
									</div>
								</div>
							</div>

							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Tên</th>
											<th>Tên không dấu</th>
											<th>Nội dung</th>
											<th>Ảnh</th>
											<th >Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($timkiem as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->name}}</td>
											<td>{{$ds->slug}}</td>
											<td>{{$ds->content}}</td>
											<td>
												<img src="users/img/category/{{$ds->image}}" width="50px" alt="">	
											</td>
											<td>
											<div class="btn-group">
											<button class="btn btn-default"><a href="{{route('suadanhmuc',$ds->id)}}" ><i class="fa fa-exclamation-circle"></i></a></button>
											<button class="btn btn-default"><a onclick="return confirm('Bạn có chắc chắn xóa không ?')" href="{{route('xoadanhmuc',$ds->id)}}" ><i class="fa fa-trash"></i></a></button>
										</div></td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="panel-heading">
									<div class="panel-control">
										<ul class="pagination">
											 {!! $timkiem->links() !!}
										</ul>
									</div>
							</div>
						</div>
						<!--===================================================-->
						<!--End Data Table-->
					
					</div>
					
					
				</div>
				<!--===================================================-->
				<!--End page content-->


			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->
			
		</div>

@endsection