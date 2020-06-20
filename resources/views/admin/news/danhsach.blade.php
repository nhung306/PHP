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
										<button id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus"><a href="{{route('themtintuc')}}" >Add</a></button>
										<button class="btn btn-default"><i class="fa fa-print"></i></button>
										
									</div>
									<div class="col-sm-6 table-toolbar-right">
										<div class="form-group">
											<form action="{{route('timkiemtintuc')}}" method="GET">
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
											<th>Tiêu đề</th>
											<th>Tiêu đề không dấu</th>
											<th>Nội dung</th>
											<th>Ảnh</th>
											<th>Nổi bật</th>
											<th class="text-center">Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($news as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->title}}</td>
											<td>{{$ds->slug}}</td>
											<td>{{$ds->content}}</td>
											<td>
												<img src="users/img/new/{{$ds->image}}"  width="50px" >
												
											</td>
											<td>
                                              @if($ds->status == 0 )
                                              	{{'Không'}}
                                              @else
                                             	{{'Có'}}
                                              @endif
											</td>
											<td>
											<div class="btn-group">
											<button class="btn btn-default">
												<a href="{{route('suatintuc',$ds->id)}}" >
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
											{!! $news->appends($_GET)->links() !!}
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
				url: "admin/tintuc/xoa/" + id, //route

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