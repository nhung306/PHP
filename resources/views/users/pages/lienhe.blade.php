@extends('users.layouts.index')
@section('content')

<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.html">Trang thủ</a>
				<span><i class="fa fa-caret-right"></i></span>
				<span>Liên hệ</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		  <div class="lienhe_right">
		   <h1>{{$company->name}}</h1>
		   <p>Địa chỉ : {{$company->address}}</p>
		   <p>Số điện thoại : {{$company->phone}}</p>
		   <p>Email : {{$company->email}}</p>
		   <p>Địa chỉ : {{$company->address}}</p>
		 </div>
	    </div>
	    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	    	<div class="lienhe_left">
		 	 <img src="users/img/slider/homepage2/anh2.jpg" width="550" height="211px"  alt="banner" />
		    </div>
	    </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        	<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.674055136489!2d106.5968250142869!3d10.759584162447693!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752c4ed0bce16f%3A0xdbee4a7d0b2925a5!2zTMOqIMSQw6xuaCBD4bqpbiwgQsOsbmggVMOibiwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1591705023796!5m2!1svi!2s" width="550" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p>
        </div>
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<form action="{{route('lienhe')}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<input type="text" class="form-control" value="{{old('name')}}" placeholder="Họ tên của bạn" name="name">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email"  value="{{old('email')}}" placeholder="Email của bạn" >
				</div>
				<div class="form-group">
					<input type="number" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Số điện thoại của bạn" >
				</div>
                <div class="form-group">
				<textarea id="demo-textarea-input" id="demo" rows="10" class="form-control ckeditor" name="content" placeholder="Nội dung">{{old('content')}}</textarea>
				</div>
								
				<button type="submit" id="btn_dk" class="btn btn-danger">Liên hệ</button>
			</form>
         </div>
	</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->


@endsection