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
										<button id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus"><a href="{{route('themsanpham')}}" >Add</a></button>
										<button class="btn btn-default"><i class="fa fa-print"></i></button>
										<select  onchange="onSearch(this)"  data-live-search="true" style="height: 32px; width: 150px; margin-left: 5px;" data-width="100%">
												@foreach($category as $ds)
													<option  value="{{$ds->id}}">{{$ds->name}}</option>
												@endforeach
									   </select>
										
									</div>
									<div class="col-sm-6 table-toolbar-right">
										<div class="form-group">
											<form action="{{route('timkiemsanpham')}}" method="GET">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off">
										   </form>
										</div>
										
									</div>
								</div>
							</div>
							<div class="table-responsive"  >
								<table class="table table-striped">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th>Danh muc</th>
											<th>Tên</th>
											<th>Tên không dấu</th>
											<th>Nội dung</th>
											<th>Giá gốc</th>
											<th>Ảnh</th>
											<th>Giá giảm</th>
											<th>Số lượng</th>
											<th>Nổi bật</th>
											<th >Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($timkiem as $ds)
										<tr>
											<td>{{$ds->id}}</td>
											<td>{{$ds->categories_name}}</td>
											<td>{{$ds->name}}</td>
											<td>{{$ds->slug}}</td>
											<td>{{$ds->content}}</td>
											<td>{{$ds->unit_price}}</td>
											<td>
												<img src="users/img/product/{{$ds->image}}"  width="50px" >
												
											</td>
											<td>{{$ds->discount_price}}</td>
											<td>{{$ds->quantity}}</td>
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
												<a href="{{route('suasanpham',$ds->id)}}" >
													<i class="fa fa-exclamation-circle">
														
													</i>
												</a>
											</button>
											<button class="btn btn-default">
												<a href="{{route('xoasanpham',$ds->id)}}" onchange="Bạn có muốn xóa không ?" >
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
<script type="text/javascript">
 function onSearch(element){
	 	$.ajax({
	 		url: "admin/sanpham/timkiemtheoid/" + element.value, //route
	 		success: function(response){
	 			console.log(response);
	 			// Vẽ lại div có id = renderTable
	 			document.getElementById('renderTable').innerHTML = response;
	 		},
	 		error: function() {
	 			alert("Looix");
	 		}
	 	});	
	 }
	
</script>
@endsection