@extends('admin.layouts.index')
@section('content')
            <!--Page Title-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Static Tables</h1>
				</div>
	
				<div id="page-content">
			 
					<div class="panel">
					
							
								<div class="panel-heading">
									<h3 class="panel-title">Horizontal form</h3>
								</div>
					
								<!--Horizontal Form-->
								<!--===================================================-->
								<form class="form-horizontal">
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputemail">Email</label>
											<div class="col-sm-6">
												<input type="email" placeholder="Email" id="demo-hor-inputemail" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="demo-hor-inputpass">Password</label>
											<div class="col-sm-6">
												<input type="password" placeholder="Password" id="demo-hor-inputpass" class="form-control">
											</div>
										</div>
										<div class="form-group">
										<label class="col-md-3 control-label" for="demo-textarea-input">Textarea</label>
										<div class="col-md-6">
											<textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="Your content here.."></textarea>
										</div>
									</div>
										
									</div>
									<div class="panel-footer text-center">
										<button class="btn btn-info" type="submit">Sign in</button>
									</div>
								</form>
								
					
							</div>
				
						</div>
					</div>
				
			</div>
					
					
			
			
			
		

@endsection