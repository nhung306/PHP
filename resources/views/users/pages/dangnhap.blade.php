@extends('users.layouts.index')
@section('content')
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- BSTORE-BREADCRUMB START -->
				<div class="bstore-breadcrumb">
					<a href="index.html">Trang chủ</a>
					<span><i class="fa fa-caret-right"></i></span>
					<span>Đăng nhập</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="page-title">Đăng nhập</h2>
			</div>
			 @if(count($errors) > 0)
	            <div class="alert alert-danger">
	                @foreach($errors ->all() as $err) 
	                {{$err}} <br>
	                @endforeach
	            </div>
 			 @endif 
 			 @if(session('thongbao'))
              <div class="alert alert-success">
                  {{session('thongbao')}}
              </div>
       		 @endif
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<!-- REGISTERED-ACCOUNT START -->
				<div class="primari-box registered-account">
					<form class="new-account-box" id="accountLogin" method="post" action="dangnhap">
					 	<input type="hidden" name="_token" value="{{csrf_token()}}">
					 	<input type="hidden" name="page" value="dangnhap">
						<h3 class="box-subheading">Đăng nhập</h3>
						<div class="form-content">
							<div class="form-group primary-form-group">
								<label for="loginemail">Email address</label>
								<input type="text" value="{{old('email')}}" name="email" id="loginemail" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group">
								<label for="password">Password</label>
								<input type="password" value="{{old('password')}}" name="password" id="password" class="form-control input-feild">
							</div>
							<div class="forget-password">
								<p><a href="#">Quên mật khẩu ?</a></p>
							</div>
							<button type="submit" id="btn_dk" class="btn btn-danger">Đăng nhập</button>
						</div>
					</form>							
				</div>
				<!-- REGISTERED-ACCOUNT END -->
			</div>
		</div>
	</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->

@endsection