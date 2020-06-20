<!-- HEADER-TOP START -->
<div class="header-top">
	<div class="container">
		<div class="row">
			<!-- HEADER-LEFT-MENU START -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="header-left-menu">
					<div class="welcome-info">
					<p><a href="#" class="text-primary">HELLO! WELLCOME!</a></p>
					</div>
				</div>
			</div>
			<!-- HEADER-LEFT-MENU END -->
			<!-- HEADER-RIGHT-MENU START -->
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
				<div class="header-right-menu">
					<nav>
						<ul class="list-inline">
						 @if(Auth::check())
						 	
							<li><a href="thongtinthanhvien"><i class="fa fa-user"></i> {{Auth::user()->name}}</a></li>
							<li><a href="{{route('dangxuat')}}"> Đăng xuất</a></li>
						 @else
							<li><a href="{{route('user_dangki')}}">Đăng ký</a></li>
							<li><a href="{{route('user_dangnhap')}}">Đăng nhập</a></li>
						 @endif
						</ul>									
					</nav>
				</div>
			</div>
			<!-- HEADER-RIGHT-MENU END -->
		</div>
	</div>
</div>
<!-- HEADER-TOP END -->
<!-- HEADER-MIDDLE START -->
<section class="header-middle">
	<div class="container">
			<div class="col-sm-12">
				<!-- LOGO START -->
				<div class="logo">
				
					<a href="{{route('trangchu')}}"><img src="users/img/logo7.jpg"width="190px" height="100px"alt="bstore logo" /></a>
				</div>
				<!-- LOGO END -->
				<!-- HEADER-RIGHT-CALLUS START -->
				
				<div class="header-right-callus">
					<h3>Gọi hỏi đáp: </h3>
					<span>0364-844-036</span>
				</div>
		
				<!-- HEADER-RIGHT-CALLUS END -->
				<!-- CATEGORYS-PRODUCT-SEARCH START -->
				<div class="categorys-product-search">
					<form action="{{route('timkiemtheosanpham')}}" method="GET">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="search-product form-group">
							<input type="text" class="form-control search-form" name="search" placeholder="Tìm kiếm theo sản phẩm... " />
							<button class="search-button" value="Search"  type="submit">
								<i class="fa fa-search"></i>
							</button>									 
						</div>
					</form>
				</div>
				<!-- CATEGORYS-PRODUCT-SEARCH END -->
			</div>
		</div>
	</div>
</section>
<!-- HEADER-MIDDLE END -->
<!-- MAIN-MENU-AREA START -->
<header class="main-menu-area">
<div class="container">
<div class="row">
<!-- SHOPPING-CART START -->
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
	<div class="shopping-cart-out pull-right">
		<div class="shopping-cart">
		@if(count(Cart::getContent()) > 0)
			<a class="shop-link" href="{{route('giohang')}}" title="View my shopping cart">
				<i class="fa fa-shopping-cart cart-icon"></i>
				<b>My Cart</b>
				<span class="ajax-cart-quantity">{{ Cart::getTotalQuantity()}}</span>
			</a>
			<div class="shipping-cart-overly" style="overflow: auto; height: auto;">
				<?php $total = 0; ?>
				@foreach(Cart::getContent() as $product)
				<div class="shipping-item">
					<form action="xoagiohangtheoid/{{$product->id}}" method="POST" id="frm-remove-{{$product->id}}">
						@csrf
						<span class="cross-icon" onclick="document.getElementById('frm-remove-{{$product->id}}').submit();"><i class="fa fa-times-circle"></i></span>
					</form>
					<div class="shipping-item-image">
						<a href="chitietsanpham/{{ $product->id }}" style="width: 55px;"><img src="users/img/product/{{$product->attributes->image}}" alt="shopping image" /></a>
					</div>
					<div class="shipping-item-text">
						<span>{{ $product-> quantity}} <span class="pro-quan-x">x</span> <a href="chitietsanpham/{{ $product->id }}" class="pro-cat">{{ $product-> name}}</a></span>
						<p><b>{{ number_format($product->quantity * $product->price) }} VND</b></p>
					</div>
				</div>
				<?php $total += ($product->quantity * $product->price); ?>
				@endforeach
				<div class="shipping-total-bill">
					<div class="total-shipping-prices">
						<span class="shipping-total"><b>{{ number_format($total) }} VND</b></span>
						<span>Tổng</span>
					</div>										
				</div>
				<div class="shipping-checkout-btn">
					<a href="{{route('giohang')}}">Check out <i class="fa fa-chevron-right"></i></a>
				</div>
			</div>
		@else
			<a class="shop-link" href="{{route('giohang')}}" title="View my shopping cart">
				<i class="fa fa-shopping-cart cart-icon"></i>
				<b>My Cart</b>
				<span class="ajax-cart-quantity">0</span>
			</a>
		@endif
		</div>
	</div>
</div>	
<!-- SHOPPING-CART END -->
<!-- MAINMENU START -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
	<div class="mainmenu">
		<nav>
			<ul class="list-inline mega-menu">
				<li class="active">
					<a href="{{route('trangchu')}} ">Trang chủ</a>
				</li>
				
				<li>
					<a href="{{route('sanpham')}}">Sản phẩm</a>
				</li>
				
				<li><a href="{{route('tintuc')}}">Tin tức</a></li>
				<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
			</ul>
		</nav>
	</div>
</div>
<!-- MAINMENU END -->
</div>
<div class="row">
<!-- MOBILE MENU START -->
<div class="col-sm-12 mobile-menu-area">
	<div class="mobile-menu hidden-md hidden-lg" id="mob-menu">
		<span class="mobile-menu-title">MENU</span>
		<nav>
			<ul>
				<li><a href="{{route('trangchu')}}">Trang chủ</a>													
				</li>								
				<li>
					<a href="{{route('sanpham')}}">Sản phẩm</a>
				</li>
				
				<li><a href="{{route('tintuc')}}">Tin tức</a></li>
				<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
			</ul>
		</nav>
	</div>						
</div>
<!-- MOBILE MENU END -->
</div>				
</div>
</header>
<!-- MAIN-MENU-AREA END -->