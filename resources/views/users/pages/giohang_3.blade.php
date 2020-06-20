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
							<span>Thanh toán</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2 class="page-title">Hình thức thanh toán <span class="shop-pro-item">Your shopping cart contains: 3 products </span></h2>
					</div>	
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shoping-cart-menu">
							<ul class="step">
								<li class="step-todo first step-done">
									<span><a href="cart.html">01. Tóm tắt</a></span>
								</li>
								<li class="step-todo second step-done">
									<span><a href="checkout-signin.html">02. Đăng nhập</a></span>
								</li>
								<li class="step-current third">
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
										<th class="cart-availability text-center">Khả định</th>
										<th class="cart-unit text-right">Giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart-total text-right">Tổng số tiền sản phẩm</th>
									</tr>
								</thead>
								<!-- TABLE HEADER END -->
								<!-- TABLE BODY START -->
								<tbody>
									<!-- SINGLE CART_ITEM START -->
									<tr>
										<td class="cart-product">
											<a href="#">
												<img alt="Faded" src="users/img/product/cart-image3.jpg">
											</a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="#">Faded Short Sleeves T-shirt</a></p>
											<small>SKU : demo_1</small>
											<small><a href="#">Size : S, Color : Orange</a></small>
										</td>
										<td class="cart-avail">
											<span class="label label-success">In stock</span>
										</td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price">$16.51</li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<span>1</span>
										</td>
										<td class="cart-total">
											<span class="price">$16.51</span>
										</td>
									</tr>
									<!-- SINGLE CART_ITEM END -->
									<!-- SINGLE CART_ITEM START -->
									<tr>
										<td class="cart-product">
											<a href="#">
												<img alt="Blouse" src="users/img/product/cart-image2.jpg">
											</a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="#">Summer Clothing Sleeves T-shirt</a></p>
											<small>SKU : demo_2</small>
											<small><a href="#">Size : S, Color : Blac</a></small>
										</td>
										<td class="cart-avail">
											<span class="label label-success">In stock</span>
										</td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price special-price">$22.95</li>
												<li class="price-percent-reduction">&nbsp;-15%&nbsp;</li>
												<li class="old-price">$27.00</li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<span>1</span>
										</td>
										<td class="cart-total">
											<span class="price">$22.95</span>
										</td>
									</tr>
									<!-- SINGLE CART_ITEM END -->
									<!-- SINGLE CART_ITEM START -->
									<tr>
										<td class="cart-product">
											<a href="#">
												<img alt="Faded" src="users/img/product/cart-image1.jpg">
											</a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="#">Casual Printed Dress</a></p>
											<small>SKU : demo_3</small>
											<small><a href="#">Size : L, Color : Green</a></small>
										</td>
										<td class="cart-avail">
											<span class="label label-success">In stock</span>
										</td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price special-price">$23.40</li>
												<li class="price-percent-reduction">&nbsp;-10%&nbsp;</li>
												<li class="old-price">$26.00</li>
											</ul>
										</td>
										<td class="cart_quantity text-center">
											<span>1</span>
										</td>
										<td class="cart-total">
											<span class="price">$23.40</span>
										</td>
									</tr>
									<!-- SINGLE CART_ITEM END -->
								</tbody>
								<!-- TABLE BODY END -->
								<!-- TABLE FOOTER START -->
								<tfoot>
									<tr>
										<td class="text-right" colspan="4">Tổng số tiền sản phẩm</td>
										<td class="price" colspan="2">$62.86</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Hình thức vận chuyển</td>
										<td class="price" colspan="2">$0.00</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Total shipping</td>
										<td class="price" colspan="2">$2.00</td>
									</tr>
									<tr>
										<td class="text-right" colspan="4">Total vouchers</td>
										<td class="price" colspan="2">$0.00</td>
									</tr>
									<tr>
										<td class="total-price-container text-right" colspan="4">
											<span>Total</span>
										</td>
										<td id="total-price-container" class="price" colspan="2">
											<span id="total-price">$64.86</span>
										</td>
									</tr>
								</tfoot>
								<!-- TABLE FOOTER END -->								
							</table>
							<!-- TABLE END -->
						</div>
						<!-- CART TABLE_BLOCK END -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
															<input type="radio" value="1" name="deliverymethod">
														</span>
													</div>
												</td>											
												<td class="delivery-method-icon">
													<img src="users/img/bank.png" alt="" />
												</td>
												<td class="carrey-info">
													<strong>BootExperts</strong><br>
													  Nhận tại cửa hàng
												</td>
												<td class="carrey-cost">Free</td>
											</tr>
									    </table>
										<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
									</div>
									<div class="table-responsive">
										<!-- PRODUCT-DELIVERY SINGLE OPTION START -->
									    <table class="table table-bordered delivery-table">
											<tr>
												<td class="delivery-option-radio">
													<div class="dalivery-radio">
														<span class="radio-box">
															<input type="radio" value="1" name="deliverymethod">
														</span>
													</div>
												</td>											
												<td class="delivery-method-icon">
													<img src="users/img/delivery-method.jpg" alt="" />
												</td>
												<td class="carrey-info">
													<strong>BootExperts</strong><br>
												      Vận chuyển bằng bưu điện
												</td>
												<td class="carrey-cost">
													$2.00 (tax.) 
												</td>
											</tr>
									    </table>
										<!-- PRODUCT-DELIVERY SINGLE OPTION END -->
									</div>
								</div>
							</div>
							<!-- PRODUCT-DELIVERY-ITEM START -->
							<!-- TERMS-OF-SERVICE START -->
							<div class="terms-of-service">
								<p>Điều khoản</p>
								<div class="form-group new-ac-form-group p-info-group ">
									<label class="cheker">
										<input type="checkbox" name="checkbox">
										<span></span>
									</label>
									<span class="agree">Tôi đồng ý với các điều khoản dịch vụ và sẽ tuân thủ chúng vô điều kiện.<a href="#"> (Đọc Điều khoản Dịch vụ)</a></span>
								</div>								
							</div>
							<!-- TERMS-OF-SERVICE END -->
						</div>
						<!-- PRODUCT-DELIVERY-OPTION END -->
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- FOUR-PAYMENT-METHOD START -->
						<div class="four-payment-method">
							<div class="single-payment-method payment-method-one">
								<a href="#">Thanh toán bằng ATM<i class="fa fa-chevron-right"></i></a>
							</div>		
						</div>
						<!-- FOUR-PAYMENT-METHOD END -->
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="index.html" class="continueshoping"><i class="fa fa-chevron-left"></i>Quay lại</a>
							<a href="#" class="procedtocheckout">Tiếp tục<i class="fa fa-chevron-right"></i></a>
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->							
					</div>
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->

@endsection