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
							<h3 class="panel-title">Bình luận</h3>
						</div>
					   			@if(session('thongbao'))
		                              <div class="alert alert-success">
		                                  {{session('thongbao')}}
		                              </div>
		                        @endif
						<!--Data Table-->
						<!--===================================================-->
						<div class="panel-body"  style="height: 500px;">
	                        
							<div class="pad-btm form-inline">
								<div class="row">
									<div class="col-sm-6 table-toolbar-left">
										<button class="btn btn-default"><i class="fa fa-print"></i></button>
										
									</div>
									<div class="col-sm-6 table-toolbar-right">
										<div class="form-group">
											<form action="" method="GET">
												<input type="hidden" name="_token" value="{{csrf_token()}}">
												<input id="demo-input-search2" name="search" type="text" placeholder="Search" class="form-control" autocomplete="off">
											</form>
										</div>
										
									</div>
								</div>
							</div>

							<div class="table-responsive">
								<table class="table table-striped" >
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Tên</th>
											<th>Sản phẩm</th>
											<th>Nội dung</th>
											<th class="text-center">Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($comment as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->user_name}}</td>
											<td>{{$ds->product_name}}</td>
											<td>{{$ds->content}}</td>
											<td>
											<div class="btn-group">
												<button class="btn btn-default">
												<a href="{{route('xoabinhluan',$ds->id)}}" onchange="Bạn có muốn xóa không ?" >
												<i class="fa fa-trash"></i>
											   </a>
											</button>
										</div></td>
										</tr>
										@endforeach
									</tbody>
								</table>
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
	</div>

@endsection