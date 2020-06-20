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
											<th>Tên Công ty</th>
											<th>Address</th>
											<th>Phone</th>
											<th>Email</th>
											<th class="text-center">Hành động</th>
										</tr>
									</thead>
									<tbody id="renderTable">
										@foreach($company as $cm)
										<tr>
											<td>{{$cm->id}}</td>
											<td>{{$cm->name}}</td>
											<td>{{$cm->address}}</td>
											<td>{{$cm->phone}}</td>
											<td>{{$cm->email}}</td>
											<td>
												<div class="btn-group">
									               <button class="btn btn-default">
														<a href="{{route('suathongtin',$cm->id)}}" >
															<i class="fa fa-exclamation-circle">
																
															</i>
														</a>
											        </button>
												
											     </div>
										     </td>
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