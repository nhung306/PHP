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
				<span>Sản phẩm</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		 
		<div class="single-left-sidebar sidebar-left-add">
			<div class="sidebar-left zoom-img">
				<a href="javascript::;"><img src="users/img/slider/homepage2/anh11.jpg" height="211px"  alt="banner" /></a>
			</div>	
		</div>
		<div class="product-left-sidebar">
			<h2 class="left-title">Danh mục </h2>
			@foreach($category as $ct)
			<div class="category-tag">
				<a href="sanpham/{{$ct->id}}" value="{{$ct->id}}">{{$ct->name}}</a>
			</div>
			@endforeach
		</div>
	</div>	
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	<div class="right-all-product">
		<!-- PRODUCT-CATEGORY-HEADER START -->
		<div class="product-category-header">
			<div class="category-header-image">
				<img src="users/img/slider/homepage2/5_2.jpg" width="750px" height="211px"  alt="banner" />
												
			</div>
		</div>
		<!-- PRODUCT-CATEGORY-HEADER END -->
		<div class="product-category-title">
			<!-- PRODUCT-CATEGORY-TITLE START -->
			<h1>
				<span class="cat-name">Sản phẩm</span>
				<span class="count-product">Tất cả có {{count($product)}} sản phẩm</span>
			</h1>
			<!-- PRODUCT-CATEGORY-TITLE END -->
		</div>
		
	</div>
<!-- ALL GATEGORY-PRODUCT START -->
<div class="all-gategory-product">
	<div class="row">
		<ul class="gategory-product">
			<!-- SINGLE ITEM START -->
			@foreach($product as $pt)
			<li class="gategory-product-list col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="single-product-item">
					<form action="themgiohang/{{$pt->id}}" method="POST" id="frm-add-{{$pt->id}}">
					 	@csrf
					<div class="product-image">
						<a href="chitietsanpham/{{$pt->id}}"><img src="users/img/product/{{$pt->image}}" height ="189px" alt="{{$pt->name}}" /></a>
						<a href="sanpham/{{$pt->id}}" class="new-mark-box">new</a>
						<div class="overlay-content">
							<ul>
								<li>
									<a href="chitietsanpham/{{$pt->id}}" title="Quick view"><i class="fa fa-search"></i></a>
								</li>
								<li>
									<a href="javascript:void(0)" onclick="document.getElementById('frm-add-{{$pt->id}}').submit();"><i class="fa fa-shopping-cart">
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
							<span><i class="fa fa-eye" aria-hidden="true"></i> {{$pt->luotxem}}</span>
						</div>
						<a href="chitietsanpham/{{$pt->id}}">{{$pt->name}}</a>
						<div class="price-box">
							<span class="price">{{$pt->unit_price}}<sup>đ</sup></span>
							<span class="old-price">{{$pt->discount_price}}<sup>đ</sup></span>
						</div>
					</div>
				</div>									
			</li>
			<!-- SINGLE ITEM END -->
			@endforeach	
			<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">	
			<div class="panel-heading">
				<div class="panel-control">
					<ul class="pagination">
						 {!! $product->appends($_GET)->links() !!}
					</ul>
				</div>
		    </div>	
		    </div>			
		</ul>
	</div>
</div>
<!-- ALL GATEGORY-PRODUCT END -->

</div>
</div>
</div>
</section>
<!-- MAIN-CONTENT-SECTION END -->
<!-- BRAND-CLIENT-AREA START -->



@endsection