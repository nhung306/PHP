@extends('users.layouts.index')
@section('content')
<section class="main-content-section">
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- BSTORE-BREADCRUMB START -->
			<div class="bstore-breadcrumb">
				<a href="index.html">Trang chủ<span><i class="fa fa-caret-right"></i> </span> </a>
				<span> <i class="fa fa-caret-right"> </i> </span>
				<a href="shop-gird.html"> Sản phẩm </a>
				<span>{{$product->name}} </span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>				
	<div class="row">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<!-- SINGLE-PRODUCT-DESCRIPTION START -->
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
					<div class="single-product-view">
						  <!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="thumbnail_1">
								<div class="single-product-image">
									<img src="users/img/product/{{$product->image}}" width="400px" height="400px" alt="{{$product->name}}" />
									<a class="new-mark-box" href="#">new</a>
									<a class="fancybox" href="users/img/product/{{$product->image}}" data-fancybox-group="gallery"><span class="btn large-btn">Phóng to <i class="fa fa-search-plus"></i></span></a>
								</div>	
							</div>
						
						</div>										
					</div>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
					<div class="single-product-descirption">
						<h2>{{$product->name}}</h2>
						<div class="single-product-social-share">
							<ul>
								<li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
								<li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
								<li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a></li>
								<li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a></li>
							</ul>
						</div>
						<div class="single-product-review-box">
							<div class="rating-box">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-empty"></i>
							</div>
							<div class="read-reviews">
								Đọc đánh giá (1)
							</div>
							<div class="write-review">
								Viết đánh giá
							</div>		
						</div>
						<div class="single-product-price">
							<h2>${{$product->discount_price}}</h2>
						</div> 
						<h3 class="old-price">${{$product->unit_price}}</h3>
						<br>
						<div class="single-product-quantity">
							<p class="small-title">Số lượng:</p> 
							<div class="cart-quantity">
								<div class="cart-plus-minus-button single-qty-btn">
									<input class="cart-plus-minus sing-pro-qty" type="text" name="qtybutton" value="0">
								</div>
							</div>
						</div>
						<form action="themgiohang/{{$product->id}}" method="POST" id="frm-add-{{$product->id}}">
								@csrf
						<div class="single-product-add-cart">
							<a class="add-cart-text" title="Add to cart" href="javascript:void(0)" onclick="document.getElementById('frm-add-{{$product->id}}').submit();">Thêm giỏ hàng</a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
			<div class="single-product-right-sidebar clearfix">
				<h2 class="left-title">Danh mục </h2>
					@foreach($category as $ct)
					<div class="category-tag">
						<a href="sanpham/{{$ct->id}}" value="{{$ct->id}}">{{$ct->name}}</a>
					</div>
					@endforeach						
				</div>	
				<!-- SINGLE SIDE BAR END -->
				<!-- SINGLE SIDE BAR START -->						
				<div class="single-product-right-sidebar">
					<div class="onehalf-add-shope zoom-img">
						<a href="#"><img src="users/img/slider/homepage2/anh6.jpg" height="211px"  alt="banner" /></a>
					</div>					
				</div>
		</div>
	</div>
			<!-- SINGLE-PRODUCT-DESCRIPTION END -->
		<!-- SINGLE-PRODUCT INFO TAB START -->
		<div class="row">
		<div class="col-sm-12">
			<div class="product-more-info-tab">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs more-info-tab">
					<li class="active"><a href="#moreinfo" data-toggle="tab">Mô tả</a></li>
					<li><a href="#datasheet" data-toggle="tab">Đánh giá</a></li>
					<li><a href="#review" data-toggle="tab">Bình luận</a></li>
				</ul>
				  <!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="moreinfo">
						<div class="tab-description">
							<p>{{$product->content}}</p>
						</div>
					</div>
					<div class="tab-pane" id="datasheet">
						<div class="row tab-review-row">
							<div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
								<div class="tab-rating-box">
									<span>Đánh giá</span>
									<div class="rating-box">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-empty"></i>
									</div>	
																						
								</div>
							</div>
							
						</div>
					</div>
					<div class="tab-pane" id="review">
						<div class="row tab-review-row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<!-- REGISTERED-ACCOUNT START -->
						@if(Auth::check())
						<div class="primari-box registered-account">
						  
							<form class="new-account-box" id="accountLogin" method="post" action="{{route('binhluantheosp',$product->id)}}">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<h3 class="box-subheading">Bình luận</h3>
								<br>
								 <div class="media">
					                <a class="pull-left" href="#">
					                    <img class="media-object" style="width: 70px" src="https://via.placeholder.com/50x50" alt="">
					                </a>
					                <div class="media-body">
					                    <h4 class="media-heading">
					                        <b>Tên: {{$user->name}}</b>
					                        <br>
					                    </h4>
					                    <textarea id="demo-textarea-input" value="{{old('content')}}" name="content"   rows="5" class="form-control "  placeholder="nội dung"></textarea>
					                  
					                </div>
				               </div>
								<button type="submit" class="btn btn-success btn-p" >Phản hồi</button>
							</form>	

						</div>
						@else
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h2 class="page-title">Đăng nhập</h2>
							<!-- REGISTERED-ACCOUNT START -->
							<div class="primari-box registered-account">
								<form class="new-account-box" id="accountLogin" method="post" action="dangnhap">
									 <input type="hidden" name="_token" value="{{csrf_token()}}">
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
						@endif
						<!-- REGISTERED-ACCOUNT END -->
						</div>
					  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					   @foreach($comment as $cm)
					   <div class="media">
			                <a class="pull-left" href="#">
			                    <img class="media-object" style="width: 70px" src="https://via.placeholder.com/50x50" alt="">
			                </a>
			                <div class="media-body">
			                    <h4 class="media-heading">
			                        <b>Tên: {{$user->name}}</b>
			                        <br>
			                        <small>Datetime: {{$cm->created_at}} </small>
			                    </h4>
			                    {{$cm->content}}
			                  
			                </div>
		               </div>
		               @endforeach
						</div>
					</div>
				</div>									
			</div>
		</div>
		</div>
		</div>
<!-- SINGLE-PRODUCT INFO TAB END -->
<!-- RELATED-PRODUCTS-AREA START -->
		<div class="row">
		<div class="col-sm-12">
			<div class="left-title-area">
				<h2 class="left-title">sản phẩm nổi bật</h2>
			</div>	
		</div>
		<div class="related-product-area featured-products-area">
			<div class="col-sm-12">
				<div class=" row">
					<!-- RELATED-CAROUSEL START -->
					<div class="related-product">
						<!-- SINGLE-PRODUCT-ITEM START -->
						@foreach($product_nb as $nb)
						<div class="item">
							<div class="single-product-item">
								<div class="product-image">
									<a href="#"><img src="users/img/product/{{$nb->image}}" height="197px" alt="{{$nb->name}}" /></a>
								</div>
								<div class="product-info">
									<div class="customar-comments-box">
										<div class="rating-box">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="review-box">
											<span>1 Review(s)</span>
										</div>
									</div>
									<a href="#">Blouse</a>
									<div class="price-box">
										<span class="price">${{$nb->discount_price}}</span>
									<span class="old-price">${{$nb->unit_price}}</span>
									</div>
								</div>
							</div>							
						</div>
						@endforeach
						<!-- SINGLE-PRODUCT-ITEM END -->
						
										
					</div>
					<!-- RELATED-CAROUSEL END -->
				</div>	
			</div>
		</div>	
		</div>
		<!-- RELATED-PRODUCTS-AREA END -->
</div>


</section>
<!-- MAIN-CONTENT-SECTION END -->

@endsection