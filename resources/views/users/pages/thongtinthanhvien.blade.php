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
					<span>Thông tin thành viên</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="page-title">Thông tin thành viên</h2>
			</div>
			 @if(count($errors) > 0)
	            <div class="alert alert-danger">
	                @foreach($errors ->all() as $err) 
	                {{$err}} <br>
	                @endforeach
	            </div>
 			 @endif 
 			 
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<!-- CREATE-NEW-ACCOUNT START -->
				<div class="create-new-account">
					<form class="new-account-box primari-box" id="create-new-account" method="post" action="thongtinthanhvien">
						 <input type="hidden" name="_token" value="{{csrf_token()}}">
						<h3 class="box-subheading">Tài khoản</h3>
						<div class="form-content">
							<div class="form-group primary-form-group">
								<label>Tên</label>
								<input type="text" value="{{$users->name}}" name="name" id="name" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group">
								<label>Mật khẩu</label>
								<input type="password" value="{{$users->password}}" name="password" id="password" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group">
								<label>Nhập lại mật khẩu</label>
								<input type="password" value="{{$users->password}}" name="passwordAgain" id="passwordAgain" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group">
								<label>Email</label>
								<input type="text" value="{{$users->email}}" name="email" id="email" class="form-control input-feild">
							</div>
							
							<div class="form-group primary-form-group">
								<label>Số điện thoại</label>
								<input type="text" value="{{$users->phone}}" name="phone" id="phone" class="form-control input-feild" required>
							</div>
						
							<div class="form-group primary-form-group">
								<label>Địa chỉ</label>
								<input type="text" value="{{$users->address}}" name="address" id="address" class="form-control input-feild" required>
							</div>
							<button type="submit" id="btn_dk" class="btn btn-danger">Thay đổi</button>
						</div>
					</form>							
				</div>
				<!-- CREATE-NEW-ACCOUNT END -->
			</div>
			
		</div>
	</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->

@endsection