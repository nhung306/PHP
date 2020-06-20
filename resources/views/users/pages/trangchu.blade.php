@extends('users.layouts.index')
@section('menu')
@include('users.layouts.menu')
@endsection
@section('content')

<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section">
<div class="container">
<div class="row">
	<!-- LEFT-SIDEBAR START -->
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<!-- SIDEBAR-LEFT-ADD START -->
		<div class="single-left-sidebar sidebar-left-add">
			<div class="sidebar-left zoom-img">
				<a href="javascript::;"><img src="users/img/new/luk-chup.jpg"  alt="bánh trái cây" /></a>
			</div>	
		</div>
		<div class="single-left-sidebar sidebar-best-seller">
			<div class="left-title-area">
				<h2 class="left-title">Bánh Mochi</h2>
			</div>
			<div class="row">
				<!-- SIDEBAR-BEST-SELLER-CAROUSEL START -->			
				<div class="sidebar-best-seller-carousel">
					<!-- SIDEBAR-BEST-SELLER SINGLE ITEM START -->
					<div class="item">
						<!-- SINGLE-PRODUCT-ITEM START -->
						@foreach($product_bm as $bm)
						<div class="single-product-item">
							<div class="sidebar-product-image">
								<a href="chitietsanpham/{{$bm->id}}"><img src="users/img/product/{{$bm->image}}" width="85px" alt="{{ $bm->name}}" /></a>
							</div>
							<div class="product-info sede-pro-info">
								<a href="chitietsanpham/{{$bm->id}}">{{ $bm->name}}</a>
								<div class="customar-comments-box">
									<div class="rating-box">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
								</div>  
								<div class="price-box">
									<span class="price">${{$bm->discount_price}}<sup>đ</sup></span>
									<span class="old-price">${{$bm->unit_price}}<sup>đ</sup></span>
								</div>
							</div>
						</div>
						@endforeach
						<!-- SINGLE-PRODUCT-ITEM END -->							
					</div>
					<!-- SIDEBAR-BEST-SELLER SINGLE ITEM END -->
				</div>	
				<!-- SIDEBAR-BEST-SELLER-CAROUSEL END -->	
			</div>
		</div>
		<!-- LEFT SIDEBAR-BEST-SELLER END -->
	</div>	
	<!-- LEFT-SIDEBAR END -->
	<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="new-product-area">
					<div class="left-title-area">
						<h2 class="left-title">Sản phẩm nổi bật</h2>
					</div>						
					<div class="row">
						<div class="col-xs-12">
							<div class="row">
								<!-- HOME2-NEW-PRO-CAROUSEL START -->
								<div class="home2-new-pro-carousel">
									<!-- NEW-PRODUCT SINGLE ITEM START -->
									@foreach($product as $pt)
									<div class="item">
										<div class="new-product">
											<div class="single-product-item">
												<div class="product-image">
													<a href="chitietsanpham/{{$pt->id}}"><img src="users/img/product/{{$pt->image}}" width="250px"height="190px" alt="{{$pt->name}}" /></a>
													<a href="#" class="new-mark-box">new</a>
													<form action="themgiohang/{{$pt->id}}" method="POST" id="frm-add-{{$pt->id}}">
														@csrf
													<div class="overlay-content">
														<ul>
															<li><a href="chitietsanpham/{{$pt->id}}" title="Quick view"><i class="fa fa-search"></i></a></li>
															<li>
																<a href="javascript:void(0)" onclick="document.getElementById('frm-add-{{$pt->id}}').submit();"><i class="fa fa-shopping-cart"></i></a>
															</li>
															
														</ul>
													</div>
													</form>
												</div>
												<div class="product-info">
													<div class="customar-comments-box">
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>
														<div class="review-box">
															<span><i class="fa fa-eye" aria-hidden="true"></i> {{$pt->luotxem}}</span>
														</div>
													</div>
													<a href="single-product.html">{{$pt->name}}</a>
													<div class="price-box">
														<span class="price">{{number_format($pt->discount_price)}} <sup>đ</sup></span>
														<span class="old-price">{{number_format($pt->unit_price)}}<sup>đ</sup></span>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									
								</div>
								<!-- HOME2-NEW-PRO-CAROUSEL END -->
							</div>
						</div>
					</div>
				</div>										
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
				<!-- TOW-COLUMN-ADD START -->
				<div class="tow-column-add zoom-img">
					<a href="javascript::;"><img src="users/img/slider/homepage2/3_1.png"  height="211px"  alt="banner" /></a>
				</div>
				<!-- TOW-COLUMN-ADD END -->
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<!-- TOW-COLUMN-ADD START -->
				<div class="one-column-add zoom-img">
					<a href="javascript::;"><img src="users/img/slider/homepage2/5_2.jpg" height="211px"  alt="banner" /></a>
				</div>	
				<!-- TOW-COLUMN-ADD END -->
			</div>	
			<div class="col-xs-12">
				<!-- SALE-PODUCT-AREA START -->
				<div class="sale-poduct-area new-product-area">
					<div class="left-title-area">
						<h2 class="left-title">Bánh Thái Lan</h2>
					</div>
					<div class="row">
						<!-- HOME2-SALE-CAROUSEL START -->
						<div class="home2-sale-carousel">
							<!-- NEW-PRODUCT SINGLE ITEM START -->
							@foreach($product_n as $pn)
							<div class="item">
								<div class="new-product">
									<div class="single-product-item">
										<form action="themgiohang/{{$pn->id}}" method="POST" id="frm-add-{{$pn->id}}">
											@csrf
										<div class="product-image">
											<a href="chitietsanpham/{{$pn->id}}"><img src="users/img/product/{{$pn->image}}" height="190px" alt="{{$pn->name}}" /></a>
											<a href="chitietsanpham/{{$pn->id}}" class="new-mark-box">new</a>
											<div class="overlay-content">
												<ul>
													<li><a href="chitietsanpham/{{$pn->id}}" title="Quick view"><i class="fa fa-search"></i></a></li>
													<li>
														<a href="javascript:void(0)" onclick="document.getElementById('frm-add-{{$pn->id}}').submit();"><i class="fa fa-shopping-cart"></i>
														</a>
													</li>
												</ul>
											</div>
										</div>
										</form>
										<div class="product-info">
											<div class="customar-comments-box">
												<div class="rating-box">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half-empty"></i>
													<i class="fa fa-star-half-empty"></i>
												</div>
												<div class="review-box">
													<span><i class="fa fa-eye" aria-hidden="true"></i> {{$pn->luotxem}}</span>
												</div>
											</div>
											<a href="chitietsanpham/{{$pn->id}}">{{$pn->name}}</a>
											<div class="price-box">
												<span class="price">${{$pn->discount_price}}<sup>đ</sup></span>
												<span class="old-price">${{$pn->unit_price}}<sup>đ</sup></span>

											</div>
										</div>
									</div>
								</div>
							</div>
						  @endforeach
							<!-- NEW-PRODUCT SINGLE ITEM END -->
						<!-- HOME2-SALE-CAROUSEL END -->
					</div>
				</div>
				<!-- SALE-PODUCT-AREA end -->
			</div>
		</div>	
	</div>	
</div>
</div>
</section>	
<!-- MAIN-CONTENT-SECTION END -->
<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section-full-column">
<div class="container">
<div class="row">
	<!-- IMAGE-ADD-AREA START -->
	<div class="image-add-area">
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<!-- SINGLE ADD START -->
			<div class="onehalf-add-shope zoom-img">
				<a href="javascript::;"><img src="users/img/slider/homepage2/6_2.jpg"width="650px" height="211px"  alt="banner" /></a>
			</div>
			<!-- SINGLE ADD END -->
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<!-- SINGLE ADD START -->
			<div class="onehalf-add-shope zoom-img">
				<a href="javascript::;"><img src="users/img/slider/homepage2/5_1.jpg"width="550px" height="211px"  alt="banner" /></a>
			</div>
			<!-- SINGLE ADD END -->
		</div>						
	</div>
	<!-- IMAGE-ADD-AREA END -->
</div>
<div class="row">
	<div class="col-xs-12">
		<!-- FEATURED-PRODUCTS-AREA START -->
		<div class="featured-products-area">
			<div class="left-title-area">
				<h2 class="left-title">Tất cả sản phẩm</h2>
			</div>	
			<div class="row">
				<!-- FEARTURED-CAROUSEL START -->	
		    @foreach($product_tc as $tc)
			  <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<div class="item">
						
						<!-- SINGLE-PRODUCT-ITEM START -->
						<div class="single-product-item">
							<form action="themgiohang/{{$tc->id}}" method="POST" id="frm-add-{{$tc->id}}">
								@csrf
							<div class="product-image">
								<a href="chitietsanpham/{{$tc->id}}"><img src="users/img/product/{{$tc->image}}" height="190px" alt="{{$tc->name}}" /></a>
								<a href="chitietsanpham/{{$tc->id}}" class="new-mark-box">new</a>
								<div class="overlay-content">
									<ul>
										<li><a href="chitietsanpham/{{$tc->id}}" title="Quick view"><i class="fa fa-search"></i></a></li>
										<li>
											<a href="javascript:void(0)" onclick="document.getElementById('frm-add-{{$tc->id}}').submit();"><i class="fa fa-shopping-cart">
											</i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						    </form>
			
							<div class="product-info">
								<div class="customar-comments-box">
									<div class="rating-box">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-empty"></i>
									</div>
									<div class="review-box">
										<span><i class="fa fa-eye" aria-hidden="true"></i> {{$tc->luotxem}}</span>
									</div>
								</div>
								<a href="chitietsanpham/{{$tc->id}}">{{$tc->name}}</a>
								<div class="price-box">
									<span class="price">${{$tc->discount_price}}<sup>đ</sup></span>
									<span class="old-price">${{$tc->unit_price}}<sup>đ</sup></span>
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT-ITEM END -->
					
					</div>
					<!-- SINGLE ITEM END -->
			     </div>	
			    @endforeach	
			 					
			</div>
			<div class="panel-heading">
				<div class="panel-control">
					<ul class="pagination">
						 {!! $product_tc->links() !!}
					</ul>
				</div>
			</div>
		</div>
		<!-- FEATURED-PRODUCTS-AREA END -->
	</div>						
</div>
<div class="row">
	<!-- IMAGE-ADD-AREA START -->
	<div class="image-add-area">
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
			<!-- SINGLE ADD START -->
			<div class="onehalf-add-shope zoom-img">
				<a href="#"><img src="users/img/slider/homepage2/7_2.jpg" width="650px"height="211px"  alt="banner" /></a>
			</div>
			<!-- SINGLE ADD END -->
		</div>
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
			<!-- SINGLE ADD START -->
			<div class="onehalf-add-shope zoom-img">
				<a href="#"><img src="users/img/slider/homepage2/5_1.jpg" width="550"height="211px"  alt="banner" /></a>
			</div>
			<!-- SINGLE ADD END -->
		</div>						
	</div>
	<!-- IMAGE-ADD-AREA END -->
</div>
</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
<!-- LATEST-NEWS-AREA START -->
<section class="latest-news-area">
<div class="container">
<div class="row">
	<div class="latest-news-row">
		<div class="center-title-area">
			<h2 class="center-title"><a href="{{route('tintuc')}}">Tin mới</a></h2>
		</div>	
		<div class="col-xs-12">
			<div class="row">
				<!-- LATEST-NEWS-CAROUSEL START -->
				<div class="latest-news-carousel">
					<!-- LATEST-NEWS-SINGLE-POST START -->
					@foreach($news as $ne)
					<div class="item">
						<div class="latest-news-post">
							<div class="single-latest-post">
								<a href="tintuc/{{$ne->id}}"><img src="users/img/new/{{$ne->image}}" height="164px" alt="latest-post" /></a>
								<h2><a href="tintuc/{{$ne->id}}">{{$ne->title}}</a></h2>
								<p>{{$ne->content}}</p>
								<div class="latest-post-info">
									<i class="fa fa-calendar"></i><span>{{$ne->created_at}}</span>
								</div>
								<div class="read-more">
									<a href="tintuc/{{$ne->id}}>Xem thêm <i class="fa fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<!-- LATEST-NEWS-SINGLE-POST END -->					
				</div>	
				<!-- LATEST-NEWS-CAROUSEL START -->
			</div>
		</div>
	</div>
</div>
</div>
</section>


@endsection