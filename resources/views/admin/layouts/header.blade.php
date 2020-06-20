<!--NAVBAR-->
<!--===================================================-->
<header id="navbar">
	<div id="navbar-container" class="boxed">

		<!--Brand logo & name-->
		<!--================================-->
		<div class="navbar-header">
			<a href="index.html" class="navbar-brand">
				<img src="admin/img/admin.png" alt="Nifty Logo" class="brand-icon">
				<div class="brand-title">
					<span class="brand-text"> QUẢN TRỊ </span>
				</div>
			</a>
		</div>
		<!--================================-->
		<!--End brand logo & name-->


		<!--Navbar Dropdown-->
		<!--================================-->
		<div class="navbar-content clearfix">
			<ul class="nav navbar-top-links pull-left">

				<!--Navigation toogle button-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<li class="tgl-menu-btn">
					<a class="mainnav-toggle" href="#">
						<i class="fa fa-navicon fa-lg"></i>
					</a>
				</li>
				<!--Notification dropdown-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			</ul>
			<ul class="nav navbar-top-links pull-right">

				<!--Language selector-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<li>
					<a href="{{route('trangchu')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Trở về giao diện</a>
				</li>
				<li class="dropdown">
					<a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
						<span> <img class="lang-flag" src="admin/img/flags/united-kingdom.png" alt="English">English </span>
					</a>
				</li>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End language selector-->

				<!--User dropdown-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ul class="nav navbar-nav pull-right">
                    @if(Auth::check())
                    <li>
                        <a href="nguoidung">
                            <span> <i class="wz-icon fa fa-user fa-1x"></i> {{Auth::user()->name}}</span>
                           
                        </a>
                    </li>

                    <li>
                        <a href="{{route('dangxuatAdmin')}}"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                    </li>
                   
                     @endif
                </ul>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End user dropdown-->

			</ul>
		</div>
		<!--================================-->
		<!--End Navbar Dropdown-->

	</div>
</header>
<!--===================================================-->
<!--END NAVBAR-->

<div class="boxed">

	<!--CONTENT CONTAINER-->
	<!--===================================================-->
	<div id="content-container">
		<!--MAIN NAVIGATION-->
		<!--===================================================-->
		<nav id="mainnav-container">
			<div id="mainnav">

				<!--Shortcut buttons-->
				<!--================================-->
				<div id="mainnav-shortcut">
					<ul class="list-unstyled">
						<li class="col-xs-4" data-content="Additional Sidebar">
							<a id="demo-toggle-aside" class="shortcut-grid" href="#">
								<i class="fa fa-magic"></i>
							</a>
						</li>
						<li class="col-xs-4" data-content="Notification">
							<a id="demo-alert" class="shortcut-grid" href="#">
								<i class="fa fa-bullhorn"></i>
							</a>
						</li>
						<li class="col-xs-4" data-content="Page Alerts">
							<a id="demo-page-alert" class="shortcut-grid" href="#">
								<i class="fa fa-bell"></i>
							</a>
						</li>
					</ul>
				</div>
				<!--================================-->
				<!--End shortcut buttons-->


				<!--Menu-->
				<!--================================-->
				<div id="mainnav-menu-wrap">
					<div class="nano">
						<div class="nano-content">
							<ul id="mainnav-menu" class="list-group">
					
								<!--Category name-->
								<li class="list-header">Trang chủ</li>
					
								<!--Menu list item-->
								<li>
									<a href="{{route('admintrangchu')}}">
										<i class="fa fa-dashboard"></i>
										<span class="menu-title">
											<strong>Trangchu</strong>
											<span class="label label-success pull-right">Top</span>
										</span>
									</a>
								</li>
					
								<!--Menu list item-->
								<li class="list-header">Bảng</li>
								<li>
									<a href="{{route('danhsachdanhmuc')}}">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Danh mục</strong>
										</span>
										<i class="arrow"></i>
									</a>
					
									<!--Submenu-->
									<ul class="collapse">
										<li><a href="{{route('danhsachdanhmuc')}}">Danh sách</a></li>
										<li><a href="{{route('themdanhmuc')}}">Thêm</a></li>
									</ul>
								</li>
					            <li>
									<a href="{{route('danhsachsanpham')}}">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Sản phẩm</strong>
										</span>
										<i class="arrow"></i>
									</a>
					
									<!--Submenu-->
									<ul class="collapse">
										<li><a href="{{route('danhsachsanpham')}}">Danh sách</a></li>
										<li><a href="{{route('themsanpham')}}">Thêm</a></li>
									</ul>
								</li>
							     <li>
									<a href="{{route('danhsachtintuc')}}">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Tin tức</strong>
										</span>
										<i class="arrow"></i>
									</a>
					
									<!--Submenu-->
									<ul class="collapse">
										<li><a href="{{route('danhsachtintuc')}}">Danh sách</a></li>
										<li><a href="{{route('themtintuc')}}">Thêm</a></li>
									</ul>
								</li>
							
								<li>
									<a href="{{route('danhsachnguoidung')}}">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Thành viên</strong>
										</span>
										<i class="arrow"></i>
									</a>
					
									<!--Submenu-->
									<ul class="collapse">
										<li><a href="{{route('danhsachnguoidung')}}">Danh sách</a></li>
										<li><a href="{{route('themnguoidung')}}">Thêm</a></li>
									</ul>
								</li>
								<li class="list-header">Giỏ hàng</li>
									<li>
										<a href="{{route('danhsachgiohang')}}">
											<i class="fa fa-shopping-cart "></i>
											<span class="menu-title">Trạng thái</span>
										</a>
									</li>
						
									<li class="list-divider"></li>
								<li class="list-header">Ảnh</li>
									
						          <li>
									<a href="#">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Logo</strong>
										</span>
										<i class="arrow"></i>
									</a>
					
									<!--Submenu-->
									<ul class="collapse">
										<li><a href="{{route('danhsachslide')}}">Danh sách</a></li>
										<li><a href="{{route('themslide')}}">Thêm</a></li>
								 	</ul>
								  </li>
									<li class="list-divider"></li>
								<li class="list-header">Thông tin công ty</li>
									
						          <li>
									<a href="{{route('hienthithongtin')}}">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Thông tin</strong>
										</span>
										<i class="arrow"></i>
									</a>
					
									<!--Submenu-->
								  </li>
									<li class="list-divider"></li>
								  <li class="list-header">Phản hồi khách hàng</li>
								  <li>
									<a href="{{route('danhsachbinhluan')}}">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Bình luận</strong>
										</span>
										
									</a>
								 </li>
								   <li>
									<a href="{{route('admin_lienhe')}}">
										<i class="fa fa-table"></i>
										<span class="menu-title">
											<strong>Liên hệ</strong>
										</span>
									</a>
					
									<!--Submenu-->
								  </li>
								<li class="list-divider"></li>
								
						
							</ul>

							</div>

					</div>
				</div>
				<!--================================-->
				<!--End menu-->

			</div>
		</nav>
		<!--===================================================-->
		<!--END MAIN NAVIGATION-->