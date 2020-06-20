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
							<h3 class="panel-title">Danh sách Slide</h3>
						</div>
					   			@if(session('thongbao'))
		                              <div class="alert alert-success">
		                                  {{session('thongbao')}}
		                              </div>
		                       		 @endif
						<!--Data Table-->
						<!--===================================================-->
						<div class="panel-body" style="height: 500px;">
	                        
							<div class="pad-btm form-inline">
								<div class="row">
									<div class="col-sm-6 table-toolbar-left">
										<button id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus"><a href="{{route('themslide')}}" >Add</a></button>
										<button class="btn btn-default"><i class="fa fa-print"></i></button>
										
									</div>
									<div class="col-sm-6 table-toolbar-right">
										<div class="form-group">
											<form action="{{route('timkiemslide')}}" method="GET">
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
											<th>Link</th>
											<th>Image</th>
											<th>Kiểu</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($slide as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->link}}</td>
											<td>
												<img src="users/img/slider/homepage2/{{$ds->image}}" width="50px" alt="">
												
											</td>
											<td>{{$ds->type}}</td>
											<td>

												<div class="btn-group">
													<button class="btn btn-default">
														<a href="{{route('suaslide',$ds->id)}}" >
															<i class="fa fa-exclamation-circle"></i>
														</a>
													</button>
													<button class="btn btn-default" onclick="onDelete({{$ds->id}})">
														<i class="fa fa-trash"></i>
													</button>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="panel-heading">
									<div class="panel-control">
										<ul class="pagination">
											{!! $slide->appends($_GET)->links() !!}
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
				url: "admin/slide/xoa/" + id, //route

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