@extends('users.layouts.index')
@section('content')
@if(Auth::check())
<?php $sum_total = 0; ?>
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- BSTORE-BREADCRUMB START -->
				<div class="bstore-breadcrumb">
					<a href="index.html">Trang chủ</a>
					<span><i class="fa fa-caret-right"></i></span>
					<span>Thanh toán</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->
			</div>
		</div>
		<div class="row">
		  @if(count(Cart::getContent()) > 0)
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="page-title">Hình thức thanh toán <span class="shop-pro-item">Giỏ hàng của bạn có : {{ Cart::getTotalQuantity()}} sản phẩm</span></h2>
			</div>	
		  @endif
		<form action="{{route('postdathang')}}" method="POST" id="form">
                    @csrf
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- SHOPING-CART-MENU START -->
				<div class="shoping-cart-menu">
					<ul class="step">
						<li class="step-todo first step-done">
							<span><a href="{{route('giohang')}}">01. Tóm tắt</a></span>
						</li>
						<li class="step-todo second step-done">
							<span>02. Thanh toán</a></span>
						</li>
						<li class="step-current third">
							<span>03. Thanh toán</span>
						</li>
					</ul>									
				</div>

				<!-- SHOPING-CART-MENU END -->
			<div class="table-responsive">
			<!-- TABLE START -->
			<table class="table table-bordered" id="cart-summary">
				<!-- TABLE HEADER START -->
				<thead>
					<tr>
						<th class="cart-product">Sản phẩm</th>
						<th class="cart-description">Mô tả</th>
						<th class="cart-unit text-right">Đơn giá</th>
						<th class="cart_quantity text-center">Số Lượng</th>
						<th class="cart-delete">&nbsp;</th>
						<th class="cart-total text-right">Tổng tiền</th>
					</tr>
				</thead>
				<!-- TABLE HEADER END -->
				<!-- TABLE BODY START -->

				 @if(count(Cart::getContent()) > 0)
				<tbody>	
					<?php $total = 0; ?>
					@foreach(Cart::getContent() as $product)
					
						
						<!-- SINGLE CART_ITEM START -->
						<tr>
							<td class="cart-product">
								<a href="#"><img alt="Blouse" src="users/img/product/{{$product->attributes->image}}"></a>
							</td>
							<td class="cart-description">
								<p class="product-name"><a href="#">{{$product->name}}</a></p>
							</td>
							<td class="cart-unit">
								<ul class="price text-right">
									<li class="price">{{number_format($product->price)}} VNĐ</li>
								</ul>
							</td>
							<td class="cart_quantity text-center">
							
								<input class="cart-plus-minus" type="text" name="qtybutton"  value="{{$product->quantity}}">
									<form action="giamsoluonggiohang/{{$product->id}}" method="POST" id="frm-reduce-{{$product->id}}">
										@csrf
										<a href="javascript:void(0)" onclick="document.getElementById('frm-reduce-{{$product->id}}').submit();" class="dec qtybutton">-</a>
									</form>
									<form action="themsoluonggiohang/{{$product->id}}" method="POST" id="frm-add-{{$product->id}}">
										@csrf
										<a href="javascript:void(0)"  onclick="document.getElementById('frm-add-{{$product->id}}').submit();" class="inc qtybutton" >+</a>
									</form>
				
							</td>
							<form action="xoagiohangtheoid/{{$product->id}}" method="POST" id="frm-remove-{{$product->id}}">
								@csrf
							<td class="cart-delete text-center">
								<span>
									<a href="javascript:void(0)"  onclick="document.getElementById('frm-remove-{{$product->id}}').submit();" class="cart_quantity_delete" title="Delete"><i class="fa fa-trash-o"></i></a>
								</span>
							</td>
							</form>
							<td class="cart-total">
								<?php $total = ($product->quantity * $product->price); ?>
								<span class="price">{{number_format($total)}}</span>
							</td>
						</tr>
					
					<?php $sum_total += $total;  ?>
					<!-- SINGLE CART_ITEM END -->
                   @endforeach
				</tbody>
				@endif
				<!-- TABLE BODY END -->
				<!-- TABLE FOOTER START -->
				<tfoot>										
					<tr class="cart-total-price">
						<td class="cart_voucher" colspan="3" rowspan="2"></td>
						<td class="text-right" colspan="3">Tổng tiền đơn hàng :</td>
						<td id="total_product" class="price" colspan="1">

							{{number_format($sum_total)}}
							<input type="hidden" name="total" value="{{$sum_total}}">
						</td>
					</tr>

				</tfoot>		
				<!-- TABLE FOOTER END -->									
			</table>
			<!-- TABLE END -->
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- PRODUCT-DELIVERY-OPTION START -->
				<div class="product-delivery-option">
					<div class="product-delivery-address">
						<p>Lựa chọn 1 hình thức vận chuyển:</p>
					</div>
					<!-- PRODUCT-DELIVERY-ITEM START -->
					<div class="product-delivery-item">
						<div class="product-delivery-single-item">
							<div class="table-responsive">
								<!-- PRODUCT-DELIVERY SINGLE OPTION START -->
							    <table class="table table-bordered delivery-table">
									<tr>
										<td class="delivery-option-radio">
											<div class="dalivery-radio">
												<span class="radio-box">
													<input type="radio" value="0" checked="" name="payment">
												</span>
											</div>
										</td>											
										<td class="delivery-method-icon">
											<img src="users/img/cheque.png" alt="" />
										</td>
										<td class="carrey-info">
											<strong> Thanh toán trực tuyến</strong><br>
											 
										</td>
									</tr>
							    </table>
								<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
							</div>	
						</div>
					</div>
					<!-- PRODUCT-DELIVERY-ITEM START -->
				</div>
				<!-- PRODUCT-DELIVERY-OPTION END -->
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- RETURNE-CONTINUE-SHOP START -->
				<div class="returne-continue-shop">
					<a href="{{route('giohang')}}" class="continueshoping"><i class="fa fa-chevron-left"></i>Quay lại</a>
                    <button type="submit" id="btn_sb" class="btn btn-danger1">Thanh toán</button>
				</div>	
				<!-- RETURNE-CONTINUE-SHOP END -->							
			</div>
           </div>
       </form>


		</div>
	</div>
</section>
@else
<!-- MAIN-CONTENT-SECTION END -->
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
	<div class="container">

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- BSTORE-BREADCRUMB START -->
				<div class="bstore-breadcrumb">
					<a href="index.html">Trang chủ</a>
					<span><i class="fa fa-caret-right	"></i></span>
					<span>Đăng ký / Đăng nhập</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="page-title">Đăng ký / Đăng nhập</h2>
			</div>	
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			 	<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="{{route('giohang')}}">01. Tóm tắt</a></span>
								</li>
								<li class="step-current second">
									<span>02. Đăng nhập</span>
								</li>
								<li class="step-todo third">
									<span>03. Thanh toán</span>
								</li>
							</ul>									
						</div>
						<!-- SHOPING-CART-MENU END -->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<!-- CREATE-NEW-ACCOUNT START -->
				<div class="create-new-account">
					<form class="new-account-box primari-box" id="create-new-account" method="post" action="dangki">
						 <input type="hidden" name="_token" value="{{csrf_token()}}">
						<h3 class="box-subheading">Tạo tài khoản</h3>
						<div class="form-content">
							<p> Vui lòng nhập đầy đủ thông tin.</p>
							<div class="form-group primary-form-group">
								<label>Tên</label>
								<input type="text" value="{{old('name')}}" name="name" id="name" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group">
								<label>Mật khẩu</label>
								<input type="password" value="{{old('password')}}" name="password" id="password" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group">
								<label>Nhập lại mật khẩu</label>
								<input type="password" value="{{old('passwordAgain')}}" name="passwordAgain" id="passwordAgain" class="form-control input-feild">
							</div>
							<div class="form-group primary-form-group">
								<label>Email</label>
								<input type="text" value="{{old('email')}}" name="email" id="email" class="form-control input-feild">
							</div>
							
							<div class="form-group primary-form-group">
								<label>Số điện thoại</label>
								<input type="text" value="{{old('phone')}}" name="phone" id="phone" class="form-control input-feild" required>
							</div>
						
							<div class="form-group primary-form-group">
								<label>Địa chỉ</label>
								<input type="text" value="{{old('address')}}" name="address" id="address" class="form-control input-feild" required>
							</div>
							<button type="submit" id="btn_dk" class="btn btn-danger">Đăng kí</button>
						</div>
					</form>							
				</div>
				<!-- CREATE-NEW-ACCOUNT END -->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<!-- REGISTERED-ACCOUNT START -->
				<div class="primari-box registered-account">
					<form class="new-account-box" id="accountLogin" method="post" action="dangnhap">
					 	<input type="hidden" name="_token" value="{{csrf_token()}}">
					 	<input type="hidden" name="page" value="giohang">
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

@endif

@endsection