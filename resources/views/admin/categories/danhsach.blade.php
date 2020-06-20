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
										<button id="demo-btn-addrow" class="btn btn-purple btn-labeled fa fa-plus"><a href="{{route('themdanhmuc')}}" >Add</a></button>
										<button class="btn btn-default"><i class="fa fa-print"></i></button>
								
										<select  onchange="onSearch(this)"  data-live-search="true" style="height: 32px; width: 150px; margin-left: 5px;" data-width="100%">
												@foreach($allCategory as $ds)
													<option  value="{{$ds->id}}">{{$ds->name}}</option>
												@endforeach
									   </select>
										
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
										@foreach($category as $ds)
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
											{!! $category->appends($_GET)->links() !!}
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
@section('script')
<script>
	function onSearch(element){
		$.ajax({
			url: "admin/danhmuc/timkiemtheoid1/" + element.value, //route

			success: function(response){
				// console.log(response);
				// Vẽ lại div có id = renderTable
				var strHTML = '<tr>';
	            strHTML += '   <td>' + response.id + '</td>';
	            strHTML += '   <td>' + response.name + '</td>';
	            strHTML += '   <td>' + response.slug + '</td>';
	            strHTML += '   <td>' + response.content + '</td>';
	            strHTML += '   <td> <img src="users/img/category/' + response.image + '" width="50px" alt=""></td>';
	            strHTML += '   <td>';
	            strHTML += '       <div class="btn-group">';
	            strHTML += '           <button class="btn btn-default">';
	            strHTML += '               <a href="admin/danhmuc/sua/'+response.id+'" >';
	            strHTML += '               <i class="fa fa-exclamation-circle"></i>';
	            strHTML += '               </a>';
	            strHTML += '           </button>';
	            strHTML += '           <button class="btn btn-default" onclick="onDelete('+response.id+')">';
	            strHTML += '                <i class="fa fa-trash"></i>';
	            strHTML += '           </button>';
	            strHTML += '       </div>';
	            strHTML += '   </td>';
	            strHTML += '</tr>';
				document.getElementById('renderTable').innerHTML = strHTML;
			},
			error: function() {
				alert("Looix");
			}
		});	
	}
</script>

@endsection