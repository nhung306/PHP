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
			<div class="single-left-sidebar sidebar-left-add">
				<div class="sidebar-left zoom-img">
					<a href="#"><img src="users/img/slider/homepage2/5_1.jpg" height="211px"  alt="banner" /></a>
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
				<img src="users/img/slider/homepage2/7_2.jpg"width="650px" height="211px"  alt="banner" />
												
			</div>
		</div>
		<!-- PRODUCT-CATEGORY-HEADER END -->
		<div class="product-category-title">
			<!-- PRODUCT-CATEGORY-TITLE START -->
			<h1>
				<span class="cat-name">Tin tức</span>
				<span class="count-product">Tin tức : {{count($news)}} lượt đăng </span>
			</h1>
			<!-- PRODUCT-CATEGORY-TITLE END -->
		</div>
		
	</div>
<!-- ALL GATEGORY-PRODUCT START -->
<div class="all-gategory-product">
	
		<div class="row">
          @foreach($news as $ne)
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<!-- LATEST-NEWS-SINGLE-POST START -->
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
										<a href="tintuc/{{$ne->id}}">Xem thêm <i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					
			</div>
		 @endforeach
		 <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">	
		 <div class="panel-heading">
				<div class="panel-control">
					<ul class="pagination">
						 {!! $news->links() !!}
					</ul>
				</div>
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