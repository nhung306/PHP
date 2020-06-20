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
						<div class="panel-body"  >
	                        
							<div class="pad-btm form-inline">
								<div class="row">
									<div class="col-sm-6 table-toolbar-left">
										<button id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus"><a href="{{route('themnguoidung')}}" >Add</a></button>
										<button class="btn btn-default"><i class="fa fa-print"></i></button>
										
									</div>
									<div class="col-sm-6 table-toolbar-right">
										<div class="form-group">
											<form action="{{route('timkiemnguoidung')}}" method="GET">
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
											<th>Email</th>
											<th>Địa chỉ</th>
											<th>Số điện thoại</th>
											<th>Quyền</th>
											<th class="text-left">Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($danhsach as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->name}}</td>
											<td>{{$ds->email}}</td>
											<td>{{$ds->address}}</td>
											<td>{{$ds->phone}}</td>
											<td>
                                              @if($ds->level == 0 )
                                              	{{'User'}}
                                              @else
                                             	{{'Admin'}}
                                              @endif
											</td>
											<td>
											<div class="btn-group">
											<button class="btn btn-default">
												<a href="{{route('suanguoidung',$ds->id)}}" >
													<i class="fa fa-exclamation-circle">
														
													</i>
												</a>
											</button>
											<button class="btn btn-default" onclick="return confirm('Bạn có chắc chắn xóa không ?')">
												<a href="{{route('xoanguoidung',$ds->id)}}" >
													<i class="fa fa-trash"></i>
												</a>
											</button>
										</div></td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="panel-heading">
									<div class="panel-control">
										<ul class="pagination">
											{!! $danhsach->appends($_GET)->links() !!}
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