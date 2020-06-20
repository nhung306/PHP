@extends('users.layouts.index')
@section('content')
<?php $sum_total = 0; ?>
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- BSTORE-BREADCRUMB START -->
				<div class="bstore-breadcrumb">
					<a href="index.html">Trang chủ</a>
					<span><i class="fa fa-caret-right	"></i></span>
					<span>Giỏ hàng của bạn</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->
			</div>
		</div>
		<div class="row">
		  @if(count(Cart::getContent()) > 0)
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- SHOPPING-CART SUMMARY START -->
				<h2 class="page-title">Tóm tắt giỏ hàng <span class="shop-pro-item">Giỏ hàng của bạn có : {{ Cart::getTotalQuantity()}} sản phẩm</span></h2>
				<!-- SHOPPING-CART SUMMARY END -->
			</div>	
		  @endif
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- SHOPING-CART-MENU START -->
				<div class="shoping-cart-menu">
					<ul class="step">
						<li class="step-current first">
							<span>01. Tóm tắt đơn hàng</span>
						</li>
						<li class="step-todo second">
							<span>02. Đăng nhập</span>
						</li>
						<li class="step-todo third">
							<span>03. Thanh toán</span>
						</li>
					</ul>									
				</div>
				<!-- SHOPING-CART-MENU END -->
				<!-- CART TABLE_BLOCK START -->
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
							<?php $total = 0;  ?>
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
								<td id="total_product" class="price" colspan="1">{{number_format($sum_total)}}</td>
							</tr>

						</tfoot>		
						<!-- TABLE FOOTER END -->									
					</table>
					<!-- TABLE END -->
				</div>
				<!-- CART TABLE_BLOCK END -->
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="first_item primari-box mycartaddress-info">
					<!-- SINGLE ADDRESS START -->
					<ul class="address">
						<li>
							<h3 class="page-subheading box-subheading">
								THÔNG TIN LIÊN HỆ 							
							</h3>
						</li>
						<li><span class="address_company">Tên công ty: {{$company->name}}</span></li>
						<li><span class="address_address1">Địa chỉ: {{$company->address}}</span></li>
						<li><span class="address_phone">Số điện thoại: {{$company->phone}}</span></li>
						<li><span class="">Email: {{$company->email}}</span></li>
					</ul>	
					<!-- SINGLE ADDRESS END -->
				</div>						
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- RETURNE-CONTINUE-SHOP START -->
				<div class="returne-continue-shop">
					<a href="index.html" class="continueshoping"><i class="fa fa-chevron-left"></i>Quay lại</a>
					<a href="{{route('dathang')}}" class="procedtocheckout">Tiếp tục<i class="fa fa-chevron-right"></i></a>
				</div>	
				<!-- RETURNE-CONTINUE-SHOP END -->						
			</div>
		</div>
	</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->

@endsection