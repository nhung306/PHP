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
				<span>Tin tức</span>
			</div>
			<!-- BSTORE-BREADCRUMB END -->
		</div>
	</div>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		  <div class="single-left-sidebar sidebar-best-seller">
			<div class="left-title-area">
				<h2 class="left-title">Tin tức liên quan</h2>
			</div>
			<div class="row">
				<!-- SIDEBAR-BEST-SELLER-CAROUSEL START -->	

					<div class="item">
						<!-- SINGLE-PRODUCT-ITEM START -->
						@foreach($news_nb as $nb)
						<div class="single-product-item">
							<div class="sidebar-product-image">
								<a href="tintuc/{{$nb->id}}"><img src="users/img/new/{{$nb->image}}" width="85px" alt="{{ $nb->name}}" /></a>
							</div>
							<div class="product-info sede-pro-info">
								<h2><a href="tintuc/{{$nb->id}}">{{$nb->title}}</a></h2>
							<div class="latest-post-info">
								<i class="fa fa-calendar"></i><span>{{$nb->created_at}}</span>
							</div>
							</div>
						</div>
						@endforeach
						<!-- SINGLE-PRODUCT-ITEM END -->							
					</div>
					<!-- SIDEBAR-BEST-SELLER SINGLE ITEM END -->	
			</div>
		</div>
		
		<!-- SIDEBAR-LEFT-ADD START -->
		<div class="single-left-sidebar sidebar-left-add">
			<div class="sidebar-left zoom-img">
				<a href="jascript::;"><img src="users/img/slider/homepage2/7_4.jpg" height="211px"  alt="banner" /></a>
			</div>	
		</div>
		<!-- SIDEBAR-LEFT-ADD END -->
		<!-- LEFT SIDEBAR-BEST-SELLER START -->

		<div class="product-left-sidebar">
			<h2 class="left-title">Danh mục </h2>
			@foreach($category as $ct)
			<div class="category-tag">
				<a href="#" value={{$ct->id}}>{{$ct->name}}</a>
			</div>
			@endforeach
		</div>
	</div>	
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	<div class="right-all-product">
		<!-- PRODUCT-CATEGORY-HEADER START -->
		<div class="product-category-header">
			<div class="category-header-image">
				<img src="users/img/slider/homepage2/7_1.jpg" height="211px"  alt="banner" />
												
			</div>
		</div>
		<!-- PRODUCT-CATEGORY-HEADER END -->
		<div class="product-category-title">
			<!-- PRODUCT-CATEGORY-TITLE START -->
			<h1>
				{{ $news->title}}

			</h1>
			<!-- PRODUCT-CATEGORY-TITLE END -->
		</div>
		
	</div>
<!-- ALL GATEGORY-PRODUCT START -->
<div class="all-gategory-product">
		<div class="item">
			<div class="latest-news-post">
					<h2>{{$news->title}}</h2>
					<br>
					<img src="users/img/new/{{$news->image}}" width="500px" name="$news->title" />
					<div class="latest-post-info">
						<i class="fa fa-calendar"></i><span>{{$news->created_at}}</span>
					</div>
					
					<p>{{$news->content}}</p>
					
			</div>
		</div>
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