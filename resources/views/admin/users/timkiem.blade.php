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
							<h3 class="panel-title">Tìm kiếm </h3>
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
											<th>Quyền</th>
											<th class="text-left">Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($timkiem as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->name}}</td>
											<td>{{$ds->email}}</td>
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
											<button class="btn btn-default" onclick="onDelete({{$ds->id}})">
												<i class="fa fa-trash"></i>
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

<script>
	function onDelete(id){
		var a = confirm('Bạn có chắc chắn xóa không ?');
		if(a){
			$.ajax({
				url: "admin/nguoidung/xoa/" + id, //route

				success: function(response){
					// console.log(response);
					// Vẽ lại div có id = renderTable
					document.getElementById('renderTable').innerHTML = response;
				},
				error: function() {
					alert("Bạn không thể xóa")
					//return page error
					// window.location.href = "product/danhsach";
				}
			});
		}
	}
</script>
@endsection