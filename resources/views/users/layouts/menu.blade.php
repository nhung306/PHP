
<!-- HEADER-BOTTOM-AREA START -->
<section class="header-bottom-area">
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-10">
			<!-- LEFT-CATEGORY-MENU START -->
			<div class="left-category-menu">
				<div class="left-product-cat">
					<div class="category-heading">
						<h2>Danh mục</h2>
					</div>
					<!-- CATEGORY-MENU-LIST START -->
					<div class="category-menu-list">
						<ul>
							@foreach($category as $ct)
							<li>
								<a href="sanpham/{{$ct->id}}">
									<img src="users/img/product/{{$ct->image}}" width="40px" heihgt ="60px"alt="">
								   <span class="cat-thumb hidden-md hidden-sm hidden-xs"></span> {{ $ct->name}}
							     </a>
							</li>
							@endforeach
							
						</ul>
					</div>
					<!-- CATEGORY-MENU-LIST END -->
				</div>
			</div>	
			<!-- LEFT-CATEGORY-MENU END -->			
		</div>
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
			<!-- MAIN-SLIDER-AREA START -->
			<div class="main-slider-area">
				<div class="slider-area">
					<div id="wrapper">
						<div class="slider-wrapper">
							<div id="mainSlider" class="nivoSlider">
								@foreach($slide as $sl)
								<img src="users/img/slider/homepage2/{{$sl->image}}" title ="#htmlcaption" alt="main slider" />
								@endforeach
							</div>
							<div id="htmlcaption" class="nivo-html-caption slider-caption">
								<div class="slider-progress"></div>
								<div class="slider-cap-text slider-text1">
									<div class="d-table-cell">
										<h2 class="animated bounceInDown">WELLCOME!</h2>
										<p class="animated bounceInUp">Giảm giá 20% đối với sản phẩm có giá trên 100 000 VNĐ</p>	
										<a class="wow zoomInDown" data-wow-duration="1s" data-wow-delay="1s" href="#">Xem thêm <i class="fa fa-caret-right"></i></a>													
									</div>
								</div>	
							</div>
						</div>
					</div>								
				</div>											
			</div>	
			<!-- MAIN-SLIDER-AREA END -->
		</div>						
	</div>
</div>
</section>
<!-- HEADER-BOTTOM-AREA END -->