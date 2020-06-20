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
								</div>
							</div>

							<div class="table-responsive">
								<table class="table table-striped" >
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Họ và tên</th>
											<th>Email</th>
											<th>Số điện thoại</th>
											<th>Nội dung</th>
											<th class="text-center">Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($about as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->name}}</td>
											<td>{{$ds->email}}</td>
											<td>{{$ds->phone}}</td>
											<td>{{$ds->content}}</td>
											<td>
											<div class="btn-group">
								
											<button class="btn btn-default" onclick="onDelete({{$ds->id}})">
												<i class="fa fa-trash"></i>
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
@section('script')
<script>
	function onDelete(id){
		var a = confirm('Bạn có chắc chắn xóa không ?');
		if(a){
			$.ajax({
				url: "admin/binhluan/xoa/" + id, //route

				success: function(response){
					// Vẽ lại div có id = renderTable
					document.getElementById('renderTable').innerHTML = response;
				},
				error: function() {
					alert("Bạn không thể xóa")
				}
			});
		}
	}
</script>
@endsection